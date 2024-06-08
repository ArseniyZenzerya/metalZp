<div class="title-section">
    <div>
        <h2>
            {{$title}}
        </h2>
        @if(!empty($subTitle))
            <div class="under-title">
                {{$subTitle}}
            </div>
        @endif
    </div>
    @if(!empty($addButton))
    <div class="title-section-button">
        @include('components.button', ['link' => '123'])
    </div>
    @endif
</div>

@pushonce('css')
    <style>
        .title-section {
            color: var(--color-white);
            font-family: var(--main-font);
            margin-top: 100px;
            display: flex;
            justify-content: space-between;
        }

        h2 {
            font-size: 50px;
        }

        .under-title {
            font-size: 30px;
        }

        @if(isset($extraStyle))
            .title-section {
                margin-top: 10px !important;
            }
        @endif

        @media screen and (max-width: 1301px) {
            .title-section {
                margin-top: 50px;
            }

            h2 {
                font-size: 40px;
            }

            .under-title {
                font-size: 20px;
            }
        }
    </style>
@endpushonce
