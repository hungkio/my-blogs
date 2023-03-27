@extends('shop.layouts.app')
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endpush
@section('title')
    {{ setting('store_name') }}
    @if(!empty(setting('store_slogan')))
        -
    @endif
    {{ setting('store_slogan') }}
@endsection
@section('seo')
    <link rel="canonical" href="{{ request()->fullUrl() }}">
    <meta name="title" content="{{ setting('store_name') }} - {{ setting('store_slogan') }}">
    <meta name="description" content="{{ setting('store_description') }}">
    <meta name="keywords" content="{{ setting('store_name') }}">
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta property="og:title" content="{{ setting('store_name') }} - {{ setting('store_slogan') }}">
    <meta property="og:description" content="{{ setting('store_description') }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ setting('store_logo') ? \Storage::url(setting('store_logo')) : '' }}">
    <meta property="og:site_name" content="{{ url('') }}">
@stop
@section('content')
    <!-- main-area -->
    <section class="awe-section-7">
        @if($categories)
            @foreach($categories as $category)
                <section class="section-news margin-bottom-20">
                    <div class="container">
                        <div class="blogs-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section_tour-new_title">
                                        <h2>{{ $category->name }}</h2>
                                        <div class="title-line">
                                            <div class="tl-1"></div>
                                            <div class="tl-2"></div>
                                            <div class="tl-3"></div>
                                        </div>
                                        <p>{{ $category->description }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="news_hot_left">
                                <div class="row">
                                    @if($category->posts)
                                        @foreach($category->posts as $key => $post)
                                            @if($key == 0)
                                                <div class="news_owl col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item_blog_big">
                                                        <div class="figure-big">
                                                            <div class="img_thumb_blogs">
                                                                <a href="{{ $post->url() }}"
                                                                   class="big_img_h">
                                                                    <picture>
                                                                        <source media="(max-width: 480px)"
                                                                                srcset="{{ $post->getFirstMediaUrl('image') ?? '/backend/global_assets/images/placeholders/placeholder.jpg' }}">
                                                                        <source
                                                                            media="(min-width: 481px) and (max-width: 767px)"
                                                                            srcset="{{ $post->getFirstMediaUrl('image') ?? '/backend/global_assets/images/placeholders/placeholder.jpg' }}">
                                                                        <source
                                                                            media="(min-width: 768px) and (max-width: 1023px)"
                                                                            srcset="{{ $post->getFirstMediaUrl('image') ?? '/backend/global_assets/images/placeholders/placeholder.jpg' }}">
                                                                        <source
                                                                            media="(min-width: 1024px) and (max-width: 1199px)"
                                                                            srcset="{{ $post->getFirstMediaUrl('image') ?? '/backend/global_assets/images/placeholders/placeholder.jpg' }}">
                                                                        <source media="(min-width: 1200px)"
                                                                                srcset="{{ $post->getFirstMediaUrl('image') ?? '/backend/global_assets/images/placeholders/placeholder.jpg' }}">
                                                                        <img
                                                                            src="{{ $post->getFirstMediaUrl('image') ?? '/backend/global_assets/images/placeholders/placeholder.jpg' }}"
                                                                            title="{{ $post->title }}"
                                                                            alt="{{ $post->title }}"
                                                                            class="img-responsive center-block"/>
                                                                    </picture>
                                                                </a>
                                                            </div>
                                                            <div class="content_item_blogs">
                                                                <div
                                                                    class="blog_home_title margin-top-10 margin-bottom-10">
                                                                    <h3 class="news_home_content_short_info">
                                                                        <a href="{{ $post->url() }}"
                                                                           title="{{ $post->title }}">{{ $post->title }}</a>
                                                                    </h3>
                                                                </div>
                                                                <div class="content-sum">
                                                                    {!! mb_strimwidth($post->description, 0, 75, "...") !!}
                                                                </div>
                                                                <div class="content_day_blog margin-bottom-10">
                                                                    <i class="fa fa-clock-o"></i>
                                                                    <span
                                                                        class="news_home_content_short_time"> {{ formatDate($post->created_at) }} </span>
                                                                    <span class="cmt_count_blog"><i
                                                                            class="fa fa-comments"
                                                                            aria-hidden="true"></i>(3) Bình luận</span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif

                                    @if(@$category->posts && count($category->posts) > 1)
                                        <div class="content-blog-index col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            @foreach($category->posts as $key => $post)
                                                @if($key != 0)
                                                    <div class="xxx clearfix">
                                                        <div class="myblog"
                                                             onclick="window.location.href='{{ $post->url() }}';">
                                                            <div class="item_blog_big">
                                                                <div class="figure-big">
                                                                    <div class="image-blog-left img_thumb_blogs">

                                                                        <a href="{{ $post->url() }}">
                                                                            <picture>
                                                                                <source media="(max-width: 375px)"
                                                                                        srcset="{{ $post->getFirstMediaUrl('image') ?? '/backend/global_assets/images/placeholders/placeholder.jpg' }}">
                                                                                <source
                                                                                    media="(min-width: 376px) and (max-width: 767px)"
                                                                                    srcset="{{ $post->getFirstMediaUrl('image') ?? '/backend/global_assets/images/placeholders/placeholder.jpg' }}">
                                                                                <source media="(min-width: 1200px)"
                                                                                        srcset="{{ $post->getFirstMediaUrl('image') ?? '/backend/global_assets/images/placeholders/placeholder.jpg' }}">
                                                                                <source
                                                                                    media="(min-width: 768px) and (max-width: 1023px)"
                                                                                    srcset="{{ $post->getFirstMediaUrl('image') ?? '/backend/global_assets/images/placeholders/placeholder.jpg' }}">
                                                                                <source
                                                                                    media="(min-width: 1024px) and (max-width: 1199px)"
                                                                                    srcset="{{ $post->getFirstMediaUrl('image') ?? '/backend/global_assets/images/placeholders/placeholder.jpg' }}">
                                                                                <img
                                                                                    src="{{ $post->getFirstMediaUrl('image') ?? '/backend/global_assets/images/placeholders/placeholder.jpg' }}"
                                                                                    title="{{ $post->title }}"
                                                                                    alt="{{ $post->title }}">
                                                                            </picture>
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="content-right-blog">
                                                                <div class="title_blog_home">
                                                                    <h3>
                                                                        <a href="{{ $post->url() }}"
                                                                           title="{{ $post->title }}">{{ $post->title }}</a>
                                                                    </h3>
                                                                </div>
                                                                <div class="content-sum">
                                                                    {!! mb_strimwidth($post->description, 0, 25, "...") !!}
                                                                </div>
                                                                <div class="content_day_blog"><i class="fa fa-clock-o"></i>
                                                                    <span class="news_home_content_short_time">{{ formatDate($post->created_at) }}</span>
                                                                    <span class="cmt_count_blog"> <i class="fa fa-comments" aria-hidden="true"></i>(1) Bình luận </span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endforeach
        @endif
    </section>

    <div class="backdrop__body-backdrop___1rvky"></div>

    <ul class="the-article-tools">

        <li class="btnZalo zalo-share-button">
            <a target="_blank" href="http://zalo.me/0345281681" title="Chat qua Zalo">
                <span class="ti-zalo"></span>
            </a>
            <span class="label">Chat qua Zalo</span>
        </li>


        <li class="btnFacebook">
            <a target="_blank" href="https://www.messenger.com/t/hungkio1998" title="Chat qua Messenger">
                <span class="ti-facebook"></span>
            </a>
            <span class="label">Chat qua Messenger</span>
        </li>
    </ul>
    <!-- main-area-end -->
@endsection
@push('scripts')
    <script src="/sapo/assets/main.js" type="text/javascript"></script>
    {!! $homeSchemaMarkup->toScript() !!}
@endpush
