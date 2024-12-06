<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Administrator\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Administrator\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Administrator\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Administrator\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Administrator\Auth\NewPasswordController;
use App\Http\Controllers\Administrator\Auth\PasswordResetLinkController;
use App\Http\Controllers\Administrator\Auth\RegisteredUserController;
use App\Http\Controllers\Administrator\Auth\VerifyEmailController;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerActivityController;
use App\Http\Controllers\SocialLinkController;
use Illuminate\Support\Facades\Route;

Route::prefix('administrator')->name('administrator.')->group(function () {

    Route::group(['middleware' => 'auth:administrator'], function () {

        Route::get('/', [DashboardController::class, 'index']);

        // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/dashboard', function () {
            return view('admin.pages.dashboard');
        })->name('dashboard');


        Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');

        Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
            ->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');

        Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->middleware(['throttle:6,1'])
            ->name('verification.send');

        Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');

        Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store']);

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::prefix('category')->name('category.')->group(function () {

            // Category CRUD
            Route::get('/', [CategoryController::class, 'index'])->name('category-list');
            Route::post('/create-category', [CategoryController::class, 'createCategory'])->name('create_category');
            Route::get('/list-category', [CategoryController::class, 'listCategory'])->name('list_category');
            Route::get('/delete_category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete_category');
            Route::get('/fetch_category/{id}', [CategoryController::class, 'fetchCategory'])->name('fetch_category');
            Route::post('/update_category', [CategoryController::class, 'updateCategory'])->name('update_category');

            // Sub Category CRUD
            Route::get('/sub-category-create', [CategoryController::class, 'subCategoryCreate'])->name('sub_category_create');
            Route::post('/create_sub_category', [CategoryController::class, 'createSubCategory'])->name('create_sub_category');
            Route::get('/list-sub-category', [CategoryController::class, 'listSubCategory'])->name('list_sub_category');
            Route::get('/delete_sub_category/{id}', [CategoryController::class, 'deleteSubCategory'])->name('delete_sub_category');
            Route::get('/fetch_sub_category/{id}', [CategoryController::class, 'fetchSubCategory'])->name('fetch_sub_category');
            Route::post('/update_sub_category', [CategoryController::class, 'updateSubCategory'])->name('update_sub_category');
        });

        Route::prefix('product')->name('product.')->group(function () {

            // Product CRUD
            Route::get('/', [ProductController::class, 'listProduct'])->name('product_list');
            Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('delete_product');
            Route::get('/create-product', [ProductController::class, 'createProduct'])->name('create_product');
            Route::post('/store-product', [ProductController::class, 'storeProduct'])->name('store_product');
            Route::get('/fetch-product/{id}', [ProductController::class, 'fetchProduct'])->name('fetch_product');
            Route::post('/update-product', [ProductController::class, 'updateProduct'])->name('update_product');
            Route::get('/fetch_slug', [ProductController::class, 'fetchSlug'])->name('fetch_slug');
            Route::get('/fetch_product_image', [ProductController::class, 'fetchProductImage'])->name('fetch_product_image');
            Route::get('/set_first_image_for_product', [ProductController::class, 'setFirstImageForProduct'])->name('set_first_image_for_product');
            Route::get('fetch_product_with_similar_parent', [ProductController::class, 'fetchProductWithSimilarParent'])->name('fetch_product_with_similar_parent');
        });

        Route::prefix('social_link')->name('social_link.')->group(function () {
            Route::get('/', [SocialLinkController::class, 'index'])->name('social_link_list');
            Route::post('/store-links', [SocialLinkController::class, 'storeLinks'])->name('store_links');
        });

        // Customer Activity CRUD
        Route::prefix('customer-activity')->name('customer_activity.')->group(function () {

            Route::get('/', [CustomerActivityController::class, 'index'])->name('customer_list');
        });

        // Coupon CRUD
        Route::prefix('coupon')->name('coupon.')->group(function () {

            Route::get('/', [CouponController::class, 'index'])->name('coupon_list');
            Route::get('/create-coupon', [CouponController::class, 'createCoupon'])->name('create_coupon');
            Route::post('/store-coupon', [CouponController::class, 'storeCoupon'])->name('store_coupon');
            Route::get('/delete-coupon/{id}', [CouponController::class, 'deleteCoupon'])->name('delete_coupon');
            Route::get('/fetch-coupon/{id}', [CouponController::class, 'fetchCoupon'])->name('fetch_coupon');
            Route::post('/update-coupon', [CouponController::class, 'updateCoupon'])->name('update_coupon');
        });

        // Coupon CRUD
        Route::prefix('order')->name('order.')->group(function () {

            Route::get('/', [OrderController::class, 'index'])->name('order_list');
            Route::get('/fetch-order/{id}', [OrderController::class, 'fetchOrder'])->name('fetch_order');
            Route::post('/update-order', [OrderController::class, 'updateOrder'])->name('update_order');
            Route::get('/order-status/{status}', [OrderController::class, 'orderStatus'])->name('order_status');
        });


        // Vendor CRUD
        Route::prefix('vendor')->name('vendor.')->group(function () {

            Route::get('/', [VendorController::class, 'index'])->name('vendor_list');
            Route::get('/create-vendor', [VendorController::class, 'createVendor'])->name('create_vendor');
            Route::post('/store-vendor', [VendorController::class, 'storeVendor'])->name('store_vendor');
            Route::get('/delete-vendor/{id}', [VendorController::class, 'deleteVendor'])->name('delete_vendor');
            Route::get('/fetch-vendor/{id}', [VendorController::class, 'fetchVendor'])->name('fetch_vendor');
            Route::post('/update-vendor', [VendorController::class, 'updateVendor'])->name('update_vendor');
        });

        Route::group(['middleware' => 'checkRole:superadmin'], function () {
            Route::get('/superAdminDashboard', function () {
                echo "superAdminDashboard";
            });
        });

        Route::group(['middleware' => 'checkRole:admin'], function () {
            Route::get('/adminDashboard', function () {
                echo "adminDashboard";
            });
        });

        Route::group(['middleware' => 'checkRole:employee'], function () {
            Route::get('/employeeDashboard', function () {
                echo "employeeDashboard";
            });
        });
    });


    Route::group(['middleware' => 'guest:administrator'], function () {

        Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');

        Route::post('/register', [RegisteredUserController::class, 'store']);

        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

        Route::post('/login', [AuthenticatedSessionController::class, 'store']);

        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');

        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');

        Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
    });
});
