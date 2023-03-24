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
@push('styles')
    <link rel="preload" as="style" type="text/css"
          href="/sapo/assets/bootstrap.scss.css" onload="this.rel='stylesheet'"/>
    <link href="/sapo/assets/bootstrap.scss.css" rel="stylesheet" type="text/css"
          media="all"/>
    <link rel="preload" as="style" type="text/css" href="/sapo/assets/base.scss.css"
          onload="this.rel='stylesheet'"/>
    <link href="/sapo/assets/base.scss.css" rel="stylesheet" type="text/css"
          media="all"/>

    <link rel="preload" as="style" type="text/css"
          href="/sapo/assets/ant-du-lich.scss.css" onload="this.rel='stylesheet'"/>
    <link href="/sapo/assets/ant-du-lich.scss.css" rel="stylesheet" type="text/css"
          media="all"/>
@endpush
@section('content')
<!-- main-area -->
<section class="awe-section-7">
    <section class="section-news margin-bottom-20">
        <div class="container">
            <div class="blogs-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section_tour-new_title">
                            <h2>Cẩm nang du lịch</h2>
                            <div class="title-line">
                                <div class="tl-1"></div>
                                <div class="tl-2"></div>
                                <div class="tl-3"></div>
                            </div>
                            <p>Cẩm nang thông tin về du lịch, văn hóa, ẩm thực, các sự kiện và lễ hội tại các điểm đến
                                Việt nam, Đông Nam Á và Thế Giới.</p>
                        </div>
                    </div>
                </div>
                <div class="news_hot_left">
                    <div class="row">
                        <div class="news_owl col-lg-6 col-md-6 col-sm-6 col-xs-12 cam-nang-du-lich">

                            <div class="item_blog_big">
                                <div class="figure-big">

                                    <div class="img_thumb_blogs">
                                        <a href="xieu-long-voi-nhung-canh-dep-nen-tho-o-chua-huong" class="big_img_h">
                                            <picture>
                                                <source media="(max-width: 480px)"
                                                        srcset="/sapo/articles/chua-huong.jpg?v=1520693664270">
                                                <source media="(min-width: 481px) and (max-width: 767px)"
                                                        srcset="/sapo/articles/chua-huong.jpg?v=1520693664270">
                                                <source media="(min-width: 768px) and (max-width: 1023px)"
                                                        srcset="/sapo/articles/chua-huong.jpg?v=1520693664270">
                                                <source media="(min-width: 1024px) and (max-width: 1199px)"
                                                        srcset="/sapo/articles/chua-huong.jpg?v=1520693664270">
                                                <source media="(min-width: 1200px)"
                                                        srcset="/sapo/articles/chua-huong.jpg?v=1520693664270">
                                                <img src="https:sapo/articles/chua-huong.jpg?v=1520693664270"
                                                     title="Xiêu lòng với những cảnh đẹp nên thơ ở chùa Hương"
                                                     alt="Xiêu lòng với những cảnh đẹp nên thơ ở chùa Hương"
                                                     class="img-responsive center-block"/>
                                            </picture>
                                        </a>
                                    </div>
                                    <div class="content_item_blogs">
                                        <div class="blog_home_title margin-top-10 margin-bottom-10">
                                            <h3 class="news_home_content_short_info">
                                                <a href="xieu-long-voi-nhung-canh-dep-nen-tho-o-chua-huong"
                                                   title="Xiêu lòng với những cảnh đẹp nên thơ ở chùa Hương">Xiêu lòng
                                                    với những cảnh đẹp nên thơ ở chùa Hương</a>
                                            </h3>
                                        </div>
                                        <div class="content-sum">
                                            Vậy ở&nbsp;chùa Hương&nbsp;có gì thú vị mà lại thu hút nhiều du khách trong
                                            lẫn ngoài nước đến như vậy, chúng ta hãy cùng tìm hiểu xem nhé.
                                            Chùa Hương&nbsp;hay tên gọi đầy đủ là chùa Hương Sơn, là một quần thể di
                                            tích thắng cảnh với rất nhiều ngôi chùa, đền, đình, bao quanh là non nước
                                            hùng vĩ và hoang sơ.
                                            Cảnh vật ở nơi đây nên thơ đến lạ,...
                                        </div>
                                        <div class="content_day_blog margin-bottom-10">
                                            <i class="fa fa-clock-o"></i><span>Saturday,</span>
                                            <span class="news_home_content_short_time">
					10/03/2018
				</span>
                                            <span class="cmt_count_blog">
					<i class="fa fa-comments" aria-hidden="true"></i>(3) Bình luận
				</span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="content-blog-index col-lg-6 col-md-6 col-sm-6 col-xs-12">

                            <div class="xxx clearfix">
                                <div class="myblog"
                                     onclick="window.location.href='trang-an-co-diem-den-dang-hot-o-ninh-binh';">
                                    <div class="item_blog_big">
                                        <div class="figure-big">
                                            <div class="image-blog-left img_thumb_blogs">

                                                <a href="trang-an-co-diem-den-dang-hot-o-ninh-binh">
                                                    <picture>
                                                        <source media="(max-width: 375px)"
                                                                srcset="/sapo/articles/trang-an-2-5-1.jpg?v=1606138224437">
                                                        <source media="(min-width: 376px) and (max-width: 767px)"
                                                                srcset="/sapo/articles/trang-an-2-5-1.jpg?v=1606138224437">
                                                        <source media="(min-width: 1200px)"
                                                                srcset="/sapo/articles/trang-an-2-5-1.jpg?v=1606138224437">
                                                        <source media="(min-width: 768px) and (max-width: 1023px)"
                                                                srcset="/sapo/articles/trang-an-2-5-1.jpg?v=1606138224437">
                                                        <source media="(min-width: 1024px) and (max-width: 1199px)"
                                                                srcset="/sapo/articles/trang-an-2-5-1.jpg?v=1606138224437">
                                                        <img
                                                            src="https:sapo/articles/trang-an-2-5-1.jpg?v=1606138224437"
                                                            title="Tràng An cổ – điểm đến đang hot ở Ninh Bình"
                                                            alt="Tràng An cổ – điểm đến đang hot ở Ninh Bình">
                                                    </picture>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-right-blog">
                                        <div class="title_blog_home">
                                            <h3>
                                                <a href="trang-an-co-diem-den-dang-hot-o-ninh-binh"
                                                   title="Tràng An cổ – điểm đến đang hot ở Ninh Bình">Tràng An cổ –
                                                    điểm đến đang hot ở Ninh Bình</a>
                                            </h3>
                                        </div>
                                        <div class="content-sum">

                                            Ở Tràng An có hai địa danh là Tràng An và Tràng An cổ. Trong đó, Tràng An,
                                            nơi thu hút hàng nghìn lượt khá...
                                        </div>
                                        <div class="content_day_blog"><i
                                                class="fa fa-clock-o"></i><span>Saturday,</span>
                                            <span class="news_home_content_short_time">
											10/03/2018
										</span>
                                            <span class="cmt_count_blog">
											<i class="fa fa-comments" aria-hidden="true"></i>(1) Bình luận
										</span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="xxx clearfix">
                                <div class="myblog"
                                     onclick="window.location.href='mua-hoa-phan-phu-hong-troi-bao-loc';">
                                    <div class="item_blog_big">
                                        <div class="figure-big">
                                            <div class="image-blog-left img_thumb_blogs">

                                                <a href="mua-hoa-phan-phu-hong-troi-bao-loc">
                                                    <picture>
                                                        <source media="(max-width: 375px)"
                                                                srcset="/sapo/articles/7mai-anh-dao-dalat-zing.jpg?v=1520693432973">
                                                        <source media="(min-width: 376px) and (max-width: 767px)"
                                                                srcset="/sapo/articles/7mai-anh-dao-dalat-zing.jpg?v=1520693432973">
                                                        <source media="(min-width: 1200px)"
                                                                srcset="/sapo/articles/7mai-anh-dao-dalat-zing.jpg?v=1520693432973">
                                                        <source media="(min-width: 768px) and (max-width: 1023px)"
                                                                srcset="/sapo/articles/7mai-anh-dao-dalat-zing.jpg?v=1520693432973">
                                                        <source media="(min-width: 1024px) and (max-width: 1199px)"
                                                                srcset="/sapo/articles/7mai-anh-dao-dalat-zing.jpg?v=1520693432973">
                                                        <img
                                                            src="https:sapo/articles/7mai-anh-dao-dalat-zing.jpg?v=1520693432973"
                                                            title="Mùa hoa phấn phủ hồng trời Bảo Lộc"
                                                            alt="Mùa hoa phấn phủ hồng trời Bảo Lộc">
                                                    </picture>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-right-blog">
                                        <div class="title_blog_home">
                                            <h3>
                                                <a href="mua-hoa-phan-phu-hong-troi-bao-loc"
                                                   title="Mùa hoa phấn phủ hồng trời Bảo Lộc">Mùa hoa phấn phủ hồng trời
                                                    Bảo Lộc</a>
                                            </h3>
                                        </div>
                                        <div class="content-sum">

                                            Hoa phấn hồng còn được nhiều người gọi là hoa kèn hồng. Đây là loại cây thân
                                            gỗ, chiều cao trung bình 10 ...
                                        </div>
                                        <div class="content_day_blog"><i
                                                class="fa fa-clock-o"></i><span>Saturday,</span>
                                            <span class="news_home_content_short_time">
											10/03/2018
										</span>
                                            <span class="cmt_count_blog">
											<i class="fa fa-comments" aria-hidden="true"></i>(0) Bình luận
										</span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="xxx clearfix">
                                <div class="myblog"
                                     onclick="window.location.href='ai-bao-da-lat-chi-hop-style-mo-mong-cool-ngau-nhu-doi-ban-than-nay-van-co-ca-ro';">
                                    <div class="item_blog_big">
                                        <div class="figure-big">
                                            <div class="image-blog-left img_thumb_blogs">

                                                <a href="ai-bao-da-lat-chi-hop-style-mo-mong-cool-ngau-nhu-doi-ban-than-nay-van-co-ca-ro">
                                                    <picture>
                                                        <source media="(max-width: 375px)"
                                                                srcset="/sapo/articles/dalat-1.jpg?v=1520693176427">
                                                        <source media="(min-width: 376px) and (max-width: 767px)"
                                                                srcset="/sapo/articles/dalat-1.jpg?v=1520693176427">
                                                        <source media="(min-width: 1200px)"
                                                                srcset="/sapo/articles/dalat-1.jpg?v=1520693176427">
                                                        <source media="(min-width: 768px) and (max-width: 1023px)"
                                                                srcset="/sapo/articles/dalat-1.jpg?v=1520693176427">
                                                        <source media="(min-width: 1024px) and (max-width: 1199px)"
                                                                srcset="/sapo/articles/dalat-1.jpg?v=1520693176427">
                                                        <img
                                                            src="https:sapo/articles/dalat-1.jpg?v=1520693176427"
                                                            title="Ai bảo Đà Lạt chỉ hợp style mơ mộng? Cool ngầu như đôi bạn thân này vẫn có cả rổ ảnh thần thái!"
                                                            alt="Ai bảo Đà Lạt chỉ hợp style mơ mộng? Cool ngầu như đôi bạn thân này vẫn có cả rổ ảnh thần thái!">
                                                    </picture>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-right-blog">
                                        <div class="title_blog_home">
                                            <h3>
                                                <a href="ai-bao-da-lat-chi-hop-style-mo-mong-cool-ngau-nhu-doi-ban-than-nay-van-co-ca-ro"
                                                   title="Ai bảo Đà Lạt chỉ hợp style mơ mộng? Cool ngầu như đôi bạn thân này vẫn có cả rổ ảnh thần thái!">Ai
                                                    bảo Đà Lạt chỉ hợp style mơ mộng? Cool ngầu như đôi bạn thân này vẫn
                                                    có cả rổ ảnh thần thái!</a>
                                            </h3>
                                        </div>
                                        <div class="content-sum">
                                            Ai bảo Đà Lạt chỉ hợp style mơ mộng? Cool ngầu như đôi bạn thân này vẫn có
                                            cả rổ ảnh thần thái!
                                            Mỗi khi ng...
                                        </div>
                                        <div class="content_day_blog"><i
                                                class="fa fa-clock-o"></i><span>Saturday,</span>
                                            <span class="news_home_content_short_time">
											10/03/2018
										</span>
                                            <span class="cmt_count_blog">
											<i class="fa fa-comments" aria-hidden="true"></i>(1) Bình luận
										</span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="xxx clearfix">
                                <div class="myblog"
                                     onclick="window.location.href='net-binh-di-viet-nam-qua-anh-cua-tay-may-ha-lan';">
                                    <div class="item_blog_big">
                                        <div class="figure-big">
                                            <div class="image-blog-left img_thumb_blogs">

                                                <a href="net-binh-di-viet-nam-qua-anh-cua-tay-may-ha-lan">
                                                    <picture>
                                                        <source media="(max-width: 375px)"
                                                                srcset="/sapo/articles/du-lich-hoi-an-11.jpg?v=1520693088693">
                                                        <source media="(min-width: 376px) and (max-width: 767px)"
                                                                srcset="/sapo/articles/du-lich-hoi-an-11.jpg?v=1520693088693">
                                                        <source media="(min-width: 1200px)"
                                                                srcset="/sapo/articles/du-lich-hoi-an-11.jpg?v=1520693088693">
                                                        <source media="(min-width: 768px) and (max-width: 1023px)"
                                                                srcset="/sapo/articles/du-lich-hoi-an-11.jpg?v=1520693088693">
                                                        <source media="(min-width: 1024px) and (max-width: 1199px)"
                                                                srcset="/sapo/articles/du-lich-hoi-an-11.jpg?v=1520693088693">
                                                        <img
                                                            src="https:sapo/articles/du-lich-hoi-an-11.jpg?v=1520693088693"
                                                            title="Nét bình dị Việt Nam qua ảnh của tay máy Hà Lan"
                                                            alt="Nét bình dị Việt Nam qua ảnh của tay máy Hà Lan">
                                                    </picture>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-right-blog">
                                        <div class="title_blog_home">
                                            <h3>
                                                <a href="net-binh-di-viet-nam-qua-anh-cua-tay-may-ha-lan"
                                                   title="Nét bình dị Việt Nam qua ảnh của tay máy Hà Lan">Nét bình dị
                                                    Việt Nam qua ảnh của tay máy Hà Lan</a>
                                            </h3>
                                        </div>
                                        <div class="content-sum">
                                            Những hình ảnh này được giới thiệu trong mục Du lịch Instagram snapshots
                                            ngày 28-2 của báo Anh Guardian.
                                            A...
                                        </div>
                                        <div class="content_day_blog"><i
                                                class="fa fa-clock-o"></i><span>Saturday,</span>
                                            <span class="news_home_content_short_time">
											10/03/2018
										</span>
                                            <span class="cmt_count_blog">
											<i class="fa fa-comments" aria-hidden="true"></i>(0) Bình luận
										</span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<footer class="footer">
    <div class="site-footer">
        <div class="container">
            <div class="footer-inner padding-top-25 padding-bottom-10">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="footer-widget foote-contact-box">
                            <h3>Liên hệ</h3>
                            <div class="footer-widget-content">
                                <div class="icon">
                                    <img src="/sapo/assets/fot_hotline.svg"
                                         alt="Liên hệ"/>
                                </div>
                                <div class="info">
                                    <p class="questions">Hỗ trợ trực tuyến 24/7!</p>
                                    <p class="phone">
                                        Hotline:

                                        <a href="tel:19006750">1900 6750</a>

                                    </p>
                                    <p class="address">

                                        70 Lu Gia, Ward 15, District 11, Ho Chi Minh City

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <div class="footer-widget">
                            <h3>Dịch vụ</h3>
                            <ul class="list-menu">

                                <li><a href="">Trang chủ</a></li>

                                <li><a href="gioi-thieu">Giới thiệu</a></li>

                                <li><a href="tour-trong-nuoc">Tour trong nước</a></li>

                                <li><a href="tour-nuoc-ngoai">Tour nước ngoài</a></li>

                                <li><a href="dich-vu-tour">Dịch vụ tour</a></li>

                                <li><a href="cam-nang-du-lich">Cẩm nang du lịch</a></li>

                                <li><a href="lien-he">Liên hệ</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <div class="footer-widget">
                            <h3>Chăm sóc khách hàng</h3>
                            <ul class="list-menu">

                                <li><a href="">Trang chủ</a></li>

                                <li><a href="gioi-thieu">Giới thiệu</a></li>

                                <li><a href="tour-trong-nuoc">Tour trong nước</a></li>

                                <li><a href="tour-nuoc-ngoai">Tour nước ngoài</a></li>

                                <li><a href="dich-vu-tour">Dịch vụ tour</a></li>

                                <li><a href="cam-nang-du-lich">Cẩm nang du lịch</a></li>

                                <li><a href="lien-he">Liên hệ</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <div class="footer-widget no-border">
                            <h3>Chính sách</h3>
                            <ul class="list-menu">

                                <li><a href="">Trang chủ</a></li>

                                <li><a href="gioi-thieu">Giới thiệu</a></li>

                                <li><a href="tour-trong-nuoc">Tour trong nước</a></li>

                                <li><a href="tour-nuoc-ngoai">Tour nước ngoài</a></li>

                                <li><a href="dich-vu-tour">Dịch vụ tour</a></li>

                                <li><a href="cam-nang-du-lich">Cẩm nang du lịch</a></li>

                                <li><a href="lien-he">Liên hệ</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright clearfix">
        <div class="container">
            <div class="inner clearfix">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <span>© Bản quyền thuộc về <b>Kiến Vàng</b> <span class="s480-f">|</span> Cung cấp bởi <a
                                href="https://www.sapo.vn/?utm_campaign=cpn:kho_theme-plm:footer&utm_source=Tu_nhien&utm_medium=referral&utm_content=fm:text_link-km:-sz:&utm_term=&campaign=kho_theme-sapo"
                                title="/sapo" target="_blank" rel="nofollow">Sapo</a></span>

                    </div>
                </div>
            </div>

            <div class="back-zalo">
                <a target="_blank" href="http://zalo.me/0982 362 509" title="Chat qua Zalo">
                    <span class="ti-zalo"></span>
                </a>
            </div>


            <div class="back-hotline">
                <button type="button" data-toggle="modal" data-target="#hotlineModal"><i class="fa fa-phone"></i>
                </button>
            </div>


            <div class="back-to-top"><i class="fa fa-arrow-circle-up"></i></div>

        </div>
    </div>

