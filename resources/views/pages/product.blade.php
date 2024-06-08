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
                               'title'	=> $product->category->title,
                               'link'	=> route('category', $product->category->slug),
                           ],
                            [
                               'title'	=> $product->title,
                               'link'	=> route('product', $product->slug),
                           ],
                       ],
                   ])
        </div>
        <div class="product">
            <div class="cssSlider">
                <div class="row">
                    <div class="column small-11 small-centered">
                        <div class="slider slider-single">
                            @foreach($product->images as $image)
                                <div id="slide{{$loop->index}}">
                                    <img
                                        src="{{asset('storage/' . $image->src_photo)}}"
                                        alt=""/>
                                </div>
                            @endforeach
                        </div>
                        <div class="slider slider-nav">
                            @foreach($product->images as $image)
                                <div id="slide{{$loop->index}}">
                                    <img
                                        src="{{asset('storage/' . $image->src_photo)}}"
                                        alt=""/>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-desc">
                <h1 class="title">
                    {{$product->title}}
                </h1>
                <div class="description">
                    {{$product->description}}
                </div>
                @include('components.button', ['link' => '123', 'nameButton' => 'Замовити'])
            </div>
        </div>
        <div class="sub-title">
            Вам може сподобатись
        </div>
        <div class="product-row">
            @foreach($randomPosts as $randomPost)
                @include('components.product', ['post' => $randomPost])
            @endforeach
        </div>
        <div class="sub-title">
            відгуки про товар
        </div>
        <div class="reviews-section">
            <div class="reviews">
                <div class="block-reviews" id="reviewsContainer">
                    @foreach($comments as $comment)
                        <div class="block-review">
                            <div class="info-review">
                                <div>{{$comment->rating}}/5</div>
                                <div>{{$comment->comment}}</div>
                            </div>
                            <div class="name">{{$comment->name}}</div>
                        </div>
                    @endforeach
                    <div id="paginationLinks">
                        {{ $comments->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            <div class="reviews-form">
{{--                TODO: add to separate file--}}
                <div class="reviews-form-title">Залишити відгук</div>
                <form action="{{ route('reviews.store') }}" method="POST" class="form-reviews" id="reviewForm">
                    @csrf
                    <div class="description">
                        Поділіться своїм досвідом
                    </div>
                    <div class="rating_block">
                        <input name="rating" value="5" id="rating_5" type="radio"/>
                        <label for="rating_5" class="label_rating"></label>

                        <input name="rating" value="4" id="rating_4" type="radio"/>
                        <label for="rating_4" class="label_rating"></label>

                        <input name="rating" value="3" id="rating_3" type="radio"/>
                        <label for="rating_3" class="label_rating"></label>

                        <input name="rating" value="2" id="rating_2" type="radio"/>
                        <label for="rating_2" class="label_rating"></label>

                        <input name="rating" value="1" id="rating_1" type="radio"/>
                        <label for="rating_1" class="label_rating"></label>
                    </div>
                    <input type="text" name="name" placeholder="Ваше ім’я">
                    <textarea name="comment" cols="2"></textarea>
                    <input type="hidden" name="id_products" value="{{$product->id}}">
                    <div id="captchaComment"></div>
                    <input type="submit" id="submit-comment" value="Додати коментар">
                </form>
            </div>
        </div>
    </section>
    <div class="popup-overlay">
        <div class="popup-content">
            <div class="call-back-form">
                <span class="close-popup">✖</span>
                <div class="call-back-form-title">Безкоштовний замір</div>
                <form id="callback-form" class="form-callback">
                    @csrf
                    <div class="description">
                        Для детального розрахунку вартості виробу, заповність форму для виклику спеціаліста
                    </div>
                    <div id="error-message"></div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <input type="text" name="name" placeholder="Ваше ім’я" required>
                    <input type="text" name="phone" id="phone" placeholder="Введите номер телефона" required>
                    <div id="captcha"></div>
                    <input type="submit" id="submit-callback" value="Відправити заявку">
                </form>

            </div>
        </div>
    </div>

@endsection


@section('meta')
    <title></title>
    <meta name="description" content="">
    <meta name="keywords" content=" ">
@endsection

@pushonce('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>

    <script>
        $(document).ready(function () {

            $('.slider-single').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                fade: false,
                adaptiveHeight: true,
                infinite: false,
                useTransform: true,
                speed: 400,
                cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
            });

            $('.slider-nav')
                .on('init', function(event, slick) {
                    $('.slider-nav .slick-slide.slick-current').addClass('is-active');
                })
                .slick({
                    slidesToShow: 7,
                    slidesToScroll: 7,
                    dots: false,
                    arrows: false,
                    focusOnSelect: false,
                    infinite: false,
                    responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 5,
                            slidesToScroll: 5,
                        }
                    }, {
                        breakpoint: 640,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                        }
                    }, {
                        breakpoint: 420,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        }
                    }]
                });

            $('.slider-single').on('afterChange', function(event, slick, currentSlide) {
                $('.slider-nav').slick('slickGoTo', currentSlide);
                var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
                $('.slider-nav .slick-slide.is-active').removeClass('is-active');
                $(currrentNavSlideElem).addClass('is-active');
            });

            $('.slider-nav').on('click', '.slick-slide', function(event) {
                event.preventDefault();
                var goToSingleSlide = $(this).data('slick-index');

                $('.slider-single').slick('slickGoTo', goToSingleSlide);
            });



            let worksBlock = $('.product-row');
            let worksSlickInitialized = false;

            function initializeSlick() {
                worksBlock.slick({
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
                    worksBlock.slick("unslick");
                    worksSlickInitialized = false;
                }
            }

            function checkWindowSize() {
                let screenWidth = $(window).width();

                if (screenWidth <= 426) {
                    initializeSlick();
                } else if (screenWidth > 425) {
                    destroySlick();
                }
            }

            checkWindowSize();

            $(window).on('resize', checkWindowSize);

            $(".button-see-all").on("click", function (event) {
                event.preventDefault();
                $(".popup-overlay").fadeIn();
            });

            $(".close-popup").on("click", function () {
                $(".popup-overlay").fadeOut();
            });

            $(".popup-overlay").on("click", function (event) {
                if ($(event.target).is(".popup-overlay")) {
                    $(".popup-overlay").fadeOut();
                }
            });

            let phoneMask = IMask(document.getElementById('phone'), {
                mask: '+{380} 00 000 00 00',
                prepare: function (str) {
                    return str.replace(/^380/, '');
                },
            });
        });


        let isInitCommentsForm = false;
        const commentsForm = document.getElementById('submit-comment');

        if (commentsForm) {
            commentsForm.addEventListener('click', function (e) {
                e.preventDefault();

                if (!isInitCommentsForm) {
                    let captchaScriptComments = document.createElement('script');
                    captchaScriptComments.setAttribute('src', 'https://www.google.com/recaptcha/api.js?onload=initCaptchaComment&render=explicit');
                    document.head.appendChild(captchaScriptComments);
                } else {
                    sendFormComments();
                }
                isInitCommentsForm = true;
                return false;
            });
        }

        function initCaptchaComment() {
            const public_key = '{{env('CAPTCHA_PUBLIC')}}';

            const captcha = grecaptcha.render("captchaComment", {
                sitekey: public_key,
            });

        }

        async function sendFormComments() {
            const form = $('#reviewForm');

            const name = form.find('input[name="name"]').val().trim();
            const comment = form.find('textarea[name="comment"]').val().trim();

            if (!name || !comment) {
                showMessage("Заповни ім'я та коментар", 'error');
                return;
            }

            $.ajax({
                url: '{{ route("reviews.store") }}',
                data: form.serialize(),
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        let newReview = `
                                <div class="block-review">
                                    <div class="comment">
                                        <div class="info-review">
                                          <div>${response.comment.rating}/5</div>
                                          <div>${response.comment.comment}</div>
                                         </div>
                                        <div class="name">${response.comment.name}</div>
                                    </div>
                                </div>
                            `;

                        $('#reviewsContainer').prepend(newReview);
                    }
                },
                error: function (response) {
                    alert('Виникла помилка. Спробуйте ще раз.');
                }
            });

        }

        function showMessage(message, type) {
            const errorMessage = $('#error-message');
            errorMessage.html(`<div class="alert alert-${type}">${message}</div>`);
        }


        let isInitContactsForm = false;
        const contactsForm = document.getElementById('submit-callback');

        if (contactsForm) {
            contactsForm.addEventListener('click', function (e) {
                e.preventDefault();

                if (!isInitContactsForm) {
                    let captchaScript = document.createElement('script');
                    captchaScript.setAttribute('src', 'https://www.google.com/recaptcha/api.js?onload=initCaptcha&render=explicit');
                    document.head.appendChild(captchaScript);
                } else {
                    sendFormContacts();
                }
                isInitContactsForm = true;
                return false;
            });
        }

        function initCaptcha() {
            const public_key = '{{env('CAPTCHA_PUBLIC')}}';

            const captcha = grecaptcha.render("captcha", {
                sitekey: public_key,
            });
            document.querySelector('.call-back-form form').style.height = '370px';

        }

        async function sendFormContacts() {
            const form = $('#callback-form');

            // Validate the form fields
            const name = form.find('input[name="name"]').val().trim();
            const phone = form.find('input[name="phone"]').val().trim();

            if (!name || !phone) {
                showMessage("Ім'я та телефон повинні бути заповнені", 'error');
                return;
            }

            $.ajax({
                url: '{{ route("submit.callback") }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                data: form.serialize(),
                dataType: 'json',
                success: function (data) {
                    form[0].reset();
                    showMessage(data.message, 'success');
                },
                error: function (xhr, status, error) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessages = '';
                        for (let key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                errorMessages += errors[key].join(' ') + ' ';
                            }
                        }
                        showMessage(errorMessages, 'error');
                    } else {
                        showMessage('Упс... Щось сталось, спробуй пізніше', 'error');
                    }
                    console.error('There has been a problem with your AJAX request:', error);
                }
            });
        }

        function showMessage(message, type) {
            const errorMessage = $('#error-message');
            errorMessage.html(`<div class="alert alert-${type}">${message}</div>`);
        }


    </script>

