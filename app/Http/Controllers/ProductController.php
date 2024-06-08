<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\StoreProductRequest;
    use App\Http\Requests\UpdateProductRequest;
    use App\Models\Category;
    use App\Models\Comment;
    use App\Models\Product;
    use App\Models\Image;
    use App\Models\ProductView;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;

    class ProductController extends Controller
    {
        public function create()
        {
            $categories = Category::all();
            return view('admin.products.create', compact('categories'));
        }

        public function list(Request $request)
        {
            $sortField = $request->get('sort_field', 'id');
            $sortDirection = $request->get('sort_direction', 'asc');

            $query = Product::query();

            if ($sortField == 'category.title') {
                $query->join('categories', 'products.id_categories', '=', 'categories.id')
                    ->orderBy('categories.title', $sortDirection)
                    ->select('products.*');
            } else {
                $query->orderBy($sortField, $sortDirection);
            }

            $products = $query->with(['category', 'images'])->get();
            return view('admin.products.list', compact('products', 'sortField', 'sortDirection'));
        }

        public function edit($id)
        {
            $categories = Category::all();
            $product = Product::findOrFail($id);
            return view('admin.products.edit', compact('product', 'categories'));
        }

        public function destroy($id)
        {
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect()->route('admin.products.list')->with('success', 'Product deleted successfully');
        }

        public function store(StoreProductRequest $request)
        {
            $validatedData = $request->validated();
            $validatedData['slug'] = Str::slug($validatedData['title'], '-');

            $product = Product::create($validatedData);

            if ($request->has('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('images', 'public');
                    Image::create([
                        'src_photo' => $path,
                        'main' => 'no',
                        'id_products' => $product->id,
                    ]);
                }
            }

            return redirect()->route('admin.products.list')->with('success', 'Product created successfully.');
        }

        public function update(UpdateProductRequest $request, $id)
        {
            $validatedData = $request->validated();
            $validatedData['slug'] = Str::slug($validatedData['title'], '-');

            $product = Product::findOrFail($id);
            $product->update($validatedData);

            if ($request->has('removed_images')) {
                $removedImages = explode(',', $request->removed_images);
                foreach ($removedImages as $imageId) {
                    $image = $product->images()->find($imageId);
                    if ($image) {
                        Storage::disk('public')->delete($image->src_photo); // Delete from storage
                        $image->delete(); // Delete from database
                    }
                }
            }

            if ($request->has('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('images', 'public');
                    Image::create([
                        'src_photo' => $path,
                        'main' => 'no',
                        'id_products' => $product->id,
                    ]);
                }
            }

            return Redirect::route('admin.products.list')->with('success', 'Product updated successfully.');
        }

        public function setMainPhoto(Product $product, Request $request)
        {
            $imageId = $request->input('image_id');
            $product->images()->update(['main' => 'no']);
            $product->images()->find($imageId)->update(['main' => 'yes']);
            return response()->json(['message' => 'Main photo updated successfully']);
        }

        public function productShow(Product $product)
        {
            $product = $product->load(['images', 'category']);
            $randomPosts = Product::where('id', '!=', $product->id)
                ->has('images')
                ->inRandomOrder()
                ->with(['images', 'category'])
                ->take(4)
                ->get();

            $comments = Comment::where('id_products', '=', $product->id)
                ->orderBy('created_at', 'DESC')
                ->paginate(3);

            return view('pages.product', ['product' => $product, 'randomPosts' => $randomPosts, 'comments' => $comments]);
        }

        public function index()
        {
            $productViews = ProductView::all();

            $data = [];
            foreach ($productViews as $productView) {
                $data[] = [
                    'product_id' => $productView->product_id,
                    'product_name' => $productView->product->title,
                    'views' => $productView->views,
                    'date' => $productView->date,
                ];
            }

            return response()->json(['data' => $data]);
        }

        public function view()
        {
            return view('admin.main');
        }
    }
