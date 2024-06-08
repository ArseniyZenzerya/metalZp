@extends('layouts.app')


@section('content')
    <section class="container">
        <div class="breadcrumbs">
            @include('components.breadcrumbs', [
                       'breadcrumbs' => [
                           [
                               'title'	=> "Каталог",
                               'link'	=> route('categoryAll'),
                           ],
                           [
                               'title'	=> isset($posts[0]) ? $posts[0]->category->title : 'Не корректна категорія',
                               'link'	=> '',
                           ],
                       ],
                   ])
        </div>
        @if(isset($posts[0]))
            @include('components.title-section', ['title' => $posts[0]->category->title, 'subTitle' => '', 'extraStyle' => true])
        @else
            @include('components.title-section', ['title' => 'Поки не має продуктів', 'subTitle' => '', 'extraStyle' => true])
        @endif
        <div class='category-product'>
            <div class="category-product-row">
                @foreach($posts as $post)
                    @include('components.product', ['post' => $post])
                @endforeach
            </div>
        </div>
    </section>
@endsection


@section('meta')
    <title></title>
    <meta name="description" content="">
    <meta name="keywords" content=" ">
@endsection


@pushonce('scripts')

@endpushonce

@pushOnce('css')
    <style>
        .category-product {
            display: flex;
            flex-direction: column;
            margin-top: 50px;
        }

        .category-product > div {
            margin-bottom: 50px;
        }

        .category-product-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        .category-product-row > div {
            margin-right: 20px;
            margin-bottom: 20px;
        }


        @media screen and (max-width: 1301px) {
            .category-product-row > div {
                margin-left: 0;
                margin-right: 10px;
            }
        }

        @media screen and (max-width: 769px) {
            .category-product-row > div {
                margin-right: 22px;
            }

            .category-product-row > div {
                margin-right: 22px;
            }
        }


        @media screen and (max-width: 425px) {
            .category-product-row > div {
                margin-right: 10px;
            }
        }
    </style>
@endPushOnce
