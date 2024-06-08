<footer>
    <div class="container footer-up">
        <div>
            <img src="{{asset('images/siteImages/logo-light.svg')}}" alt="Логотип" class="logo">
        </div>
        <nav>
            <a href="">Чому ми?</a>
            <a href="">Каталог</a>
            <a href="">Наші роботи</a>
        </nav>
        <div class="social-network">
            <a href="">
                <div>
                    <img src="{{asset('images/siteImages/viber-logo.svg')}}" alt="">
                </div>
            </a>
            <a href="">
                <div>
                    <img src="{{asset('images/siteImages/telegram-logo.svg')}}" alt="">
                </div>
            </a>
        </div>
    </div>
    <hr color="#FD6909">
    <div class="container footer-down">
        <div>
            <div>+380966293442</div>
            <div>- Віталій</div>
        </div>
        <div>
            <div>+380669178126</div>
            <div>- Валерій</div>
        </div>
    </div>

</footer>


<style>
    footer {
        margin-top: 100px;
    }

    .footer-up {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 40px;
        margin-bottom: 20px;
        font-family: var(--main-font);
    }

    .footer-up > div {
        width: 50%;
    }

    .social-network {
        display: flex;
        justify-content: flex-end;
    }

    .social-network > a {
        margin-left: 20px;
    }

    .social-network > a > div > img {
        width: 30px;
        height: 30px;
    }

    .footer-down {
        margin-top: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 50px;
        font-family: var(--main-font);
    }

    .footer-down > div {
        margin: 0 15px;
        font-size: 14px;
        color: var(--color-white);
        font-weight: 500;
    }

    @media screen and (max-width: 1301px) {
        footer{
            margin-top: 50px;
        }

        .footer-down {
            margin-top: 10px;
            margin-bottom: 15px;
        }

        .footer-down > div {
            font-size: 12px;
        }

        .footer-up {
            margin-bottom: 5px;
        }

        .social-network > a > div > img {
            width: 25px;
            height: 25px;
        }
    }
</style>

<script type="text/javascript" src="../library/slick/slick.min.js"></script>
