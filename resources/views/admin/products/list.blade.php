@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Products List</h1>
        <div class="button-right-side">
            <a href="{{route('admin.products.create')}}" class="btn btn-outline-warning button-add">Add Product</a>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                @php
                    $columns = [
                        'id' => 'ID',
                        'meta_title' => 'Meta Title',
                        'meta_description' => 'Meta Description',
                        'meta_keywords' => 'Meta Keywords',
                        'title' => 'Title',
                        'slug' => 'Slug',
                        'description' => 'Description',
                        'views' => 'Views',
                        'category.title' => 'Category',
                    ];
                @endphp
                @foreach ($columns as $field => $label)
                    @php
                        $direction = ($sortField === $field && $sortDirection === 'asc') ? 'desc' : 'asc';
                    @endphp
                    <th>
                        <a href="?sort_field={{ $field }}&sort_direction={{ $direction }}">
                            {{ $label }}
                            @if ($sortField === $field)
                                <i class="fa fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                            @endif
                        </a>
                    </th>
                @endforeach
                <th>Photos</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->meta_title }}</td>
                    <td>{{ $product->meta_description }}</td>
                    <td>{{ $product->meta_keywords }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->slug }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->views }}</td>
                    <td>{{ $product->category->title }}</td>
                    <td>
                        @php
                            $mainImage = $product->images->firstWhere('main', 'yes');
                        @endphp

                        @if ($mainImage)
                            <img class="preview-photo" src="{{ asset('storage/' . $mainImage->src_photo) }}" >
                        @elseif ($product->images->isNotEmpty())
                            <img class="preview-photo" src="{{ asset('storage/' . $product->images->first()->src_photo) }}" >
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection



<style>
    .button-add {
        margin-bottom: 20px;
    }

    .button-right-side {
        width: 100%;
        display: flex;
        justify-content: flex-end;
    }

    .preview-photo {
        width: 100px;
    }
</style>
