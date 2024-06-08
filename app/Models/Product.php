<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Product extends Model
    {
        use HasFactory;

        protected $fillable = [
            'meta_title',
            'meta_description',
            'meta_keywords',
            'title',
            'slug',
            'description',
            'views',
            'id_categories',
        ];

        public function images()
        {
            return $this->hasMany(Image::class, 'id_products')
                ->orderByRaw("CASE WHEN main = 'yes' THEN 0 ELSE 1 END")
                ->orderBy('created_at', 'desc');
        }

        public function category()
        {
            return $this->belongsTo(Category::class, 'id_categories');
        }
    }

