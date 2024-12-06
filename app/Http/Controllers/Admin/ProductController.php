<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category\CategorySubModel;
use App\Models\Product\Image;
use App\Models\Product\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function listProduct()
    {
        $products = ProductModel::with('productBelongsToCategories')->get();

        return view('admin.pages.product.index')->with([
            'products' => $products
        ]);
    }

    public function createProduct()
    {
        $category = CategorySubModel::where('parent_id', 0)->with('subcategory')->get();
        return view('admin.pages.product.create')->with(['category' => $category]);
    }

    public function storeProduct(Request $r)
    {
        try {
            if ($r->hasFile('images')) {

                $files = $r->file('images');

                $allowedfileExtension = ['jpg', 'png', 'jpeg', 'svg'];

                foreach ($files as $file) {

                    $extension = $file->getClientOriginalExtension();
                    $check = in_array($extension, $allowedfileExtension);

                    if (!$check) {
                        $r->session()->flash('error', 'Sorry Only Upload png, jpg, jpeg, png is allowed');
                        return redirect()->back();
                    }
                }
            }

            $this->validate($r, [
                'images' => 'required',
                'short_description' => 'required',
                'description' => 'required',
            ], [
                'images.required' => 'You have to choose the product imgae file!',
            ]);

            $obj = new ProductModel();

            $obj->title = $r->title;
            $obj->slug = $r->slug;
            $obj->price = $r->price;
            $obj->published_date = Carbon::parse($r->published_date)->format('Y/m/d');
            $obj->sell_price = $r->sell_price;
            $obj->availability = $r->availability;
            $obj->stocks = $r->stocks;
            $obj->offer_percentage = $r->offer_percentage;
            $obj->short_description = $r->short_description;
            $obj->description = $r->description;
            $obj->save();

            foreach ($r->cat as $catid) {
                $obj->productBelongsToCategories()->attach($catid);
            }

            if ($r->hasFile('images')) {

                foreach ($r->images as $image) {

                    $destinationPath = 'product/';
                    $imgPath = rand(10000, 99999) . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->move($destinationPath, $imgPath);

                    $img = Image::create([
                        'path' => $imgPath
                    ]);

                    $img->productImages()->attach($obj->id);
                }
            }

            $r->session()->flash('success', 'Saved successfully.');
            return redirect()->route('administrator.product.product_list');
        } catch (\Throwable $th) {

            throw $th;

            $r->session()->flash('error', 'Something went wrong!!!');
            return redirect()->route('administrator.product.product_list');
        }
    }

    public function fetchProduct($id)
    {
        $product = ProductModel::where('id', $id)->with('productImages')->first();

        $category = CategorySubModel::where('parent_id', 0)->with('subcategory')->get();

        return view('admin.pages.product.edit')->with([
            'category' => $category,
            'product' => $product,
        ]);
    }

    public function updateProduct(Request $r)
    {
        try {
            $obj = ProductModel::find($r->id);

            if ($r->hasFile('prodimg')) {

                $obj->title = $r->title;
                $obj->slug = str_replace(' ', '_', $r->title);
                $obj->price = $r->price;
                $obj->published_date = Carbon::parse($r->published_date)->format('Y/m/d');
                $obj->sell_price = $r->sell_price;
                $obj->availability = $r->availability;
                $obj->stocks = $r->stocks;
                $obj->offer_percentage = $r->offer_percentage;
                $obj->short_description = $r->short_description;
                $obj->description = $r->description;
                $obj->update();

                $product = ProductModel::find($r->id);
                $product->productImages()->detach();

                foreach ($r->prodimg as $image) {

                    $destinationPath = 'product/';
                    $imgPath = rand(10000, 99999) . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->move($destinationPath, $imgPath);

                    $img = Image::create([
                        'path' => $imgPath
                    ]);

                    $img->productImages()->attach($obj->id);
                }
            } else {

                $obj->title = $r->title;
                $obj->slug = str_replace(' ', '_', $r->title);
                $obj->price = $r->price;
                $obj->published_date = Carbon::parse($r->published_date)->format('Y/m/d');
                $obj->sell_price = $r->sell_price;
                $obj->availability = $r->availability;
                $obj->stocks = $r->stocks;
                $obj->offer_percentage = $r->offer_percentage;
                $obj->short_description = $r->short_description;
                $obj->description = $r->description;
                $obj->update();
            }

            $obj->productBelongsToCategories()->sync($r->cat);

            $r->session()->flash('success', 'Updated successfully.');
            return redirect()->route('administrator.product.product_list');
        } catch (\Throwable $th) {

            throw $th;

            $r->session()->flash('error', 'Something went wrong!!!');
            return redirect()->route('administrator.product.product_list');
        }
    }

    public function deleteProduct(Request $r, $id)
    {
        ProductModel::find($id)->delete();
        $r->session()->flash('success', 'Deleted successfully.');
        return redirect()->route('administrator.product.product_list');
    }

    public function fetchSlug(Request $r)
    {
        $check = ProductModel::where('slug', $r->slug)->get();

        if (count($check) > 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        echo json_encode(['status' => $status]);
    }

    public function fetchProductImage(Request $r)
    {
        $product = ProductModel::where('id', $r->id)->with('productImages')->first();

        $html = '';

        foreach ($product->productImages as $image) {

            $firstImgChecked = '';

            if ($product->image == $image->path) {
                $firstImgChecked = "checked";
            }

            $html .= '
                <div class="col-md-4">
                    <label>
                        <input type="radio" name="firstImg" class="firstImg" ' . $firstImgChecked . ' value="' . $image->id . '">
                        <input type="hidden" name="productId" class="productId" value="' . $product->id . '">
                            ' . $image->id . '
                    </label>
                    <img class="productImg" src="' . url('/') . '/product/' . $image->path . '" />
                </div>
            ';
        }

        echo json_encode(['data' => $html]);
    }

    public function setFirstImageForProduct(Request $r)
    {
        $imgId = $r->imgId;
        $productID = $r->productID;

        $fetchImg = Image::find($imgId);
        $fetchImg->parent_image = 1;
        $fetchImg->update();

        $productFetch = ProductModel::find($productID);
        $productFetch->image = $fetchImg->path;
        $productFetch->update();

        echo json_encode(['status' => 'success']);
    }

    public function fetchProductWithSimilarParent(Request $r)
    {
        $html['currentProduct'] = '';
        $html['each_product'] = '<p class="similarProducts">Similar Products</p>';

        $productId = $r->id;

        $singleProduct = ProductModel::where('id', $productId)->with('productBelongsToCategories')->first();

        $productCategories = $singleProduct->productBelongsToCategories;

        $html['currentProduct'] = '
            <p class="similarProducts">Products details</p>
            <div class="row">
                <div class="col-md-6">
                    <img class="currentProductImg" src="' . url('/') . '/product/' . $singleProduct->image . '" />
                </div>
                <div class="col-md-6 currentProductDiv">
                    <p class="cProductTitle">Products name: ' . $singleProduct->title . '</p>
                    <p class="cProductTitle">Products price: ' . number_format($singleProduct->price, 2) . '</p>
                    <p class="cProductTitle">Products sell price: ' . number_format($singleProduct->sell_price, 2) . '</p>
                    <p class="cProductTitle">Products availability: ' . $singleProduct->availability . '</p>
                    <p class="cProductTitle">Products stocks: ' . $singleProduct->stocks . '</p>
                    <p class="cProductDesc">Products description: ' . $singleProduct->short_description . '</p>
                </div>
            </div>
        ';

        $parentCatId = [];

        foreach ($productCategories as $category) {
            array_push($parentCatId, $category->id);
        }

        $parentCategories = CategorySubModel::whereIn('id', $parentCatId)->with('similarProdcuts', function ($q) use ($productId) {
            $q->where('product_id', '!=', $productId);
        })->get();

        foreach ($parentCategories as $eachProduct) {
            foreach ($eachProduct->similarProdcuts as $product) {

                if ($product->id != $productId) {
                    $html['each_product'] .=
                        '<div class="col-md-4 eachProduct">
                        <p class="similarProductTitle">' . $product->title . '</p>
                        <img class="similarProductImg" src="' . url('/') . '/product/' . $product->image . '" />
                        <a href="' . route('administrator.product.fetch_product', ['id' => $product->id]) . '" class="btn btn-info spbtn">
                            <i class="fa fa-edit" style="color: #fff !important"></i>
                        </a>
                    </div>';
                }
            }
        }

        echo json_encode(['data' => $html]);
    }
}
