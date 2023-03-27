<section class="breadcrumb-area d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <div class="breadcrumb-wrap text-center">
                    <div class="breadcrumb-title mb-30 text-left">
                        <h2>{{ $name ?? null }}</h2>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb text-left">
                            <li class="breadcrumb-item" >
                                <a href="{{ route('home') }}" >
                                    <span >{{ __('Trang chủ') }} ></span>
                                </a>
                            </li>
                            @if(@$taxon)
                                <li class="breadcrumb-item">
                                    <a href="{{ $taxon_url ?? '' }}" >
                                        <span >{{ $taxon ?? null }} > </span>
                                    </a>
                                </li>
                            @endif
                            <li class="breadcrumb-item active" aria-current="page">{{ $name ?? null }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
