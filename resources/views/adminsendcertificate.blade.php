@extends('layout/admin')

@section('title', 'Send Certificate')

@section('container')
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
                                <h4>Kirim e-Certificate</h4>
                                <form class="form-contact join-form" action="/admindashboard/adminsendcertificate/{participant}/sendcertificate" id="EmailForm" method="POST">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input class="form-control" name="email" id="email" type="text" value="{{ $participant->email }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control w-100" name="formatlink" id="formatlink" cols="30" rows="9" placeholder="Link Certificate"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send</button>
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
