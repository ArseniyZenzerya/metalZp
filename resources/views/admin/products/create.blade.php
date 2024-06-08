@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Add Product</h1>
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="meta_title">Meta Title</label>
                <input type="text" class="form-control" id="meta_title" name="meta_title">
            </div>

            <div class="form-group">
                <label for="meta_description">Meta Description</label>
                <textarea class="form-control" id="meta_description" name="meta_description"></textarea>
            </div>

            <div class="form-group">
                <label for="meta_keywords">Meta Keywords</label>
                <textarea class="form-control" id="meta_keywords" name="meta_keywords"></textarea>
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="id_categories">Category</label>
                <select class="form-control" id="id_categories" name="id_categories" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="images">Images</label>
                <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                <div id="image-preview"></div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#images').change(function() {
                $('#image-preview').empty();
                if (this.files) {
                    $.each(this.files, function(index, file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#image-preview').append('<img src="' + e.target.result + '" class="img-thumbnail mr-2" width="100">');
                        }
                        reader.readAsDataURL(file);
                    });
                }
            });

            $('#image-preview').on('click', 'img', function() {
                $(this).remove();
                var fileInput = $('#images');
                fileInput.val('');
            });
        });
    </script>
@endsection
