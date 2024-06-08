@extends('layouts.app')


@section('content')
    <section class="index-page-body container">
        <div class="index-text">
            <div class="index-text-bigger">
                <div>
                    <span>Металоконструкції</span>
                </div>
                <div>
                    будь-якої складності
                </div>
            </div>
        </div>
        <div class="under-index-text">
            <div class="scene scene--card">
                <div class="card">
                    <div class="card__face card__face--front">
                        <img src="{{asset('images/siteImages/main-photo.png')}}" alt="">
                    </div>
                    <div class="card__face card__face--back">
                        <div class="call-back-form">
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
            </div>
        </div>
        <div class="align-center">
            <div class='button-order'>
                Безкоштовний замір
            </div>
        </div>

    </section>
    <section class="container catalog-section" id="catalog">
        <svg viewBox="0 0 1279 1279" fill="none" xmlns="http://www.w3.org/2000/svg" class="circle-bg">
            <g filter="url(#filter0_f_0_26)">
                <circle cx="639.5" cy="639.5" r="270" fill="#FD6909" />
            </g>
            <defs>
                <filter id="filter0_f_0_26" x="0" y="0" width="1279" height="1279" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                    <feGaussianBlur stdDeviation="155" result="effect1_foregroundBlur_0_26" />
                </filter>
            </defs>
        </svg>
        @include('components.title-section', ['title' => 'Каталог', 'subTitle' => '7 категорій'])
        <div class="catalog">
            <a href="" class="first-block">
                <div>
                    <div class="popup-category popup-stairs">
                        <span>01</span>
                        <img src="{{asset('images/siteImages/dash.svg')}}" alt="">
                        cходи
                    </div>
                </div>
            </a>
            <div class="sec-block">
                <a href="">
                    <div>
                        <div class="popup-category popup-bars">
                            <span>02</span>
                            <img src="{{asset('images/siteImages/dash.svg')}}" alt="">
                            решітки
                        </div>
                    </div>
                </a>
                <a href="">
                    <div>
                        <div class="popup-category popup-awnings">
                            <span>03</span>
                            <img src="{{asset('images/siteImages/dash.svg')}}" alt="">
                            навіси
                        </div>
                    </div>
                </a>
            </div>
            <a href="" class="third-block">
                <div>
                    <div class="popup-category popup-balcony">
                        <span>04</span>
                        <img src="{{asset('images/siteImages/dash.svg')}}" alt="">
                        балкони
                    </div>
                    <object>
                        <a href="{{route('categoryAll')}}">
                            <div class="all-catalog popup-catalog">
                                Весь каталог
                                <img src="{{asset('images/siteImages/triangle.svg')}}" class="triangle" alt="">
                            </div>
                        </a>
                    </object>
                </div>
            </a>
        </div>
        <div class="slider-category">
            <div class="popup-slider-blocks bg-stairs">
                <div class="popup-category popup-stairs">
                    <span>01</span>
                    <img src="{{asset('images/siteImages/dash.svg')}}" alt="">
                    cходи
                </div>
            </div>
            <div class="popup-slider-blocks bg-bars">
                <div class="popup-category popup-bars">
                    <span>02</span>
                    <img src="{{asset('images/siteImages/dash.svg')}}" alt="">
                    решітки
                </div>
            </div>
            <div class="popup-slider-blocks bg-awnings">
                <div class="popup-category popup-awnings">
                    <span>03</span>
                    <img src="{{asset('images/siteImages/dash.svg')}}" alt="">
                    навіси
                </div>
            </div>
            <div class="popup-slider-blocks bg-balcony">
                <div class="popup-category popup-balcony">
                    <span>04</span>
                    <img src="{{asset('images/siteImages/dash.svg')}}" alt="">
                    балкони
                </div>
            </div>
        </div>
        <div class="all-catalog-center">
            <a href="{{route('categoryAll')}}">
                <div class="catalog-mobile">
                    Весь каталог
                    <img src="{{asset('images/siteImages/triangle.svg')}}" class="triangle" alt="">
                </div>
            </a>
        </div>
    </section>
    <section class="container">
        <svg width="974" height="703" viewBox="0 0 974 703" fill="none" xmlns="http://www.w3.org/2000/svg" class="triangle-bg">
            <path d="M973.258 0.437856L243.945 702.604L0.507129 280.958L973.258 0.437856Z" fill="url(#paint0_linear_0_55)" />
            <defs>
                <linearGradient id="paint0_linear_0_55" x1="973.258" y1="0.437877" x2="127.131" y2="438.789" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FD6909" stop-opacity="0.48" />
                    <stop offset="1" stop-color="#FD6909" stop-opacity="0" />
                </linearGradient>
            </defs>
        </svg>
        <svg height="488"  fill="none" xmlns="http://www.w3.org/2000/svg" class="triangle-sec-bg">
            <path d="M-1.22872e-05 244.098L982.687 0.659991L982.687 487.536L-1.22872e-05 244.098Z" fill="url(#paint0_linear_0_54)" />
            <defs>
                <linearGradient id="paint0_linear_0_54" x1="-1.29493e-05" y1="244.098" x2="951.942" y2="287.538" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FD6909" stop-opacity="0.48" />
                    <stop offset="1" stop-color="#FD6909" stop-opacity="0" />
                </linearGradient>
            </defs>
        </svg>
        <div class="extra-info-block">
            <div class="extra-info">
                Також ми приймаємо індивідуальні замовлення, для уточнення деталей, звертайтесь в месенджери
                <div class="contact-messengers">
                    <a href="1">
                        <div>Ми в Telegram</div>
                    </a>
                    <a href="2">
                        <div>Ми в Viber</div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="why-we" id="about-us">
            @include('components.title-section', ['title' => 'Чому ми?', 'subTitle' => 'Чому ми?'])
            <div class="why-we-blocks">
                <div>
                    <div>10+
                        Років досвіду
                    </div>
                    <div>
                        Наша команда створює унікальні
                        та високоякісні металоконструкції будь-якого рівня складності.
                    </div>
                </div>
                <div>
                    <div>2-4
                        Працівника в бригаді
                    </div>
                    <div>
                        Ми розуміємо, що кожен проект унікальний. Наші інженери працюють, щоб розробити рішення, яке
                        відповідає вашим унікальним потребам.
                    </div>
                </div>
                <div>
                    <div>300+ Задоволених клієнтів
                    </div>
                    <div>
                        Що свідчить про нашу здатність надавати високоякісні послуги та відповідати їхнім потребам
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="our-works" id="our-works">
            @include('components.title-section', ['title' => 'Наші роботи'])
            <div class="our-works-block">
                <div>
                    <img src="{{asset('images/siteImages/main-photo.png')}}" alt="">
                </div>
                <div>
                    <img src="{{asset('images/siteImages/main-photo.png')}}" alt="">
                </div>
                <div>
                    <img src="{{asset('images/siteImages/main-photo.png')}}" alt="">
                </div>
                <div>
                    <img src="{{asset('images/siteImages/main-photo.png')}}" alt="">
                </div>
                <div>
                    <img src="{{asset('images/siteImages/main-photo.png')}}" alt="">
                </div>
                <div>
                    <img src="{{asset('images/siteImages/main-photo.png')}}" alt="">
                </div>
                <div>
                    <img src="{{asset('images/siteImages/main-photo.png')}}" alt="">
                </div>
                <div>
                    <img src="{{asset('images/siteImages/main-photo.png')}}" alt="">
                </div>
                <div>
                    <img src="{{asset('images/siteImages/main-photo.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="align-center">
            <a href="{{route('categoryAll')}}">
                <div class="button-see-all">Подивитись всі</div>
            </a>
        </div>
    </section>
