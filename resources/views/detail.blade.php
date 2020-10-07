@extends('layout/user')

@section('title', 'Webinar Detail')

@section('container')
<!--? Hero Start -->
<div class="slider-area2">
    <div class="slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap hero-cap2 text-center">
                        <h2>Webinar Detail</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->
<!--================Blog Area =================-->
<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="blog_details">
                        <h2 style="color: #2d2d2d;">{{ $webinar->judulwebinar }}
                        </h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#"><i class="fa fa-user"></i> Artificial Intelligence</a></li>
                            <li><a href="#"><i class="fa fa-comments"></i></a></li>
                        </ul>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
                                <div class="single-caption mb-20">
                                    <div class="caption-icon">
                                        <span class="flaticon-communications-1"></span>
                                    </div>
                                    <div class="caption">
                                        <h5>Where</h5>
                                        <p>{{ $webinar->platform }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
                                <div class="single-caption mb-20">
                                    <div class="caption-icon">
                                        <span class="flaticon-education"></span>
                                    </div>
                                    <div class="caption">
                                        <h5>When</h5>
                                        <p>{{ $webinar->tanggal }} (Pukul {{ $webinar->jam }})</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="excert">
                            {{ $webinar->keterangan1 }}
                        </p>
                        <p>
                            {{ $webinar->keterangan2 }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <div class="feature-img">
                        <img class="img-fluid" src="{{ isset($webinar->poster) ? url('/data_poster/'.$webinar->poster): '' }}" alt="img_poster">
                    </div>
                    <aside class="single_sidebar_widget">
                        <a href="/detail/{{ $webinar->id }}/join" class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Join</a>
                    </aside>
                    <aside class="single_sidebar_widget">
                        <h4 class="widget_title" style="color: #2d2d2d;">File Materi</h4>
                        <a href="{{ $webinar->linkmateri }}" class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                        type="submit">Download</a>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Blog Area end =================-->
@endsection
