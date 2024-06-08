<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Image extends Model
    {
        use HasFactory;

        protected $fillable = [
            'src_photo',
            'main',
            'id_products',
        ];

        public function product()
        {
            return $this->belongsTo(Product::class, 'id_products');
        }
    }
