@extends('user.layouts.default')

@section('content')

<!-- ======= Services Section ======= -->
<section id="services" class="services" style="padding-bottom: 300px">
  <div class="container" data-aos="fade-up">

    <div class="section-title text-start mt-5">
      <h4>Pesanan Kamu</h4>
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
    <div class="table-responsive">
      <table class="table" style="width: 100%">
        <thead>
          <tr>
            <th style="width: 5%" scope="col">#</th>
            <th style="width: 20%" scope="col">Invoice</th>
            <th style="width: 25%" scope="col">Tanggal Mulai</th>
            <th style="width: 15%" scope="col">Tanggal Selesai</th>
            <th style="width: 15%" scope="col">Total Orang</th>
            <th style="width: 15%" scope="col">Total Harga</th>
            <th style="width: 5%" scope="col">Status</th>
            <th style="width: 15%" scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($data as $tran)  
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>
                {{ $tran->invoice }}
            </td>
            <td>
              {{ $tran->mulai->isoFormat('DD MMM YYYY') }}
            </td>
            <td>
              {{ $tran->selesai->isoFormat('DD MMM YYYY') }}
            </td>
            <td>
              {{ $tran->total_orang }}
            </td>
            <td>
              Rp. {{ $tran->total_harga }}
            </td>
            <td>
              @if (strtolower($tran->status) == "menunggu konfirmasi" || strtolower($tran->status) == "menunggu input ongkir")
              <span class="badge bg-secondary text-light">{{ $tran->status }}</span>
              @elseif (strtolower($tran->status) == "pesanan dibatalkan")
              <span class="badge bg-danger text-light">{{ $tran->status }}</span>
              @elseif (strtolower($tran->status) == "pesanan diproses" || strtolower($tran->status) == "menunggu pembayaran")
              <span class="badge bg-warning text-dark">{{ $tran->status }}</span>
              @if (strtolower($tran->status) == "menunggu pembayaran")
                  <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#caraBayar"><small>cara melakukan pembayaran ?</small></button>
              @endif
              @elseif (strtolower($tran->status) == "pesanan selesai")
              <span class="badge bg-success text-light">{{ $tran->status }}</span>
              @elseif (strtolower($tran->status) == "pesanan dikirim")
              <span class="badge bg-primary text-light">{{ $tran->status }}</span>
              @endif
            </td>
           
            <td>
              @if (strtolower($tran->status) == "menunggu konfirmasi")
              <form class="d-inline" action="{{ route('user.pesanan.batal', $tran->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button class="btn btn-outline-danger btn-sm" type="submit">Batalkan Pesanan</button>
              </form>
              @elseif (strtolower($tran->status) == "pesanan dikirim")
                <form class="d-inline" action="{{ route('user.pesanan.selesai', $tran->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <button class="btn btn-success btn-sm" type="submit">Konfirmasi pesanan selesai</button>
                </form>
              @elseif (strtolower($tran->status) == "menunggu pembayaran")
                  <button class="btn btn-primary btn-sm d-inline" onclick="uploadBukti('{{ route('user.pesanan.uploadBukti', $tran->id) }}')" type="button" data-toggle="modal" data-target="#uploadBukti">Upload</button>
                  <form class="d-inline" action="{{ route('user.pesanan.batal', $tran->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-outline-danger btn-sm" type="submit">Batalkan Pesanan</button>
                  </form>
              @elseif (strtolower($tran->status) == "pesanan dibatalkan")
              -
              @else
              @endif
            </td>
          </tr>
          @empty
          <tr>
            <td class="text-center" colspan="6">
              Tidak ada transaksi
              <br>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
      
    </div>
  </div>

</section>
<div class="modal fade" id="uploadBukti" tabindex="-1" aria-labelledby="uploadBuktiLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fs-5" id="uploadBuktiLabel">Upload Bukti</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="uploadBuktiForm" method="POST" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="form-group">
            <input type="file" class="form-control" name="image">
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="caraBayar" tabindex="-1" aria-labelledby="caraBayarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fs-5" id="caraBayarLabel">Cara Melakukan Pembayaran</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia necessitatibus quibusdam facilis suscipit! Consectetur ullam iste, inventore cumque dignissimos eum facilis aut et, ad animi illum, perspiciatis dolorem exercitationem ut.
      </div>
    </div>
  </div>
</div>
@endsection

@push('after-script')
<script>
  function uploadBukti(route){
    $('#uploadBuktiForm').attr('action', route);
  }
</script>
@endpush