</footer>
<div class="ajax-load">
	<span class="loading-icon">
		<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;"
             xml:space="preserve">
			<rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">
				<animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s"
                         repeatCount="indefinite"/>
				<animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s"
                         repeatCount="indefinite"/>
				<animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s"
                         repeatCount="indefinite"/>
			</rect>
			<rect x="8" y="10" width="4" height="10" fill="#333" opacity="0.2">
				<animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s"
                         repeatCount="indefinite"/>
				<animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s"
                         repeatCount="indefinite"/>
				<animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s"
                         repeatCount="indefinite"/>
			</rect>
			<rect x="16" y="10" width="4" height="10" fill="#333" opacity="0.2">
				<animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s"
                         repeatCount="indefinite"/>
				<animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s"
                         repeatCount="indefinite"/>
				<animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s"
                         repeatCount="indefinite"/>
			</rect>
		</svg>
	</span>
</div>

<div class="loading awe-popup">
    <div class="overlay"></div>
    <div class="loader" title="2">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;"
             xml:space="preserve">
			<rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">
                <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s"
                         repeatCount="indefinite"/>
                <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s"
                         repeatCount="indefinite"/>
                <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s"
                         repeatCount="indefinite"/>
            </rect>
            <rect x="8" y="10" width="4" height="10" fill="#333" opacity="0.2">
                <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s"
                         repeatCount="indefinite"/>
                <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s"
                         repeatCount="indefinite"/>
                <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s"
                         repeatCount="indefinite"/>
            </rect>
            <rect x="16" y="10" width="4" height="10" fill="#333" opacity="0.2">
                <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s"
                         repeatCount="indefinite"/>
                <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s"
                         repeatCount="indefinite"/>
                <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s"
                         repeatCount="indefinite"/>
            </rect>
		</svg>
    </div>

