<?php

    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\FormController;
    use App\Http\Controllers\ProductViewController;
    use App\Http\Controllers\ReviewController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\AuthController;

    Route::get('/', function () {
        return view('pages.index');
    })->name('home');

    Route::get('/catalog', [CategoryController::class, 'categoryAll'])->name('categoryAll');


    Route::get('/catalog/{category:slug}', [CategoryController::class, 'categoryShow'])->name('category');
    Route::get('/product/{product:slug}', [ProductController::class, 'productShow'])->name('product');

    Route::post('/submit-callback', [FormController::class, 'submitCallback'])->name('submit.callback');
    Route::post('/add-comment', [ReviewController::class, 'store'])->name('reviews.store');


    Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
        // Category routes
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/categories/list', [CategoryController::class, 'list'])->name('admin.categories.list');
        Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

        // Product routes
        Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('/products/list', [ProductController::class, 'list'])->name('admin.products.list');
        Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
        Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
        Route::put('/products/{product}/set-main-photo', [ProductController::class, 'setMainPhoto'])->name(
            'admin.products.set_main_photo'
        );


        //Admin routes
        Route::get('/api/product-views', [ProductController::class, 'index']);
        Route::get('/product-views', [ProductController::class, 'view'])->name('admin.product-view');
    });


    Route::get('/admin/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/admin/register', [AuthController::class, 'register']);

    Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'login']);

    Route::get('/admin/logout', [AuthController::class, 'logout'])->name('logout');
