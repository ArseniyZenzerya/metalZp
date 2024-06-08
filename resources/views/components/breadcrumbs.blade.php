<div class="breadcrumb">
    <a class="breadcrumb-link" href="{{route('home')}}"><div class="breadcrumb-key">Головна</div></a>
    @foreach($breadcrumbs as $breadcrumb)
        <img class="breadcrumb-arrow" src="{{asset('images/siteImages/arrow_bread_crumbs.svg')}}" alt="Стрілка навігації">
        @if($loop->last)
            <a class="breadcrumb-link" href="{{$breadcrumb['link']}}"><div class="breadcrumb-last">{{$breadcrumb['title']}}</div></a>
        @else
            <a class="breadcrumb-link" href="{{$breadcrumb['link']}}"><div class="breadcrumb-key">{{$breadcrumb['title']}}</div></a>
        @endif
    @endforeach
</div>

@include('components.schema', ['breadcrumbs' => $breadcrumbs])

@pushonce('css')
    <style>
        .breadcrumb {
            display: flex;
            margin-top: 50px;
            flex-wrap: wrap;
        }

        .breadcrumb-link {
            text-decoration: none;
            color: black;
        }

        .breadcrumb-key:hover{
            color: var(--color-main-orange);
            text-decoration: underline;
        }

        .breadcrumb-key {
            color: var(--color-white);
            font-size: 14px;
            font-family: var(--main-font);
            line-height: 22px;
        }

        .breadcrumb-last {
            font-size: 14px;
            font-family: var(--main-font);
            line-height: 22px;
            color: var(--color-main-orange);
            cursor: auto;
        }

        .breadcrumb-arrow {
            margin: 0 5px;
        }
    </style>
@endpushonce
