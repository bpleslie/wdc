{{-- Navigation --}}
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        {{-- Brand and toggle get grouped for better mobile display --}}
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#navbar-main">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{{ config('retailer.name') }}</a>
        </div>

        {{-- Collect the nav links, forms, and other content for toggling --}}
        <div class="collapse navbar-collapse" id="navbar-main">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/retailer/map">Map</a>
                </li>
                <li>
                    <a href="/retailer/list">List</a>
                </li>
                <li>
                    <a href="/blog">Blog</a>
                </li>
                <li>
                    <a href="/auth/login">Log In</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
