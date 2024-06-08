<?php

    namespace App\Console\Commands;

    use Illuminate\Console\Command;
    use App\Models\ProductView;
    use App\Models\Product;
    use Carbon\Carbon;

    class UpdateProductViews extends Command
    {
        protected $signature = 'product:update-views';

        protected $description = 'Update product views';

        public function handle()
        {
            $products = Product::all();

            foreach ($products as $product) {
                $currentViews = $product->views;

                ProductView::create([
                    'product_id' => $product->id,
                    'date' => Carbon::now()->toDateString(),
                    'views' => $currentViews,
                ]);
            }

            $this->info('Product views updated successfully.');
        }
    }
