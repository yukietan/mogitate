<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/common.css') }}">
        @yield('css')
    </head>
        <header class="header">
         <div class="header__inner">
          mogitate
         </div>
        </header>
    <body>
        @yield('content')
    </body>
</html>
