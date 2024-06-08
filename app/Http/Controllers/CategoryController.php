<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\StoreCategoryRequest;
    use App\Http\Requests\UpdateCategoryRequest;
    use App\Models\Category;
    use App\Models\Product;
    use Illuminate\Http\Request;
    use Illuminate\Support\Str;

    class CategoryController extends Controller
    {
        public function list(Request $request)
        {
            $sortField = $request->get('sort_field', 'id');
            $sortDirection = $request->get('sort_direction', 'asc');

            $categories = Category::orderBy($sortField, $sortDirection)->get();

            return view('admin.categories.list', compact('categories', 'sortField', 'sortDirection'));
        }

        public function create()
        {
            return view('admin.categories.create');
        }

        public function store(StoreCategoryRequest $request)
        {
            $validatedData = $request->validated();

            Category::createWithImageAndSlug($validatedData, $request->file('image'));

            return redirect()->route('admin.categories.list')->with('success', 'Category created successfully.');
        }


        public function edit($id)
        {
            $category = Category::findOrFail($id);
            return view('admin.categories.edit', compact('category'));
        }

        public function update(UpdateCategoryRequest $request, $id)
        {
            $validatedData = $request->validated();

            $category = Category::findOrFail($id);
            $validatedData['slug'] = Str::slug($validatedData['title'], '-');

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images', 'public');
                $validatedData['image'] = $path;
            }

            $category->update($validatedData);

            return redirect()->route('admin.categories.list')->with('success', 'Category updated successfully.');
        }

        public function destroy($id)
        {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->route('admin.categories.list')->with('success', 'Category deleted successfully.');
        }

        public function categoryShow(Category $category)
        {
            $posts = Product::with(['category', 'images'])
                ->where('id_categories', $category->id)
                ->orderBy('id', 'DESC')
                ->get();

            return view('pages.catalog-product', ['posts' => $posts]);
        }

        public function categoryAll()
        {
            $categories = Category::get();
            $posts = [];

            foreach ($categories as $category) {
                $posts[$category->title] = Product::with(['category', 'images'])
                    ->where('id_categories', $category->id)
                    ->get();
            }

            return view('pages.catalog', ['posts' => $posts]);
        }
    }

