@extends('user.layouts.default')

@section('content')

<!-- ======= Services Section ======= -->
<section id="services" class="services mt-5" style="padding-bottom: 300px">
  <div class="container" data-aos="fade-up">

    <div class="section-title text-start mt-5">
      <h4>Pesan Tiket</h4>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    @if (session('sukses_hitung'))
    <form action="{{ route('user.tiket.pesanTiket') }}" method="POST">
      @csrf
    @else
    <form action="{{ route('user.tiket.cekHarga') }}" method="POST" >
      @csrf
    @endif
      <div class="row">
        <div class="col">
          <div class="form-row">
            <div class="col">
              <label for="mulai">Tanggal Mulai</label>
              <input type="date" class="form-control" id="mulai" name="mulai" value="{{ session('mulai') ?: '' }}" {{ session('mulai') ? 'readonly' : '' }}>
            </div>
            <div class="col">
              <label for="selesai">Tanggal Selesai</label>
              <input type="date" class="form-control" id="selesai" name="selesai" value="{{ session('selesai') ?: '' }}" {{ session('selesai') ? 'readonly' : '' }}>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="total_orang">Jumlah Orang</label>
                <input type="number" class="form-control" id="total_orang" name="total_orang" value="{{ session('total_orang') ?: '' }}" {{ session('total_orang') ? 'readonly' : '' }}>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="alamat_kirim">Alamat Kirim</label>
            <textarea class="form-control" id="alamat_kirim" name="alamat_kirim" rows="8" {{ session('alamat_kirim') ? 'readonly' : '' }}>{{ session('alamat_kirim') ?: '' }}</textarea>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h4>Harga</h4>
              <h5 class="font-weight-light">Rp. {{ session('harga') ?: '' }}</h5>
            </div>
            <div class="card-footer">
              @if (session('harga'))
              <button class="btn btn-primary w-100" type="submit">Pesan Tiket</button>
              @else
              <button class="btn btn-primary w-100" type="submit">Cek Harga</button>
              @endif
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>  
</section><!-- End Sevices Section -->


@endsection

@push('after-script')

@endpush