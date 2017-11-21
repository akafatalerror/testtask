<!DOCTYPE html>
<html lang="en">
    <head>
        @include('common/meta')
    </head>

    <body>
        @include('common/header')
        <div class="container">
            <div class="starter-template">
                @yield('content')
            </div>
        </div><!-- /.container -->
        @yield('scripts')
    </body>
</html>
