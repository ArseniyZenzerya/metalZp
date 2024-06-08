@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Product</h1>
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="meta_title">Meta Title</label>
                <input type="text" name="meta_title" class="form-control" id="meta_title" value="{{ $product->meta_title }}">
            </div>
            <div class="form-group">
                <label for="meta_description">Meta Description</label>
                <textarea name="meta_description" class="form-control" id="meta_description">{{ $product->meta_description }}</textarea>
            </div>
            <div class="form-group">
                <label for="meta_keywords">Meta Keywords</label>
                <textarea name="meta_keywords" class="form-control" id="meta_keywords">{{ $product->meta_keywords }}</textarea>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $product->title }}" required>
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" class="form-control" id="slug" value="{{ $product->slug }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" required>{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="views">Views</label>
                <input type="number" name="views" class="form-control" id="views" value="{{ $product->views }}" required>
            </div>
            <div class="form-group">
                <label for="id_categories">Category</label>
                <select name="id_categories" class="form-control" id="id_categories" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id === $product->id_categories ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="images">Images</label>
                <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                <div id="image-preview">
                    @foreach($product->images as $image)
                        <div class="image-preview-item">
                            <img src="{{ asset('storage/' . $image->src_photo) }}" class="img-thumbnail mr-2 image-border" width="100" style="{{ $image->main === 'yes' ? 'border: 2px solid orange;' : '' }}">
                            <button type="button" class="btn btn-sm btn-primary set-main-photo" data-id="{{ $image->id }}">Set Main Photo</button>
                            <button type="button" class="btn btn-sm btn-danger remove-image" data-id="{{ $image->id }}">Remove</button>
                        </div>
                    @endforeach
                </div>
                <input type="hidden" name="removed_images" id="removed_images" value="">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
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
                            $('#image-preview').append('<div class="image-preview-item"><img src="' + e.target.result + '" class="img-thumbnail mr-2" width="100"><button type="button" class="btn btn-sm btn-danger remove-new-image">Remove</button></div>');
                        }
                        reader.readAsDataURL(file);
                    });
                }
            });

            $('#image-preview').on('click', '.remove-image', function() {
                var imageId = $(this).data('id');
                if (imageId) {
                    var removedImages = $('#removed_images').val();
                    removedImages = removedImages ? removedImages.split(',') : [];
                    removedImages.push(imageId);
                    $('#removed_images').val(removedImages.join(','));
                }
                $(this).parent('.image-preview-item').remove();
            });

            $('#image-preview').on('click', '.remove-new-image', function() {
                $(this).parent('.image-preview-item').remove();
            });

            $('#image-preview').on('click', '.set-main-photo', function() {
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                var imageId = $(this).data('id');
                var $button = $(this); // Сохраняем ссылку на кнопку "Set Main Photo"
                $.ajax({
                    url: "{{ route('admin.products.set_main_photo', $product->id) }}",
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: {
                        image_id: imageId
                    },
                    success: function(response) {
                        console.log(response);
                        $('.image-border').css('border', 'none');
                        $button.closest('.image-preview-item').find('.image-border').css('border', '2px solid orange');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });


        });
    </script>
@endsection