@endpushonce

@pushOnce('css')
    <style>
        .slider-nav .slick-slide { cursor: pointer; }

        .slick-slide.is-active{
            border: 2px solid var(--color-main-orange);
        }

        .slick-slide img {
            width: 100%;
        }

        .slider-nav .slick-track {
            display: flex;
            justify-content: flex-start;
            width: 100% !important;
        }

        .slider-nav .slick-track div{
            margin-right: 20px;
        }
        .slider-nav {
            margin-top: 20px;
        }
        .slider-single .slick-track {
            height: 400px;
        }

        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .alert-success {
            color: green;
        }

        .alert-error {
            color: red;
        }

        .popup-content {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            border-radius: 10px;
            z-index: 1001;
            max-width: 450px;
            width: 100%;
        }

        .close-popup {
            cursor: pointer;
            color: red;
            float: right;
            font-size: 18px;
        }

        .call-back-form {
            width: 450px;
            background: var(--color-dark-grey);
            border-radius: 30px;
            padding: 25px;
            height: 100%;
        }

        .call-back-form-title {
            font-family: var(--main-font);
            color: var(--color-white);
            text-align: center;
            margin-top: 25px;
            font-weight: 500;
            font-size: 23px;
            margin-bottom: 50px;
        }

        .call-back-form form {
            background: var(--color-light-grey);
            height: 298px;
            border-radius: 15px;
        }


        .form-callback {
            display: flex;
            flex-direction: column;
            padding: 32px 50px 0 50px;
        }

        .form-callback .description {
            color: var(--color-white);
            font-family: var(--main-font);
            font-size: 12px;
            margin-bottom: 30px;
        }

        .form-callback input {
            border-radius: 30px;
            background: #484848;
            color: var(--color-white);
            border: none;
            padding: 17px;
            font-size: 12px;
            font-family: var(--main-font);
            margin-bottom: 20px;
        }

        .form-callback input[type="submit"] {
            background: var(--color-main-orange);
            width: 185px;
            margin-top: 15px;
            align-self: flex-end
        }

        .pagination {
            display: flex;
            justify-content: space-between;
            padding: 0;
            list-style: none;
            margin: 20px 0;
        }

        #paginationLinks {
            display: flex;
            justify-content: center;
        }

        .pagination li {
            margin: 0 10px;
        }

        #paginationLinks nav a {
            margin: 0 10px !important;
        }

        .pagination .active span {
            margin: 0 10px !important;
            color: var(--color-main-orange) !important;
        }

        .pagination li a,
        .pagination li span {
            display: block;
            text-decoration: none;
            color: var(--color-white);
            border-radius: 4px;
        }

        .pagination li a:hover {
            color: var(--color-main-orange);
        }

        .pagination li.active span {
            color: var(--color-white);
        }

        .pagination li.disabled span {
            pointer-events: none;
        }

        .reviews-form {
            width: 500px;
            background: var(--color-dark-grey);
            border-radius: 30px;
            padding: 25px;
            height: 100%;
        }

        .reviews-form-title {
            font-family: var(--main-font);
            color: var(--color-white);
            text-align: center;
            margin-top: 25px;
            font-weight: 500;
            font-size: 23px;
            margin-bottom: 50px;
        }

        .reviews-form form {
            background: var(--color-light-grey);
            border-radius: 15px;
        }

        .reviews-section {
            display: flex;
            margin-top: 30px;
        }

        .block-reviews {
            display: flex;
            flex-direction: column;
            color: var(--color-white);
            font-family: var(--main-font);
            font-size: 16px;
        }

        .comment {
            width: 100%;
            margin-bottom: 20px;
        }

        .reviews {
            margin-right: 20px;
            width: 100%;
        }

        .block-review {
            width: calc(100% - 30px);
            margin-right: 30px;
            margin-bottom: 25px;
        }

        .info-review > div:first-child {
            margin-bottom: 10px;
        }

        .block-review .name {
            margin-top: 15px;
            margin-left: 10px;
        }

        .info-review {
            border: 1px solid var(--color-white);
            padding: 30px;
            border-radius: 30px 30px 30px 0;
        }

        .form-reviews {
            display: flex;
            flex-direction: column;
            padding: 32px 25px 0 25px;
        }

        .form-reviews .description {
            color: var(--color-white);
            font-family: var(--main-font);
            font-size: 12px;
            margin-bottom: 20px;
        }

        .form-reviews input {
            border-radius: 30px;
            background: #484848;
            color: var(--color-white);
            border: none;
            padding: 17px;
            font-size: 12px;
            font-family: var(--main-font);
            margin-bottom: 20px;
        }

        .form-reviews textarea {
            border-radius: 30px;
            background: #484848;
            color: var(--color-white);
            border: none;
            padding: 17px;
            font-size: 12px;
            font-family: var(--main-font);
            margin-bottom: 20px;
            max-width: 100%;
        }

        .form-reviews input[type="submit"] {
            background: var(--color-main-orange);
            width: 185px;
            margin-top: 15px;
            align-self: flex-end
        }


        .product-desc .description {
            width: 450px;
            color: var(--color-white);
            font-size: 20px;
            font-family: var(--main-font);
            font-weight: 500;
        }

        .product-desc .title {
            width: 450px;
            color: var(--color-white);
            font-size: 40px;
            font-family: var(--main-font);
            font-weight: 700;
            margin-bottom: 60px;
            text-transform: uppercase;
        }

        .product {
            margin-top: 50px;
            display: flex;
        }

        .sub-title {
            color: var(--color-white);
            font-family: var(--main-font);
            font-size: 24px;
            margin-top: 50px;
            width: 250px;
            text-transform: uppercase;
        }

        .product-row {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }

        .cssSlider {
            display: flex;
            flex-direction: column;
            position: relative;
            width: 50%;
            overflow: hidden;
            margin-right: 40px;
        }

        .rating_block {
            width: 125px;
            height: 25px;
            margin-bottom: 20px;
        }

        .rating_block input[type="radio"] {
            display: none;
        }

        .label_rating {
            float: right;
            display: block;
            width: 25px;
            height: 25px;
            background: url({{asset('images/siteImages/rating.png')}}) no-repeat 50% 0;
            cursor: pointer;
        }

        .rating_block .label_rating:hover,
        .rating_block .label_rating:hover ~ .label_rating,
        .rating_block input[type="radio"]:checked ~ .label_rating {
            background-position: 50% -25px;
        }

        @-webkit-keyframes slide {
            0% {
                -webkit-transform: translateX(-100%);
                transform: translateX(-100%);
            }
            100% {
                -webkit-transform: translateX(0%);
                transform: translateX(0%);
            }
        }

        @keyframes slide {
            0% {
                -webkit-transform: translateX(-100%);
                transform: translateX(-100%);
            }
            100% {
                -webkit-transform: translateX(0%);
                transform: translateX(0%);
            }
        }

        @-webkit-keyframes hidden {
            0% {
                z-index: 2;
                -webkit-transform: translateX(0%);
                transform: translateX(0%);
            }
            100% {
                z-index: 2;
                -webkit-transform: translateX(100%);
                transform: translateX(100%);
            }
        }

        @keyframes hidden {
            0% {
                z-index: 2;
                -webkit-transform: translateX(0%);
                transform: translateX(0%);
            }
            100% {
                z-index: 2;
                -webkit-transform: translateX(100%);
                transform: translateX(100%);
            }
        }


        @media screen and (max-width: 1301px) {
            .slider-single .slick-track {
                height: 300px;
            }

            .product-desc .title {
                font-size: 30px;
                margin-bottom: 30px;
                width: 300px;
            }

            .cssSlider {
                height: auto;
            }

            .cssSlider .slides {
                height: 300px;
            }

            .cssSlider .slides > li {
                height: 300px;
            }

            .cssSlider .thumbnails {
                margin-top: 0;
            }

            .product-desc .description {
                font-size: 15px;
                width: 300px;
            }

            .cssSlider {
                width: 70%;
                margin-right: 20px;
            }

            .cssSlider .thumbnails > li {
                height: 100%;
                float: left;
                margin-right: 10px;
                width: calc(20% - 10px);
            }

            .block-reviews {
                font-size: 14px;
            }

            .reviews-form-title {
                font-size: 20px;
                margin-top: 15px;
                margin-bottom: 20px;
            }

            .form-reviews {
                padding: 20px 30px 0 30px;
            }

            .form-reviews input {
                padding: 10px;
            }

            .form-reviews textarea {
                padding: 10px;
            }

            .form-reviews input[type="submit"] {
                font-size: 11px;
            }
        }

        @media screen and (max-width: 426px) {
            .product {
                flex-direction: column;
                align-items: center;
            }

            .cssSlider {
                width: 100%;
                margin-right: 0;
            }

            .cssSlider .slides {
                height: 275px;
            }

            .cssSlider .slides > li {
                height: 275px;
            }

            .product .product-desc {
                margin-top: 30px;
            }

            .product .product-desc .title {
                width: 100%;
            }

            .product .product-desc .description {
                width: 100%;
            }


            .product-row img {
                width: 100%;
                height: 100%;
            }

            .product-row > div {
                margin-right: 0;
                margin-bottom: 50px;
            }

            .slick-dots {
                margin-bottom: 50px;
            }

            .reviews-section {
                flex-direction: column;
            }

            .reviews-form {
                margin-top: 25px;
                width: 100%;
            }

            .block-review {
                width: 100%;
            }
        }

        @media screen and (max-width: 376px) {
            .cssSlider .slides {
                height: 245px;
            }

            .slider-single .slick-track {
                height: 245px;
            }

            .cssSlider .slides > li {
                height: 245px;
            }
        }

    </style>
@endPushOnce
