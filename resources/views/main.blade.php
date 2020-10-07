@extends('layout/user')

@section('title', 'Info Webinar')

@section('container')
    <!--? About Law Start-->
    <section class="about-low-area section-padding30" data-background="/img/gallery/section_bg02.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-35">
                            <h2>{{ isset($webinarLatest->judulwebinar)? $webinarLatest->judulwebinar: "Tidak ada data" }}</h2>
                        </div>
                        <p>{{ isset($webinarLatest->keterangan1)? $webinarLatest->keterangan1:"Tidak ada data"}}</p>
                        <p>{{ isset($webinarLatest->keterangan2)? $webinarLatest->keterangan2:"Tidak ada data"}}</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
                            <div class="single-caption mb-20">
                                <div class="caption-icon">
                                    <span class="flaticon-communications-1"></span>
                                </div>
                                <div class="caption">
                                    <h5>Where</h5>
                                    <p>{{ isset($webinarLatest->platform)? $webinarLatest->platform:"Tidak ada data"}}</p>
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
                                    <p>{{ isset($webinarLatest->tanggal) ? $webinarLatest->tanggal:"Tidak ada data" }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{isset($webinarLatest->id)? '/detail/'.$webinarLatest->id:"#!"}}" class="btn mt-50">Get Your Ticket</a>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-back-img ">
                        <img src="{{ isset($webinarLatest->poster) ? url('/data_poster/'.$webinarLatest->poster): '' }}" alt="img_poster">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Law End-->
    <!--? Blog Area Start -->
    <section class="home-blog-area section-padding2">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="section-tittle text-center mb-50">
                        <h2>Jadwal Webinar</h2>
                        <p>Silakan anda pilih webinar yang ingin diikuti</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ( $webinar as $w )
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="home-blog-single mb-30">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                <img src="{{ url('/data_poster/'.$w->poster) }}" alt="img_poster">
                                <!-- Blog date -->
                                <div class="blog-date text-center">
                                    <p>{{ $w->tanggal }}</p>
                                </div>
                            </div>
                            <div class="blog-cap">
                                <p>{{ $w->platform }}</p>
                                <h3><a href="/detail/{{ $w->id }}">{{ $w->judulwebinar }}</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Blog Area End -->
@endsection
