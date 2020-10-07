@extends('layout/admin')

@section('title', 'Input Webinar')

@section('container')
<!--? Hero Start -->
<div class="slider-area2">
    <div class="slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap hero-cap2 text-center">
                        <h2>Input Webinar</h2>
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
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8 posts-list">
                <div class="single-post">
                    <div class="blog_details">
                        <div class="join-form">
                            <h4>Isi Keterangan Webinar</h4>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="form-contact join-form" action="/webinar/store" id="Webinar1" method="post" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="judulwebinar" id="judulwebinar" type="text" placeholder="Judul Webinar" value="{{ old('judulwebinar') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="platform" id="platform" type="text" placeholder="Platform" value="{{ old('platform') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="tanggal" id="tanggal" type="text" placeholder="Tanggal" value="{{ old('tanggal') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="jam" id="jam" type="text" placeholder="Jam" value="{{ old('jam') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="keterangan1" id="keterangan1" type="text" placeholder="Keterangan 1" value="{{ old('keterangan1') }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="keterangan2" id="keterangan2" type="text" placeholder="Keterangan 2" value="{{ old('keterangan2') }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h6>Upload Poster</h6>
                                            <input type="file" name="poster" value="{{ old('poster') }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="linkmateri" id="linkmateri" type="text" placeholder="Link Materi" value="{{ old('linkmateri') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm btn_1 boxed-btn">Input Webinar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Blog Area end =================-->
@endsection
