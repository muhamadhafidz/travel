@extends('user.layouts.default-auth')

@section('content')
 
<!-- ======= Hero Section ======= -->
<section id="" class="d-flex align-items-center">
    <div class="container position-relative">
      <div class="row">
        
        
        <div class="offset-3 col-6 rounded"  data-aos="fade-left" data-aos-delay="100" style="background-color: #fdfdfe; border: 4px solid #f7f8f8;">
            <div class="m-5" >
                <h3>Daftar</h3>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="nama">Nama</label>
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="username">Username</label>
                        <input id="username" type="text" onkeydown="if (event.which === 32) return false;" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="no_telp">Nomor Telepon</label>
                        <input id="no_telp" type="text" onkeypress="return event.charCode>=48 && event.charCode<=57" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ old('no_telp') }}" required autocomplete="no_telp" autofocus>

                        @error('no_telp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="repassword">Ulangi Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </form>
            </div>
            
        </div>
        <div class="offset-3 col-6 text-center" data-aos="fade-right" data-aos-delay="100">
            <h4 class="mt-5">Sudah mempunyai akun ?</h4>
            <div class="text-center">
                <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a><br>
                <a href="{{ route('user.home') }}" class="btn btn-link mt-5">Kembali ke Halaman utama</a>
            </div>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->



  
@endsection

@push('after-script')

<script>
</script>
@endpush
