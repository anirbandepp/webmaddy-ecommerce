<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category\CategorySubModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.pages.category.index');
    }

    public function createCategory(Request $r)
    {

        if ($r->hasFile('catimg')) {
            $image = $r->file('catimg');
            $destinationPath = 'category/';
            $imgPath = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imgPath);
        } else {
            $imgPath = null;
        }

        $obj = new CategorySubModel();

        $obj->name = $r->name;
        $obj->slug = str_replace(' ', '_', $r->name);
        $obj->parent_id = 0;
        $obj->path = $imgPath;
        $obj->offer_percentage = $r->offer_percentage;
        $obj->tax_percent = $r->tax_percent;
        $obj->save();
        $r->session()->flash('success', 'Saved successfully.');
        return redirect()->route('administrator.category.list_category');
    }

    public function listCategory()
    {
        $parentCategory = CategorySubModel::where('parent_id', 0)->get();
        return view('admin.pages.category.list')->with(['parentCategory' => $parentCategory]);
    }

    public function deleteCategory(Request $r, $id)
    {
        CategorySubModel::find($id)->delete();
        $r->session()->flash('success', 'Deleted successfully.');
        return redirect()->route('administrator.category.list_category');
    }

    public function fetchCategory($id)
    {
        $category = CategorySubModel::find($id);
        return view('admin.pages.category.edit')->with(['category' => $category]);
    }

    public function updateCategory(Request $r)
    {
        $obj = CategorySubModel::find($r->id);

        if ($r->hasFile('catimg')) {
            $image = $r->file('catimg');
            $destinationPath = 'category/';
            $imgPath = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imgPath);

            $obj->name = $r->name;
            $obj->slug = str_replace(' ', '_', $r->name);
            $obj->parent_id = 0;
            $obj->path = $imgPath;
            $obj->offer_percentage = $r->offer_percentage;
            $obj->tax_percent = $r->tax_percent;
        } else {
            $obj->name = $r->name;
            $obj->slug = str_replace(' ', '_', $r->name);
            $obj->parent_id = 0;
            $obj->offer_percentage = $r->offer_percentage;
            $obj->tax_percent = $r->tax_percent;
        }

        $obj->update();
        $r->session()->flash('success', 'Updated successfully.');
        return redirect()->route('administrator.category.list_category');
    }

    /**
     * Sub Category CRUD Start
     */
    public function subCategoryCreate()
    {
        $parentCategory = CategorySubModel::where('parent_id', 0)->get();
        return view('admin.pages.subcategory.index')->with(['parentCategory' => $parentCategory]);
    }

    public function createSubCategory(Request $r)
    {
        if ($r->hasFile('catimg')) {
            $image = $r->file('catimg');
            $destinationPath = 'category/';
            $imgPath = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imgPath);
        } else {
            $imgPath = null;
        }

        $obj = new CategorySubModel();

        $obj->name = $r->name;
        $obj->slug = str_replace(' ', '_', $r->name);
        $obj->parent_id = $r->parnetCategory;
        $obj->path = $imgPath;
        $obj->offer_percentage = $r->offer_percentage;
        $obj->tax_percent = $r->tax_percent;
        $obj->save();
        $r->session()->flash('success', 'Saved successfully.');
        return redirect()->route('administrator.category.list_sub_category');
    }

    public function listSubCategory()
    {
        $parentCategory = CategorySubModel::where('parent_id', '!=', 0)->get();
        return view('admin.pages.subcategory.list')->with(['parentCategory' => $parentCategory]);
    }

    public function deleteSubCategory(Request $r, $id)
    {
        CategorySubModel::find($id)->delete();

        $r->session()->flash('success', 'Deleted successfully.');
        return redirect()->route('administrator.category.list_sub_category');
    }

    public function fetchSubCategory($id)
    {
        $category = CategorySubModel::find($id);
        $parentCategory = CategorySubModel::where('parent_id', 0)->get();

        return view('admin.pages.subcategory.edit')->with([
            'category' => $category,
            'parentCategory' => $parentCategory
        ]);
    }

    public function updateSubCategory(Request $r)
    {
        $obj = CategorySubModel::find($r->id);

        if ($r->hasFile('catimg')) {
            $image = $r->file('catimg');
            $destinationPath = 'category/';
            $imgPath = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imgPath);

            $obj->name = $r->name;
            $obj->slug = str_replace(' ', '_', $r->name);
            $obj->parent_id = $r->parnetCategory;
            $obj->path = $imgPath;
            $obj->offer_percentage = $r->offer_percentage;
            $obj->tax_percent = $r->tax_percent;
        } else {
            $obj->name = $r->name;
            $obj->slug = str_replace(' ', '_', $r->name);
            $obj->parent_id = $r->parnetCategory;
            $obj->offer_percentage = $r->offer_percentage;
            $obj->tax_percent = $r->tax_percent;
        }

        $obj->update();

        $r->session()->flash('success', 'Updated successfully.');
        return redirect()->route('administrator.category.list_sub_category');
    }
}

// $categoryWithChild = CategorySubModel::where('parent_id', 0)->with('subcategory')->get();