</div>

<div class="addcart-popup product-popup awe-popup">
    <div class="overlay no-background"></div>
    <div class="content">
        <div class="row row-noGutter">
            <div class="col-xl-6 col-xs-12">
                <div class="btn btn-full btn-primary a-left popup-title"><i class="fa fa-check"></i>Thêm vào giỏ hàng
                    thành công
                </div>
                <a href="javascript:void(0)" class="close-window close-popup"><i class="fa fa-close"></i></a>
                <div class="info clearfix">
                    <div class="product-image margin-top-5">
                        <img alt="popup" src="/sapo/assets/logo.png"
                             style="max-width:150px; height:auto">
                    </div>
                    <div class="product-info">
                        <p class="product-name"></p>
                        <p class="quantity color-main"><span>Số lượng: </span></p>
                        <p class="total-money color-main"><span>Tổng tiền: </span></p>

                    </div>
                    <div class="actions">
                        <button class="btn  btn-primary  margin-top-5 btn-continue">Tiếp tục mua hàng</button>
                        <button class="btn btn-gray margin-top-5" onclick="window.location='cart'">Kiểm tra giỏ hàng
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<div class="error-popup awe-popup">
    <div class="overlay no-background"></div>
    <div class="popup-inner content">
        <div class="error-message"></div>
    </div>
