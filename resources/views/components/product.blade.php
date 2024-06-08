<div class="row-category-all">
    <a href="{{route('product', ['product' => $post->slug])}}" class="row-category-one-block">
        <div class="row-category-block-photo">
            @if ($post->images->firstWhere('main', 'yes'))
                <img src="{{asset('storage/' . $post->images->firstWhere('main', 'yes')->src_photo)}}" alt="">
            @elseif ($post->images->isNotEmpty())
                <img src="{{asset('storage/' . $post->images->first()->src_photo)}}" alt="">
            @endif
        </div>
        <div class="row-category-block-title text-block-category">
            {{$post->title}}
        </div>
        <div class="row-category-block-desc text-block-category">
            {{$post->description}}
        </div>
    </a>
</div>


@pushonce('css')
<style>
    .row-category-one-block {
        display: flex;
        flex-direction: column;
    }

    .row-category-one-block img {
        width: 100%;
        height: 200px;
    }

    @if(!empty($bigPhoto))
    .row-category-one-block img {
        width: 250px !important;
        height: 250px !important;
    }
    @endif

    .row-category-block-photo {
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 15px;
        border-radius: 30px;
    }

    .text-block-category {
        color: var(--color-white);
        font-family: var(--main-font);
        margin-top: 5px;
        margin-left: 15px;
    }

    .row-category-block-title {
        font-size: 20px;
    }

    .row-category-block-desc {
        font-size: 16px;
    }

    .row-category-all {
        width: calc(25% - 20px);
    }

    @media screen and (max-width: 1301px) {
        .row-category-one-block img {
            height: 140px;
        }

        .row-category-all {
            width: calc(25% - 10px);
            margin-right: 10px;
        }

        .row-category-block-title {
            font-size: 17px;
        }

        .row-category-block-desc {
            font-size: 10px;
        }
    }

    @media screen and (max-width: 768px) {
        .row-category-all {
            width: calc(33% - 20px);
            margin-right: 10px ;
        }

        .row-category-one-block img {
            width: 100%;
        }
    }


    @media screen and (max-width: 425px) {
        .row-category-block-photo {
            margin-right: 5px;
            margin-left: 5px;
        }

        .slick-dots {
            bottom: -50px;
        }

        .row-category-all {
            width: calc(50% - 10px);
            margin-right: 0;
        }
    }


</style>
@endpushonce
