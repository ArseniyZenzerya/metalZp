<header class="container header">
    <div>
        <a href="{{route('home')}}">
            <img src="{{asset('images/siteImages/logo-light.svg')}}" alt="Логотип" class="logo">
        </a>
    </div>
    @if (Route::currentRouteNamed('home'))
        <nav>
            <a href="#about-us">Чому ми?</a>
            <a href="#catalog">Каталог</a>
            <a href="#our-works">Наші роботи</a>
        </nav>
    @endif
    <div>
        <div class="lang">
        </div>
        <div class="burger">
            <img src="{{asset('images/siteImages/burger.svg')}}" alt="Меню">
        </div>
    </div>
</header>
<div class="navigation">
    <div class="escape">
        <img src="{{asset('images/siteImages/escape.svg')}}" alt="Виход">
    </div>
    <ul>
        <li><a href="">Чому ми?</a></li>
        <li><a href="">Каталог</a></li>
        <li><a href="">Наші роботи</a></li>
    </ul>
    <div class="lang">
    </div>
</div>
<div class="blurry-bg"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function(){
        $(".burger").click(function(){
            $(".navigation").fadeToggle();
            $(".blurry-bg").fadeToggle();
        });

        $(".escape").click(function(){
            $(".navigation").fadeOut();
            $(".blurry-bg").fadeOut();
        });

        $(document).mouseup(function(e){
            let container = $(".navigation");
            if (!container.is(e.target) && container.has(e.target).length === 0){
                container.fadeOut();
                $(".blurry-bg").fadeOut();
            }
        });
    });

</script>

<style>
    header {
        height: 50px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 40px;
        font-family: var(--main-font);
    }

    header > div {
        width: 50%;
    }

    header > div:last-child {
        display: flex;
        justify-content: flex-end;
    }

    .logo {
        width: 65px;
        height: 50px;
    }

    nav {
        display: flex;
        flex-shrink: 0;
    }

    nav a {
        margin-left: 30px;
        color: var(--color-white);
        font-size: 18px;
    }

    .lang {
        display: flex;
        width: 92px;
        height: 32px;
        border-radius: 30px;
        background: var(--color-white);
    }

    .burger {
        display: none;
    }

    .navigation {
        z-index: 10;
        position: absolute;
        left: 0;
        top: 0;
        display: none;
        width: 250px;
        height: 2870px;
        padding: 30px;
        background: var(--color-bg);
    }

    .navigation a {
        font-family: var(--main-font);
        color: var(--color-white);
        font-size: 16px;
    }

    .navigation ul {
        list-style: none;
    }

    .navigation li {
        margin-bottom: 40px;
    }

    .escape {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 30px;
    }

    .blurry-bg {
        display: none;
        width: 100%;
        height: 2870px;
        position: absolute;
        top: 0;
        z-index: 8;
        background: rgba(32, 32, 32, 0.5);
        backdrop-filter: blur(10px);
    }

    @media screen and (max-width: 1301px) {
        header {
            margin-top: 30px;
            height: 40px;
        }

        .logo {
            width: 50px;
            height: 40px;
        }

        nav a {
            font-size: 14px;
        }

        .lang {
            width: 73px;
            height: 23px;
        }
    }

    @media screen and (max-width: 769px) {
        nav {
            display: none;
        }

        header > div:last-child > .lang{
            display: none;
        }

        header > div:last-child {
            order: 1;
            justify-content: flex-start;
        }

        header > div:first-child {
            display: flex;
            order: 2;
            justify-content: flex-end;
        }

        .burger {
            display: block;
        }
    }
</style>
