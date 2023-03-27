<!-- Footer -->
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

                                        <a href="tel:0345281681">0345281681</a>

                                    </p>
                                    <p class="address">

                                        Hà Nội, Việt Nam

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <div class="footer-widget">
                            <h3>Danh mục</h3>
                            <ul class="list-menu">

                                <li><a href="">Trang chủ</a></li>

                                <li><a href="gioi-thieu">Giới thiệu</a></li>

                                @if($menuFooter2->isNotEmpty())
                                @foreach($menuFooter2 as $menu)
                                        <li><a href="{{ $menu->urlMenu() }}">{{ $menu->name }}</a></li>
                                @endforeach
                                @endif
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
                        <span>© Bản quyền thuộc về <b>Tutorials Việt Nam</b> <span class="s480-f">|</span> Cung cấp bởi hungkio16.9.98@gmail.com</span>
                    </div>
                </div>
            </div>

            <div class="back-zalo">
                <a target="_blank" href="http://zalo.me/0345281681" title="Chat qua Zalo">
                    <span class="ti-zalo"></span>
                </a>
            </div>


            <div class="back-hotline">
                <button type="button" data-toggle="modal" data-target="#hotlineModal"><i class="fa fa-phone"></i>
                </button>
            </div>
        </div>
    </div>

</footer>

<!-- Footer-end -->