</div>
<div id="popup-cart" class="modal fade" role="dialog">
    <div id="popup-cart-desktop" class="clearfix">
        <div class="title-popup-cart">
            <i class="fa fa-check" aria-hidden="true"></i> Bạn đã thêm <span class="cart-popup-name"></span> vào giỏ
            hàng
        </div>
        <div class="title-quantity-popup">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Giỏ hàng của bạn (<span
                class="cart-popup-count"></span> sản phẩm) <i class="fa fa-caret-right" aria-hidden="true"></i>
        </div>
        <div class="content-popup-cart">
            <div class="thead-popup">
                <div style="width: 55%;" class="text-left">Sản phẩm</div>
                <div style="width: 15%;" class="text-right">Đơn giá</div>
                <div style="width: 15%;" class="text-center">Số lượng</div>
                <div style="width: 15%;" class="text-right">Thành tiền</div>
            </div>
            <div class="tbody-popup">
            </div>
            <div class="tfoot-popup">
                <div class="tfoot-popup-1 clearfix">
                    <div class="pull-left popup-ship">

                        <p>Giao hàng trên toàn quốc</p>
                    </div>
                    <div class="pull-right popup-total">
                        <p>Thành tiền: <span class="total-price"></span></p>
                    </div>
                </div>
                <div class="tfoot-popup-2 clearfix">
                    <a class="button btn-proceed-checkout" title="Tiến hành đặt hàng" href="checkout"><span>Tiến hành đặt hàng <i
                                class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a>
                    <a class="button btn-continue" title="Tiếp tục mua hàng"
                       onclick="$('#popup-cart').modal('hide');"><span><span><i class="fa fa-caret-left"
                                                                                aria-hidden="true"></i> Tiếp tục mua hàng</span></span></a>
                </div>
            </div>
        </div>
        <a title="Close" class="quickview-close close-window" href="javascript:;"
           onclick="$('#popup-cart').modal('hide');"><i class="fa  fa-close"></i></a>
    </div>

