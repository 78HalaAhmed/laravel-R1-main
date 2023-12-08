

<!doctype html>
<html class="no-js" lang="en">

    @include('includes.head');
	
	<body>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
		
		@include('includes.header');
		@include('includes.toparea');
		@include('includes.welcome');
        @include('includes.list');
        @yield('content');
        @include('includes.footer');
		
		@include('includes.footerjs');
    </body>
	
</html>