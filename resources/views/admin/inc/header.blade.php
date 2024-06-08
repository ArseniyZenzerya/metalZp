<header class="header">
    <a href="{{route('home')}}">
        <img src="{{asset('images/siteImages/logo-light.svg')}}" alt="Логотип" class="logo">
    </a>
    Admin panel
</header>
@auth()
    <nav>
        <div>
            @foreach(
               [
                route('admin.categories.list') => 'Категорії',
                route('admin.products.list') => 'Продукти',
                route('admin.product-view') => 'Статистика продуктів',

               ]
               as $link => $title)
                <a href="{{$link}}">{{$title}}</a>
            @endforeach
        </div>
        <div>
            <a href="{{route('logout')}}">Log out</a>
        </div>
    </nav>
@endauth
<style>
    header {
        height: 50px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-family: var(--main-font);
        background: var(--color-main-orange);
        padding: 50px 200px;
        color: var(--color-white);
    }

    nav {
        display: flex;
        justify-content: space-between;
        background: var(--color-light-grey);
        margin-bottom: 50px;
        padding: 15px 200px;
    }

    nav div:first-child a {
        margin-right: 50px;
    }

    nav div a {
        color: var(--color-white);
        text-decoration: none;
    }

    nav a:hover {
        color: var(--color-main-orange);
        transition: 0.3s;
    }
</style>
