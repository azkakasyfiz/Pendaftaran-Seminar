@extends('layout/admin')

@section('title', 'Admin Dashboard')

@section('container')
<!-- Start Align Area -->
<div class="whole-wrap">
	<div class="container box_1170">
		<div class="section-top-border">
			@if (session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
			@endif
			<h3 class="mb-30">Data Pendaftar Webinar</h3>
			<div class="single-element-widget mb-30">
				<form action="/admindashboard/search" method="get">
					<div class="form-group">
						<div class="default-select" id="searchwebinar">
							<select name="id">
								<option value="" disabled selected>Silakan pilih webinar yang ingin dilihat</option>
								@foreach ( $judulWebinar as $p )
								<option value="{{ $p->id }}">{{ $p->judulwebinar }}</option>
								@endforeach
							</select>
							<button type="submit" class="genric-btn primary">Search</button>
						</div>
					</div>
				</form>
			</div>
			<div class="progress-table-wrap">
				<div class="progress-table">
					<div class="table-head">
						<div class="nama">Nama</div>
						<div class="institusi">Institusi</div>
						<div class="handphone">Nomor Handphone</div>
						<div class="email">Email</div>
						<div class="aksi">Action</div>
					</div>
					@foreach ( $participant as $p )
					<div class="table-row">
						<div class="nama">{{ $p->nama }}</div>
						<div class="institusi">{{ $p->institusi }}</div>
						<div class="handphone">{{ $p->nohandphone }}</div>
						<div class="email">{{ $p->email }}</div>
						<div class="action">
							<div class="button-group-area mt-0">
								<!-- <a href="#" class="genric-btn primary small">BP</a> -->
								<a href="/admindashboard/adminsendlink/{{ $p->id }}" class="genric-btn primary small">Send Link</a>
								<a href="/admindashboard/adminsendcertificate/{{ $p->id }}" class="genric-btn primary small">Send E-Certificate</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
                <div class="single-element-widget mt-4" style="text-align: right">
                    <form action="/admindashboard/adminsendlink/webinar" method="get">
                        <div class="form-group">
                            <div class="default-select" id="searchwebinar" style="display: flex; justify-content: flex-end">
                                <select name="id">
                                    <option value="" disabled selected>Pilih Webinar</option>
                                    @foreach ( $judulWebinar as $p )
                                        <option value="{{ $p->id }}">{{ $p->judulwebinar }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="genric-btn primary">Kirim Link Webinar</button>
                            </div>
                        </div>
                    </form>
                </div>
		</div>
	</div>
</div>
<!-- End Align Area -->
@endsection
