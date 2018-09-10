<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Terra_Shop</title>
        
        <!--outter css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Merienda|Zilla+Slab" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        
        <!--my custon stylesheet-->
        
        <!--general stylesheet-->
        <link rel="stylesheet" href="{{ secure_asset('css/terra_shop/main.css') }}" />
        <link rel="stylesheet" href="{{ secure_asset('css/terra_shop/nav.css') }}" />
        <link rel="stylesheet" href="{{ secure_asset('css/terra_shop/navigationForm.css') }}" />
        <link rel="stylesheet" href="{{ secure_asset('css/terra_shop/item.css') }}" />
        <link rel="stylesheet" href="{{ secure_asset('css/terra_shop/tags.css') }}" />
        <link rel="stylesheet" href="{{ secure_asset('css/terra_shop/footer.css') }}" />
        <link rel="stylesheet" href="{{ secure_asset('css/terra_shop/header.css') }}" />
        <link rel="stylesheet" href="{{ secure_asset('css/terra_shop/addCart.css') }}" />
        <link rel="stylesheet" href="{{ secure_asset('css/terra_shop/cart.css') }}" />
        
        <!--homepage stylesheet-->
        <link rel="stylesheet" href="{{ secure_asset('css/terra_shop/carousel.css') }}" />
        <link rel="stylesheet" href="{{ secure_asset('css/terra_shop/newest.css') }}" />
        
        <!--show stylesheet-->
        <link rel="stylesheet" href="{{ secure_asset('css/terra_shop/sidebar.css') }}" />
        <link rel="stylesheet" href="{{ secure_asset('css/terra_shop/classification.css') }}" />
        <link rel="stylesheet" href="{{ secure_asset('css/terra_shop/newItem.css') }}" />
        <link rel="stylesheet" href="{{ secure_asset('css/terra_shop/item.show.css') }}" />
        <link rel="stylesheet" href="{{ secure_asset('css/terra_shop/updateItem.css') }}" />
        <link rel="stylesheet" href="{{ secure_asset('css/terra_shop/register.css') }}" />
        <link rel="stylesheet" href="{{ secure_asset('css/terra_shop/login.css') }}" />
        <link rel="stylesheet" href="{{ secure_asset('css/terra_shop/orders.css') }}" />
        
    </head>
    <body>
        
       @include('partials.header')
       
       @include('partials.cartIcon')
       
       @yield('content')
       
       @include('partials.tags')
       
       @include('partials.footer')
        
        <!--my javascript-->
        <script type="text/javascript" src="{{ secure_asset('js/terra_shop/nav.js') }}"></script>
        <script type="text/javascript" src="{{ secure_asset('js/terra_shop/header.js') }}"></script>
        <script type="text/javascript" src="{{ secure_asset('js/terra_shop/carousel.js') }}"></script>
        <script type="text/javascript" src="{{ secure_asset('js/terra_shop/tags.js') }}"></script>
        <script type="text/javascript" src="{{ secure_asset('js/terra_shop/sidebar.js') }}"></script>
        <script type="text/javascript" src="{{ secure_asset('js/terra_shop/item.show.js') }}"></script>
    </body>
</html>