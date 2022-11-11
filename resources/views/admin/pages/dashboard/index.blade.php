@extends('admin.layouts.default')

@section('content')
{{-- {{  }} --}}
<div class="content">
    <div class="container-fluid">
      <h5 class="mb-2">Data Transaksi</h5>
      <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text text-wrap">Total Pemesanan Tiket</span>
              <span class="info-box-number">{{ App\Transaction::count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text text-wrap">Total Transaksi Sukses</span>
              <span class="info-box-number">{{ App\Transaction::where('status', 'selesai')->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text text-wrap">Total Omzet Transaksi</span>
              <span class="info-box-number">Rp. {{ App\Transaction::where('status', 'selesai')->sum('total_harga') }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <h5 class="mb-2">Customer</h5>
      <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text text-wrap">Total Customer</span>
              <span class="info-box-number">{{ App\User::where('roles', 'user')->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
      
    </div>
</div>
<!-- Button trigger modal -->


@endsection

@push('after-script')
@endpush