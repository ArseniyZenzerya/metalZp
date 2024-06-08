<div class="align-center">
    <a href="{{$link}}">
        <div class="button-see-all">{{$nameButton ?? 'Подивитись всі'}}</div>
    </a>
</div>


@pushonce('css')
    <style>
        .align-center {
            display: flex;
        }

        .button-see-all {
            font-family: var(--main-font);
            color: var(--color-white);
            font-size: 12px;
            border-radius: 30px;
            padding: 6px 20px;
            border: 1px solid var(--color-main-orange);
            margin-top: 20px;
        }
    </style>
@endpushonce
