@extends('layout/user')

@section('title', 'Join Webinar')

@section('container')
<!--? Hero Start -->
<div class="slider-area2">
    <div class="slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap hero-cap2 text-center">
                        <h2>Join Webinar</h2>
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
                            <h4>{{ $webinar->judulwebinar }}</h4>
                            <h5>Isi Data Diri Anda</h5>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="form-contact join-form" action="/participant/store" id="Webinar1" method="post" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="nama" id="nama" type="text" placeholder="Nama Lengkap" value="{{ old('nama') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="institusi" id="institusi" type="text" placeholder="Nama Institusi" value="{{ old('institusi') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="nohandphone" id="nohandphone" type="number" placeholder="No. Handphone" value="{{ old('nohandphone') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="email" id="email" type="text" placeholder="Email" value="{{ old('email') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="id_webinar" id="id_webinar" type="hidden" value="{{ $webinar->id }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h6>Upload Bukti Pembayaran</h6>
                                            <input type="file" name="buktipembayaran" value="{{ old('buktipembayaran') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm btn_1 boxed-btn">Join</button>
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
