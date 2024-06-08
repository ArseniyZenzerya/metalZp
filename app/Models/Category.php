<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Str;

    class Category extends Model
    {
        use HasFactory;

        protected $fillable = [
            'meta_title',
            'meta_description',
            'meta_keywords',
            'title',
            'slug',
            'image',
        ];

        public function products()
        {
            return $this->hasMany(Product::class, 'id_categories');
        }


        public static function createWithImageAndSlug(array $data, $imageFile = null)
        {
            $data['slug'] = Str::slug($data['title'], '-');

            if ($imageFile) {
                $path = $imageFile->store('images', 'public');
                $data['image'] = $path;
            }

            return self::create($data);
        }

    }
