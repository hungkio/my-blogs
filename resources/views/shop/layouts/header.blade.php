<!-- HEADER -->
<header class="header header-index">
    <div class="topbar hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="top-info">

                        <li><i class="fa fa-phone color-x" aria-hidden="true"></i> <a href="tel:{{ setting('store_phone') }}">{{ setting('store_phone') }}</a>
                        </li>
                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:support@sapo.vn">{{ setting('store_email') }}</a>
                        </li>

                    </ul>
                </div>
                <div class="col-md-6">
{{--                    <ul class="list-inline f-right ul-acccount">--}}

{{--                        <li><a href="account/login"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a></li>--}}
{{--                        <li><a href="account/register"><i class="fa fa-user-plus" aria-hidden="true"></i> Đăng ký</a>--}}
{{--                        </li>--}}

{{--                    </ul>--}}
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
                        <a href="{{ route('home') }}" class="logo-wrapper ">
                            <img src="{{ \Storage::url(setting('store_logo')) }}" alt="logo Ant Du lịch">
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
                                <input type="search" name="query" value="" placeholder="Tìm kiếm..."
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
                                 alt="Liên hệ"/>
                            <div class="hotline-text">

                                <a href="tel:{{ setting('store_phone') }}">Liên hệ</a>
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


                        <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">Trang chủ</a></li>

                        @if($menuHeaders->isNotEmpty())
                            @foreach($menuHeaders as $menu)
                                <li class="nav-item {{ $menu->childs->count() > 0 ? 'has-mega' : '' }}">
                                    <a href="{{ $menu->urlMenu() }}"
                                       class="nav-link @if(request()->fullUrl() == $menu->urlMenu())
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

{{--Header mobile--}}
<div class="c-menu--slide-left">
    <div class="la-nav-top-login">
        <div class="la-avatar-nav p-relative text-center">
            <a href="account">
                <img class="img-responsive" src="{{ \Storage::url(setting('store_logo')) }}"
                     alt="avatar">
            </a>
{{--            <div class="la-hello-user-nav ng-scope">Xin chào</div>--}}
            <img id="close-nav" class="c-menu__close"
                 src="/sapo/assets/ic-close-menu.png" alt="close nav">
        </div>
        <div class="la-action-link-nav text-center">

{{--            <a href="account/login" class="uppercase">ĐĂNG NHẬP</a>--}}
{{--            <a href="account/register" class="uppercase">ĐĂNG KÝ</a>--}}

        </div>
    </div>
    <div class="la-scroll-fix-infor-user">
        <!--CATEGORY-->
        <div class="la-nav-menu-items">
            <div class="la-title-nav-items">Tất cả danh mục</div>
            <ul class="la-nav-list-items">


                <li class="ng-scope">
                    <a href="{{ route('home') }}">Trang chủ</a>
                </li>

                @if($menuHeaders->isNotEmpty())
                    @foreach($menuHeaders as $menu)
                        <li class="ng-scope {{ $menu->childs->count() > 0 ? 'ng-has-child1' : '' }}">
                            <a href="{{ $menu->urlMenu() }}">{{ $menu->name }}
                                @if($menu->childs->count() > 0)
                                    <i class="fa fa-plus fa1" aria-hidden="true"></i>
                                @endif
                            </a>

                            @if($menu->childs->count() > 0)
                                <ul class="ul-has-child1">
                                    @foreach($menu->childs as $child)
                                        <li class="ng-scope ng-has-child2">
                                            <a href="{{ $child->urlMenu() }}">{{ $child->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                @endif

            </ul>
        </div>
    </div>
</div>
