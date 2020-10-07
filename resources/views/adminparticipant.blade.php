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
			<h3 class="mb-30">Data Pendaftar Keseluruhan Webinar</h3>
			<div class="progress-table-wrap">
				<div class="progress-table">
					<div class="table-head">
						<div class="nama">Nama</div>
						<div class="institusi">Institusi</div>
						<div class="handphone">Nomor Handphone</div>
						<div class="email">Email</div>
					</div>
					@foreach ( $participant as $p )
					<div class="table-row">
						<div class="nama">{{ $p->nama }}</div>
						<div class="institusi">{{ $p->institusi }}</div>
						<div class="handphone">{{ $p->nohandphone }}</div>
						<div class="email">{{ $p->email }}</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
        <a href="/admindashboard/adminsendlinktoall/" class="genric-btn primary small" style="margin-bottom: 50px">Send Link to All Participants</a>
	</div>
</div>
<!-- End Align Area -->
@endsection
