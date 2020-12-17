<!DOCTYPE html>
<html lang="en">

@include('layoutMitra.headerMitra')

<body>
    <div id="wrapper">
        
        @include('layoutMitra.navbarMitra')
        
        
        @yield('contentMitra')

        @include('layoutMitra.scriptMitra')
        
        @yield('modal')
        
    </div>
</body>

</html>