</div>
<div id="myModal" class="modal fade" role="dialog">
</div>


<div class="backdrop__body-backdrop___1rvky"></div>
<div class="c-menu--slide-left">
    <div class="la-nav-top-login">
        <div class="la-avatar-nav p-relative text-center">
            <a href="account">
                <img class="img-responsive" src="/sapo/assets/av-none-user.png"
                     alt="avatar">
            </a>
            <div class="la-hello-user-nav ng-scope">Xin chào</div>
            <img id="close-nav" class="c-menu__close"
                 src="/sapo/assets/ic-close-menu.png" alt="close nav">
        </div>
        <div class="la-action-link-nav text-center">

            <a href="account/login" class="uppercase">ĐĂNG NHẬP</a>
            <a href="account/register" class="uppercase">ĐĂNG KÝ</a>

        </div>
    </div>
    <div class="la-scroll-fix-infor-user">
        <!--CATEGORY-->
        <div class="la-nav-menu-items">
            <div class="la-title-nav-items">Tất cả danh mục</div>
            <ul class="la-nav-list-items">


                <li class="ng-scope">
                    <a href="">Trang chủ</a>
                </li>


                <li class="ng-scope">
                    <a href="gioi-thieu">Giới thiệu</a>
                </li>


                <li class="ng-scope ng-has-child1">
                    <a href="tour-trong-nuoc">Tour trong nước <i class="fa fa-plus fa1" aria-hidden="true"></i></a>
                    <ul class="ul-has-child1">


                        <li class="ng-scope ng-has-child2">
                            <a href="mien-trung">Miền Trung <i class="fa fa-plus fa2" aria-hidden="true"></i></a>
                            <ul class="ul-has-child2">

                                <li class="ng-scope">
                                    <a href="du-lich-quang-binh">Du lịch Quảng Bình</a>
                                </li>

                                <li class="ng-scope">
                                    <a href="du-lich-hue">Du lịch Huế</a>
                                </li>

                                <li class="ng-scope">
                                    <a href="du-lich-da-nang">Du lịch Đà Nẵng</a>
                                </li>

                                <li class="ng-scope">
                                    <a href="du-lich-hoi-an">Du lịch Hội An</a>
                                </li>

                                <li class="ng-scope">
                                    <a href="du-lich-nha-trang">Du lịch Nha Trang</a>
                                </li>

                                <li class="ng-scope">
                                    <a href="du-lich-phan-thiet">Du lịch Phan Thiết</a>
                                </li>

                                <li class="ng-scope">
                                    <a href="du-lich-da-lat">Du lịch Đà Lạt</a>
                                </li>

                            </ul>
                        </li>


                        <li class="ng-scope ng-has-child2">
                            <a href="mien-bac">Miền Bắc <i class="fa fa-plus fa2" aria-hidden="true"></i></a>
                            <ul class="ul-has-child2">

                                <li class="ng-scope">
                                    <a href="du-lich-ha-noi">Du lịch Hà Nội</a>
                                </li>

                                <li class="ng-scope">
                                    <a href="du-lich-ha-long">Du lịch Hạ Long</a>
                                </li>

                                <li class="ng-scope">
                                    <a href="du-lich-sapa">Du lịch Sapa</a>
                                </li>

                                <li class="ng-scope">
                                    <a href="du-lich-ninh-binh">Du lịch Ninh Bình</a>
                                </li>

                                <li class="ng-scope">
                                    <a href="du-lich-hai-phong">Du lịch Hải Phòng</a>
                                </li>

                            </ul>
                        </li>


                        <li class="ng-scope ng-has-child2">
                            <a href="mien-nam">Miền Nam <i class="fa fa-plus fa2" aria-hidden="true"></i></a>
                            <ul class="ul-has-child2">

                                <li class="ng-scope">
                                    <a href="du-lich-phu-quoc">Du lịch Phú Quốc</a>
                                </li>

                                <li class="ng-scope">
                                    <a href="du-lich-con-dao">Du lịch Côn Đảo</a>
                                </li>

                                <li class="ng-scope">
                                    <a href="du-lich-can-tho">Du lịch Cần Thơ</a>
                                </li>

                                <li class="ng-scope">
                                    <a href="du-lich-vung-tau">Du lịch Vũng Tàu</a>
                                </li>

                                <li class="ng-scope">
                                    <a href="du-lich-ben-tre">Du lịch Bến Tre</a>
                                </li>

                                <li class="ng-scope">
                                    <a href="du-lich-dao-nam-du">Du lịch Đảo Nam Du</a>
                                </li>

                            </ul>
                        </li>


                    </ul>
                </li>


                <li class="ng-scope ng-has-child1">
                    <a href="tour-nuoc-ngoai">Tour nước ngoài <i class="fa fa-plus fa1" aria-hidden="true"></i></a>
                    <ul class="ul-has-child1">


                        <li class="ng-scope">
                            <a href="du-lich-chau-a">Du lịch Châu Á</a>
                        </li>


                        <li class="ng-scope">
                            <a href="du-lich-chau-au">Du lịch Châu Âu</a>
                        </li>


                        <li class="ng-scope">
                            <a href="du-lich-chau-uc">Du lịch Châu Úc</a>
                        </li>


                        <li class="ng-scope">
                            <a href="du-lich-chau-my">Du lịch Châu Mỹ</a>
                        </li>


                    </ul>
                </li>


                <li class="ng-scope">
                    <a href="dich-vu-tour">Dịch vụ tour</a>
                </li>


                <li class="ng-scope">
                    <a href="cam-nang-du-lich">Cẩm nang du lịch</a>
                </li>


                <li class="ng-scope">
                    <a href="lien-he">Liên hệ</a>
                </li>


            </ul>
        </div>
        <div class="la-nav-slide-banner">

            <a href="#">
                <img alt="Ant Du lịch" src="/sapo/assets/left-menu-banner-1.png"/>
            </a>


        </div>
    </div>