@endsection


@section('meta')
    <title></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
@endsection


@pushonce('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>

    <script>

        $(document).ready(function() {

            let phoneMask = IMask(document.getElementById('phone'), {
                mask: '+{380} 00 000 00 00',
                prepare: function (str) {
                    return str.replace(/^380/, '');
                },
            });

            let $worksBlock = $('.our-works-block');
            let worksSlickInitialized = false;

            function initializeSlick() {
                $worksBlock.slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true,
                    infinite: true,
                    speed: 500
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
                let element = $('.index-text-bigger span');

                if (screenWidth <= 426) {
                    element.text('Метало-конструкції');
                    initializeSlick();
                } else if (screenWidth > 426) {
                    element.text('Металоконструкції');
                    destroySlick();
                }
            }

            checkWindowSize();

            $(window).on('resize', checkWindowSize);


            $('.slider-category').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                centerPadding: '60px',
                dots: true,
                centerMode: true,
                arrows: false,
                infinite: true,
                autoplay: true,
                speed: 500,
            });


            let card = document.querySelector('.card');
            let btnOrder = document.querySelector('.button-order');
            btnOrder.addEventListener('click', function () {
                card.classList.toggle('is-flipped');
            });

            let $page = $('html, body');
            $('a[href*="#"]').click(function () {
                $page.animate({
                    scrollTop: $($.attr(this, 'href')).offset().top
                }, 900);
                return false;
            });

        });

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

            const name = form.find('input[name="name"]').val().trim();
            const phone = form.find('input[name="phone"]').val().trim();
            const captchaResponse = grecaptcha.getResponse();

            if (!name || !phone) {
                showMessage("Заповніть ім'я та телефон", 'error');
                return;
            }

            if (!captchaResponse) {
                showMessage('Заповніть CAPTCHA', 'error');
                return;
            }

            $.ajax({
                url: '{{ route("submit.callback") }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                data: form.serialize() + '&g-recaptcha-response=' + captchaResponse,
                dataType: 'json',
                success: function (data) {
                    form[0].reset();
                    showMessage(data.message, 'success');
                    grecaptcha.reset();
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
                        showMessage('Під час надсилання форми сталася помилка', 'error');
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
        .alert-success {
            color: green;
        }
        .alert-error {
            color: red;
        }
        .card {
            display: flex;
            flex-direction: row-reverse;
            justify-content: space-between;
        }

        .button-order {
            align-items: center;
            margin-top: 50px;
            font-size: 12px;
            font-family: var(--main-font);
            padding: 17px;
            background: var(--color-main-orange);
            color: var(--color-white);
            border-radius: 30px;
            display: none;
        }

        .alert-success {
            color: green;
        }

        .scene {
            width: 100%;
        }

        .card__face--back {
            margin-right: 20px;
        }

        .card__face--front {
            width: 100%;
        }

        .slider-category{
            display: none;
            margin-top: 30px;
            height: 300px;
        }
        .slider-category div {
            border-radius: 30px;
        }
        .slider-category .popup-slider-blocks{
            position: relative;
            height: 236px;
            margin: 0 20px;
            transition: all .4s ease;
            display: flex;
            justify-content: center;
        }
        .slider-category .popup-slider-blocks.slick-center{
            transition: all .4s ease;
            margin-top: 50px;
        }
        .slick-dots {
            bottom: -35px;
        }


        .bg-stairs {
            background: url({{asset('images/siteImages/stairs.png')}});
            background-size: cover;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: flex-end;
            padding: 20px;
        }
        .bg-bars {
            background: url({{asset('images/siteImages/bars.png')}});
            background-size: cover;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: flex-end;
            padding: 20px;
        }
        .bg-awnings {
            background: url({{asset('images/siteImages/awnings.png')}});
            background-size: cover;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: flex-end;
            padding: 20px;
        }
        .bg-balcony {
            background: url({{asset('images/siteImages/balcony.png')}});
            background-size: cover;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: flex-end;
            padding: 20px;

        }


        .index-text {
            display: flex;
            font-family: var(--main-font);
            margin-bottom: 80px;
        }

        .index-page-body {
            margin-top: 60px;
        }

        .index-text-bigger {
            font-size: 60px;
            font-weight: 700;
            text-transform: uppercase;
            line-height: 90px;
        }


        .index-text-bigger div {
            display: flex;
            flex-direction: column;
            color: var(--color-white);
        }

        .index-text-bigger span {
            color: var(--color-main-orange);
        }

        .under-index-text {
            display: flex;
            justify-content: space-between;
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

        .catalog-section {
            margin-top: 100px;
        }

        .catalog {
            display: flex;
            height: 600px;
            width: 100%;
            margin-top: 50px;
        }

        .catalog > .first-block {
            width: 340px;
            height: 100%;
        }

        .catalog > .first-block > div {
            background: url({{asset('images/siteImages/stairs.png')}});
            background-size: cover;
            width: 100%;
            height: 100%;
            background-position: center;
            padding: 20px;
            display: flex;
            align-items: flex-end;
            justify-content: flex-end;
        }

        .catalog div {
            border-radius: 30px;
        }

        .catalog > .sec-block {
            width: calc(100% - 340px - 450px);
            height: 100%;
            display: flex;
            flex-direction: column;
            margin: 0 10px 0 10px;
        }

        .catalog > .sec-block > a:first-child {
            height: 280px;
            margin-bottom: 10px;
        }

        .catalog > .sec-block > a:nth-child(2) {
            height: calc(100% - 280px);
        }

        .catalog > .sec-block > a:first-child > div {
            background: url({{asset('images/siteImages/bars.png')}});
            background-size: cover;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: flex-end;
            padding: 20px;

        }

        .catalog > .sec-block > a:nth-child(2) > div {
            background: url({{asset('images/siteImages/awnings.png')}});
            background-size: cover;
            width: 100%;
            height: 100%;
            padding: 20px;
            display: flex;
            align-items: flex-start;

        }

        .catalog > .third-block {
            width: 450px;
            height: 100%;
        }

        .catalog > .third-block > div {
            background: url({{asset('images/siteImages/balcony.png')}});
            background-size: cover;
            width: 100%;
            height: 100%;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            flex-direction: column;
        }

        .popup-category {
            background: #202020;
            font-size: 20px;
            font-family: var(--main-font);
            color: var(--color-white);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 13px;
        }

        .popup-category > span {
            color: var(--color-main-orange);
        }

        .popup-stairs {
            width: 160px;
        }

        .popup-bars {
            width: 180px;
        }

        .popup-awnings {
            width: 180px;
        }

        .popup-balcony {
            width: 190px;
        }

        .popup-catalog {
            width: 100%;
            height: 100px;
        }


        .all-catalog {
            background: #202020;
            font-size: 20px;
            font-family: var(--main-font);
            color: var(--color-white);
            display: flex;
            align-items: center;
            padding: 40px;
        }

        .triangle {
            margin-left: 15px;
        }

        .extra-info-block {
            display: flex;
            justify-content: center;
            margin-top: 100px;
        }

        .extra-info {
            width: 970px;
            color: var(--color-white);
            font-size: 40px;
            font-family: var(--main-font);
            display: flex;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }

        .contact-messengers {
            display: flex;
            align-items: center;
            margin-top: 50px;
            justify-content: center;
            margin-right: 45px;
        }

        .contact-messengers > a > div {
            font-size: 16px;
            color: white;
            padding: 15px 32px;
            background: var(--color-main-orange);
            border-radius: 30px;
            width: 206px;
        }

        .contact-messengers > a:first-child > div {
            background: var(--color-dark-grey);
        }

        .contact-messengers > a:first-child {
            position: relative;
            left: 45px;
        }

        .why-we-blocks {
            margin-top: 50px;
            color: var(--color-white);
            display: flex;
            flex-direction: column;
        }

        .why-we-blocks > div {
            display: flex;
            border-radius: 30px;
            border: 3px solid var(--color-white);
            font-size: 20px;
            font-family: var(--main-font);
            padding: 50px;
            font-weight: 500;
        }

        .why-we-blocks > div > div:first-child {
            color: var(--color-main-orange);
            text-transform: uppercase;
            margin-right: 25px;
        }

        .why-we-blocks > div > div:nth-child(2) {
            width: 329px;
        }

        .why-we-blocks > div:nth-child(2) {
            position: relative;
            left: 505px;
            top: -130px;
        }

        .why-we-blocks > div:nth-child(3) {
            position: relative;
            top: -160px;
        }


        .why-we-blocks > div:nth-child(1) {
            width: 530px;
        }

        .why-we-blocks > div:nth-child(2) {
            width: 655px;
        }

        .why-we-blocks > div:nth-child(3) {
            width: 700px;
        }

        .why-we-blocks > div:nth-child(2) > div:first-child {
            width: 200px;
        }

        .our-works-block {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 50px;
        }

        .our-works-block > div {
            width: 380px;
            height: 380px;
            margin-bottom: 20px;
            padding: 15px;
            border: 2px rgba(255, 255, 255, 0.2) solid;
            border-radius: 30px;
        }

        .our-works-block > div > img {
            width: 100%;
            height: 100%;
        }

        .align-center {
            display: flex;
            justify-content: center;
        }

        .button-see-all {
            color: var(--color-white);
            font-family: var(--main-font);
            font-size: 14px;
            border-radius: 30px;
            padding: 6px 20px;
            border: 1px solid var(--color-main-orange);
            margin-top: 20px;
        }

        .form-callback {
            display: flex;
            flex-direction: column;
            padding: 32px 50px 0 50px;
        }

        .form-callback .description{
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

        .triangle-bg {
            z-index: -100;
            position: absolute;
            right: 20px;
            margin-top: -200px;
            fill: linear-gradient(186deg, rgba(253, 105, 9, 0.48) 0%, rgba(253, 105, 9, 0) 100%);
        }

        .triangle-sec-bg {
            width: 983px;
            z-index: -100;
            position: absolute;
            left: 20px;
            margin-top: 90px;
            fill: linear-gradient(186deg, rgba(253, 105, 9, 0.48) 0%, rgba(253, 105, 9, 0) 100%);
        }

        .circle-bg {
            position: absolute;
            border-radius: 100%;
            fill: #fd6909;
            margin-top: 30px;
            left: 0;
            z-index: -100;
            width: 500px;
            height: 500px;
        }

        .catalog-mobile {
            display: none;
        }

        @media screen and (max-width: 1301px) {
            .index-text-bigger {
                font-size: 48px;
                line-height: 54px;
            }

            .catalog > .third-block {
                width: 33%;
            }

            .catalog > .first-block {
                width: 33%;
            }

            .catalog > .sec-block {
                width: 33%;
            }

            .catalog {
                width: 100%;
                height: 385px;
                display: flex;
                justify-content: space-between;
            }

            .index-page-body {
                margin-top: 30px;
            }

            .call-back-form {
                width: 280px;
                padding: 20px;
            }

            .under-index-text  img{
                height: 270px;
                width: 100%;
            }


            .index-text {
                margin-bottom: 40px;
            }

            .form-callback {
                padding: 14px 20px 0 20px;
            }

            .call-back-form-title {
                margin-bottom: 15px;
                margin-top: 0;
                font-size: 16px;
            }

            .form-callback .description {
                font-size: 9px;
                margin-bottom: 15px;
            }

            .form-callback input {
                border-radius: 30px;
                padding: 10px;
                font-size: 10px;
                margin-bottom: 10px;
            }

            .call-back-form form {
                height: 185px;
            }

            .catalog-section {
                margin-top: 20px;
            }

            .catalog > .sec-block > a:first-child {
                height: 50%;
                margin-bottom: 10px;
            }

            .catalog > .sec-block > a:nth-child(2) {
                height: 50%;
            }

            .popup-category {
                font-size: 15px;
                padding: 6px;
            }

            .popup-category > span {
                color: var(--color-main-orange);
            }

            .popup-stairs {
                width: 130px;
            }

            .popup-bars {
                width: 140px;
            }

            .popup-awnings {
                width: 140px;
            }

            .popup-balcony {
                width: 150px;
            }

            .popup-catalog {
                width: 100%;
                height: 50px;
            }

            .all-catalog {
                font-size: 15px;
                padding: 27px;
            }

            .extra-info {
                width: 600px;
                font-size: 21px;
            }

            .extra-info-block {
                margin-top: 65px;
            }

            .contact-messengers {
                margin-top: 40px;
                margin-right: 45px;
            }

            .contact-messengers > a > div {
                font-size: 14px;
                padding: 12px 2px;
                width: 185px;
            }

            .why-we-blocks > div:nth-child(1) {
                width: 365px;
            }

            .why-we-blocks > div {
                font-size: 14px;
            }

            .why-we-blocks > div {
                padding: 28px;
            }

            .why-we-blocks > div:nth-child(2) {
                width: 407px;
                position: relative;
                left: 345px;
                top: -80px;
            }

            .why-we-blocks > div:nth-child(3) {
                width: 432px;
                position: relative;
                top: -117px;
            }

            .why-we-blocks {
                height: 365px;
            }

            .our-works-block > div {
                width: 240px;
                height: 240px;
                margin-bottom: 15px;
                padding: 15px;
            }
        }

        @media screen and (max-width: 1025px) {
            .triangle-sec-bg {
                width: calc(100% - 20px);
            }

            .form-callback input[type="submit"] {
                width: 135px;
                margin-top: 8px;
            }

            .under-index-text img {
                width: 100%;
            }

        }

        @media screen and (max-width: 769px) {
            .why-we-blocks > div:nth-child(2) {
                width: 400px;
                left: 339px;
                top: -73px;
            }
        }

        @media screen and (max-width: 426px) {
            .index-text-bigger {
                font-size: 36px;
                line-height: 38px;
            }

            .call-back-form {
                display: none;
            }

            .under-index-text {
                display: flex;
                justify-content: center;
            }

            .under-index-text img {
                width: 100%;
                margin-left: 0;
            }

            .catalog {
                display: none;
            }

            .slider-category {
                display: block;
            }

            .why-we-blocks div {
                position: relative;
                left: auto !important;
                right: auto !important;
                bottom: auto !important;
                top: auto !important;
                width: 100% !important;
                margin-bottom: 20px;
                flex-direction: column;
            }

            .why-we-blocks {
                height: auto;
            }

            .circle-bg {
                width: 100%;
                height: 100%;
            }

            .extra-info {
                font-size: 16px;
            }

            .our-works-block > div {
                width: auto !important;
                border: none;
                height: 255px;
            }

            .slick-slide > img {
                width: 100% !important;
                height: 100% !important;
            }

            .our-works-block .slick-slide {
                margin: 0 15px;
            }

            .our-works-block {
                margin-top: 10px;
            }

            .extra-info {
                width: 100%;
            }

            .our-works-block .slick-dots {
                bottom: -10px;
            }

            .all-catalog-center {
                display: flex;
                justify-content: center;
            }

            .catalog-mobile {
                margin-top: 20px;
                display: block;
                padding: 10px 20px;
                color: var(--color-white);
                font-family: var(--main-font);
                text-align: center;
                border-radius: 30px;
                background: #202020;
            }




            .scene {
                width: 100%;
                height: 300px;
                perspective: 600px;
            }

            .scene .call-back-form {
                display: flex;
                flex-direction: column;
                width: 100%;
                height: 100%;
            }

            .scene .call-back-form form {
                height: 100%;
            }

            .scene .form-callback .description {
                font-size: 12px;
                font-weight: 300;
            }

            .scene .form-callback .description {
                margin-bottom: 23px;
            }

            .card {
                width: 100%;
                height: 100%;
                transition: transform 1s;
                transform-style: preserve-3d;
                cursor: pointer;
                position: relative;
            }

            .card.is-flipped {
                transform: rotateX(180deg);
            }

            .card__face {
                position: absolute;
                width: 100%;
                height: 100%;
                color: white;
                font-weight: bold;
                font-size: 40px;
                -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
            }

            .card img {
                width: 100% !important;
                height: 100%;
            }

            .card__face--back {
                transform: rotateX(180deg);
                margin: 0;
            }

            .button-order {
                display: block;
            }
        }

        @media screen and (max-width: 375px) {
            .our-works-block > div {
                height: 215px;
            }
        }

        @media screen and (max-width: 321px) {
            .index-text-bigger {
                font-size: 33px;
                line-height: 35px;
            }

            .our-works-block > div {
                height: 180px;
            }

        }

    </style>

@endPushOnce
