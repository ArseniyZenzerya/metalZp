@extends('layouts.app')


@section('content')
    <section class="container">
        <div class="breadcrumbs">
            @include('components.breadcrumbs', [
                       'breadcrumbs' => [
                           [
                               'title'	=> 'Каталог',
                               'link'	=> '',
                           ],
                       ],
                   ])
        </div>
        @include('components.title-section', ['title' => 'Каталог', 'subTitle' => '7 категорій', 'extraStyle' => true])

        @foreach($posts as $nameCategory => $post)
        <div class="row-category">
            <div class="row-category-title-block">
                <div>
                    <div>0{{$loop->index + 1}} -</div>
                    <div>{{$nameCategory}}</div>
                </div>
                @include('components.button', ['link' => route('category', ['category' => $post->first()->category->slug])])
            </div>
            <div class="row-category-list">
                @foreach($post as $item)
                    @include('components.product', ['post' => $item])
                @endforeach
            </div>
        </div>
        @endforeach
    </section>
@endsection

@section('meta')
    <title></title>
    <meta name="description" content="">
    <meta name="keywords" content=" ">
@endsection


@pushonce('scripts')
    <script>
        $(document).ready(function(){
            let $worksBlock = $('.row-category-list');
            let worksSlickInitialized = false;

            function initializeSlick() {
                $worksBlock.slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true,
                    infinite: true,
                    speed: 500,
                    autoplay: true,
                });
                worksSlickInitialized = true;
            }

            function destroySlick() {
                if (worksSlickInitialized) {
                    $worksBlock.slick("unslick");
                    worksSlickInitialized = false;
                }
            }

            function checkWindowSize() {
                let screenWidth = $(window).width();

                if (screenWidth <= 425) {
                    initializeSlick();
                } else if (screenWidth > 425) {
                    destroySlick();
                }
            }

            checkWindowSize();

            $(window).on('resize', checkWindowSize);

        });

    </script>
@endpushonce

@pushOnce('css')
    <style>
        .row-category {
            display: flex;
            justify-content: flex-start;
            margin-top: 60px;
        }

        .row-category-list {
            display: flex;
        }

        .row-category-title-block {
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-right: 30px;
        }

        .row-category-title-block > div:first-child {
            font-weight: 700;
            font-size: 24px;
            font-family: var(--main-font);
            color: var(--color-white);
            text-transform: uppercase;
        }

        .row-category-list > div {
            margin-right: 10px;
        }

        .row-category-one-block img {
            width: 200px;
            height: 200px;
        }

        @media screen and (max-width: 1301px) {
            .row-category {
                flex-direction: column;
            }

            .row-category-title-block {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                flex-direction: row;
                margin-right: 0;
            }

            .row-category-one-block img {
                width: 148px;
                height: 148px;
            }

            .row-category-list {
                margin-top: 25px;
            }
        }


        @media screen and (max-width: 769px) {
            .row-category-one-block img {
                width: 145px;
                height: 145px;
            }
        }

        @media screen and (max-width: 425px) {
            .row-category-one-block img {
                width: 100%;
                height: 100%;
            }

            .row-category-list > div {
                margin-right: 0;
            }
        }

    </style>
@endPushOnce
