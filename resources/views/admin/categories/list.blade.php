@extends('layouts.admin')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Categories List</h1>
    <div class="button-right-side">
        <a href="{{route('admin.categories.create')}}" class="btn btn-outline-warning button-add">Add Category</a>
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
                    'image' => 'Image',
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
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->meta_title }}</td>
                <td>{{ $category->meta_description }}</td>
                <td>{{ $category->meta_keywords }}</td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->slug }}</td>
                <td><img src="{{ asset('storage/' . $category->image) }}" width="50" alt="{{ $category->title }}"></td>
                <td>
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
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
</style>