</div>

<ul class="the-article-tools">

    <li class="btnZalo zalo-share-button">
        <a target="_blank" href="http://zalo.me/0982 362 509" title="Chat qua Zalo">
            <span class="ti-zalo"></span>
        </a>
        <span class="label">Chat qua Zalo</span>
    </li>


    <li class="btnFacebook">
        <a target="_blank" href="https://www.messenger.com/t/vemiendisan" title="Chat qua Messenger">
            <span class="ti-facebook"></span>
        </a>
        <span class="label">Chat qua Messenger</span>
    </li>


    <li class="btnphone">
        <button type="button" data-toggle="modal" data-target="#hotlineModal">
            <span class="fa fa-phone"></span>
        </button>
        <span class="label">Hotline đặt Tour</span>
    </li>

</ul>
<div class="modal fade" id="hotlineModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Hotline đặt Tour</h4>
            </div>
            <div class="modal-body">
                <div class="on-content">Chúng tôi cam kết luôn nỗ lực đem đến những giá trị dịch vụ tốt nhất cho khách
                    hàng và đối tác để tiếp tục khẳng định vị trí hàng đầu của thương hiệu Ant Du lịch.
                </div>
                <div class="on-sup-info">


                    <ul>
                        <li><strong>Ant Du lịch Hồ Chí Minh</strong></li>
                        <li>
                            <i class="fa fa-map-marker" aria-hidden="true"></i> 175 Lý Thường Kiệt, Phường 6, Quận Tân
                            Bình, TP. Hồ Chí Minh.
                        </li>
                        <li>
                            <i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:0123456789">0123 456 789</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:antdulich@ant.com.vn">antdulich@ant.com.vn</a>
                        </li>
                    </ul>


                    <ul>
                        <li><strong>Ant Du lịch Huế</strong></li>
                        <li>
                            <i class="fa fa-map-marker" aria-hidden="true"></i> 175 Lý Thường Kiệt, Quận Phú Nhận, TP.
                            Huế.
                        </li>
                        <li>
                            <i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:0123456789">0123 456 789</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:antdulich@ant.com.vn">antdulich@ant.com.vn</a>
                        </li>
                    </ul>


                    <ul>
                        <li><strong>Ant Du lịch Đà Nẵng</strong></li>
                        <li>
                            <i class="fa fa-map-marker" aria-hidden="true"></i> 20 Lý Thường Kiệt, Quận Hải Châu, TP. Đà
                            Nẵng.
                        </li>
                        <li>
                            <i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:0123456789">0123 456 789</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:antdulich@ant.com.vn">antdulich@ant.com.vn</a>
                        </li>
                    </ul>


                </div>
            </div>
        </div>
    </div>
</div>

<!-- main-area-end -->
@endsection
@push('scripts')
    <script src="/sapo/assets/main.js" type="text/javascript"></script>
    {!! $homeSchemaMarkup->toScript() !!}
@endpush
