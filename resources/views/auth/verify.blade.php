@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifikasi Alamat Email Anda</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Sebuah tautan verifikasi terbaru sudah dikirim ke alamat email Anda!
                        </div>
                    @endif

                    Sebelum diproses, silahkan periksa alamat email Anda untuk tautan verifikasi!
                    Jika Anda tidak menerima email,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Klik di sini untuk permintaan yang lainnya.</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
