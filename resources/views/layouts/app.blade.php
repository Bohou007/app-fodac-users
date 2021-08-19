@include('components.head')

<body onload="initElement()">
    <div class="cui-initial-loading"></div>
    @include('components.menuLeft')

    <div class="main-content" id="panel">
        @include('components.topBar')

        <div class="header bg-primary pb-3">
            <div class="container-fluid">
                <div class="header-body">
                    @include('components.breadcrumbs')

                    @yield('textOnHead')
                </div>
            </div>
        </div>
        <div class="container-fluid mt-5">
            @include('flash::message')
        </div>

        <div class="container-fluid mt-5">
            @yield('content')

            @include('components.footer')
        </div>
    </div>

    @include('components.script')
</body>

</html>
