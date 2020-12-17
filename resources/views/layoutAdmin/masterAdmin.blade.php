<!DOCTYPE html>
<html lang="en">

@include('layoutAdmin.headerAdmin')

<body>
    <div id="wrapper">
        
        @include('layoutAdmin.navbarAdmin')
        
        
        @yield('contentAdmin')

        @include('layoutAdmin.script')
        
        @yield('modal')
        
    </div>
</body>

</html>