<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\StoreReviewRequest;
    use App\Models\Comment;

    class ReviewController extends Controller
    {
        public function store(StoreReviewRequest $request)
        {
            $validatedData = $request->validated();

            $comment = Comment::create([
                'rating' => $validatedData['rating'],
                'name' => $validatedData['name'],
                'comment' => $validatedData['comment'],
                'id_products' => $validatedData['id_products']
            ]);

            return response()->json(['success' => true, 'comment' => $comment]);
        }
    }
