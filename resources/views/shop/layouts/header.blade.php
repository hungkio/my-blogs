<!-- HEADER -->
{{--<header class="header-area">--}}
{{--    <div class="header-top second-header d-none d-md-block">--}}
{{--        <div class="container">--}}
{{--            <div class="row align-items-center">--}}
{{--                <div class="col-lg-3 col-md-3 d-none d-lg-block">--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 col-md-8 d-none  d-md-block">--}}
{{--                    <div class="header-cta">--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <i class="icon dripicons-mail"></i>--}}
{{--                                <span>{{ setting('store_email') }}</span>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <i class="icon dripicons-phone"></i>--}}
{{--                                <span>{{ setting('store_phone') }}</span>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 col-md-3 d-none d-lg-block">--}}
{{--                    <form class="input-group float-left w-75" method="get" action="{{ route('search') }}">--}}
{{--                        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="{{ __('Tìm kiếm bài viết, trang...') }}"--}}
{{--                               aria-label="{{ __('Tìm kiếm bài viết, trang...') }}" aria-describedby="basic-addon2">--}}
{{--                        <div class="input-group-append" style="height: calc(1.5em + 0.75rem + 0.2rem);">--}}
{{--                            <button class="btn btn-outline-secondary" type="submit" style="line-height: 25%;">{{ __('Tìm kiếm') }}--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                    <div class="header-social text-right">--}}
{{--                        <span>--}}
{{--                            <a href="{{ setting('link_facebook', '') }}" target="_blank" title="Facebook"><i class="fab fa-facebook"></i></a>--}}
{{--                            <a href="{{ setting('link_youtube', '') }}" target="_blank" title="Youtube"><i class="fab fa-youtube"></i></a>--}}
{{--                       </span>--}}
{{--                        <!--  /social media icon redux -->--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div id="header-sticky" class="menu-area">--}}
{{--        <div class="container">--}}
{{--            <div class="second-menu">--}}
{{--                <div class="row align-items-center">--}}
{{--                    <div class="col-xl-2 col-lg-2">--}}
{{--                        <div class="logo">--}}
{{--                            @if(setting('store_logo'))--}}
{{--                                    <a href="{{ route('home') }}"><img--}}
{{--                                    src="{{ \Storage::url(setting('store_logo')) }}"--}}
{{--                                    alt="logo"></a>--}}
{{--                            @else--}}
{{--                                <a href="{{ route('home') }}" title="{{ setting('store_name') }}">--}}
{{--                                    <span>{{ mb_strimwidth(setting('store_name'), 0, 15) }}</span>--}}
{{--                                </a>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-8 col-lg-8">--}}
{{--                        <div class="main-menu text-right pr-15">--}}
{{--                            <nav id="mobile-menu">--}}
{{--                                <ul>--}}
{{--                                    <li class="has-sub">--}}
{{--                                        <a href="{{ route('home') }}">{{ __('Trang chủ') }}</a>--}}
{{--                                    </li>--}}
{{--                                    @if($menuHeaders->isNotEmpty())--}}
{{--                                        @foreach($menuHeaders as $menu)--}}
{{--                                            <li class="{{ $menu->childs->count() > 0 ? 'has-sub' : '' }}">--}}
{{--                                                <a href="{{ $menu->urlMenu() }}"--}}
{{--                                                   class="@if(request()->fullUrl() == $menu->urlMenu())--}}
{{--                                                       active @endif">{{ $menu->name }}</a>--}}
{{--                                                <ul>--}}
{{--                                                    @if($menu->childs->count() > 0)--}}
{{--                                                        @foreach($menu->childs as $child)--}}
{{--                                                            <li>--}}
{{--                                                                <a href="{{ $child->urlMenu() }}"--}}
{{--                                                                   class="@if(request()->fullUrl() == ($child->urlMenu()))--}}
{{--                                                                       active @endif">{{ $child->name }}</a>--}}
{{--                                                            </li>--}}
{{--                                                        @endforeach--}}
{{--                                                    @endif--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}
{{--                                </ul>--}}
{{--                            </nav>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-2 col-lg-2 d-none d-lg-block">--}}
{{--                        <a href="{{ route('page.contact') }}" class="top-btn">{{ __('Liên hệ') }} <i--}}
{{--                                class="fas fa-chevron-right"></i></a>--}}
{{--                    </div>--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="mobile-menu"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</header>--}}

<header class="header header-index">
    <div class="topbar hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="top-info">

                        <li><i class="fa fa-phone color-x" aria-hidden="true"></i> <a href="tel:19006750">1900 6750</a>
                        </li>
                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:support@sapo.vn">support@sapo.vn</a>
                        </li>

                    </ul>
                </div>
                <div class="col-md-6">

                    <ul class="list-inline f-right ul-acccount">

                        <li><a href="account/login"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a></li>
                        <li><a href="account/register"><i class="fa fa-user-plus" aria-hidden="true"></i> Đăng ký</a>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="header-main">
            <div class="row">
                <div class="col-md-3">
                    <button type="button" class="nav-line-group hidden-lg hidden-md">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="logo">
                        <a href="" class="logo-wrapper ">
                            <img src="/sapo/assets/logo.png" alt="logo Ant Du lịch">
                        </a>
                    </div>
                    <a href="cart" class="icon-option-cart hidden-lg hidden-md hidden">
                        <span class="ng-binding ng-hide cart-products-count">0</span>
                    </a>
                </div>
                <div class="col-md-5">
                    <div class="search">
                        <div class="header_search search_form">
                            <form class="input-group search-bar search_form" action="search" method="get" role="search">
                                <input type="search" name="query" value="" placeholder="Tìm kiếm tour..."
                                       class="input-group-field st-default-search-input search-text" autocomplete="off">
                                <span class="input-group-btn">
			<button class="btn icon-fallback-text">
				<i class="fa fa-search"></i>
			</button>
		</span>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 hidden-sm hidden-xs">
                    <div class="top-fun">
                        <div class="hotline">
                            <img src="/sapo/assets/hotline.svg"
                                 alt="Tổng đài miễn phí"/>
                            <div class="hotline-text">

                                <a href="tel:19006750">1900 6750</a>

                                <span>Tổng đài miễn phí</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul id="nav" class="nav container">


                        <li class="nav-item active"><a class="nav-link" href="">Trang chủ</a></li>

                        @if($menuHeaders->isNotEmpty())
                            @foreach($menuHeaders as $menu)
                                <li class="nav-item {{ $menu->childs->count() > 0 ? 'has-mega' : '' }}">
                                    <a href="{{ $menu->urlMenu() }}" class="nav-link @if(request()->fullUrl() == $menu->urlMenu())
                                        active @endif">{{ $menu->name }}
                                        @if($menu->childs->count() > 0)
                                            <i class="fa fa-angle-right" data-toggle="dropdown"></i>
                                        @endif
                                    </a>
                                    @if($menu->childs->count() > 0)
                                    <div class="mega-content">
                                        <div class="level0-wrapper2">
                                            <div class="nav-block nav-block-center">
                                                <ul class="level0">
                                                    @if($menu->childs->count() > 0)
                                                        @foreach($menu->childs as $child)
                                                            <li class="level1 parent item">
                                                                <h2 class="h4">
                                                                    <a href="{{ $child->urlMenu() }}"
                                                                       class="@if(request()->fullUrl() == ($child->urlMenu()))
                                                                        active @endif"><span>{{ $child->name }}</span></a>
                                                                </h2>
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </li>
                            @endforeach
                        @endif

                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- Header-end -->
