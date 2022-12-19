@extends('user.layouts.default')

@section('content')
 

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
  <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
    <h1>PULAU TIDUNG KECIL</h1>
    <h2>PUSAT BUDIDAYA DAN KONSERVASI LAUT</h2>
    <a href="{{ route('register') }}" class="btn-get-started scrollto" style="background-color: white; color: black;">DAFTAR</a>
  </div>
</section>
<!-- End Hero -->

<!-- ======= About Section ======= -->
<section id="about" class="about">
<div class="container">

  <div class="row content">
    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
      <h2>{{ $about->judul }}</h2>
      <h3>{{ $about->keterangan }}</h3>
    </div>
    <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
      {!! $about->deskripsi !!}
    </div>
  </div>

</div>
</section>
<!-- End About Section -->


<main id="main">

  <!-- ======= gallery Section ======= -->
<section id="portfolio" class="portfolio">
  <div class="container">

    <div class="section-title" data-aos="fade-left">
      <h2>GALLERY</h2>
      <p>Goodest apparel memiliki beberapa artikel/desain yang berbeda dari jenis pakaian kaos itu sendiri.</p>
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <li data-filter=".camping"  class="filter-active">camping</li>
          <li data-filter=".mangrove">mangrove</li>
          <li data-filter=".nemo">nemo</li>
          <li data-filter=".kerangka-hiu">kerangka hiu</li>
        </ul>
      </div>
    </div>

    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
      @foreach ($galleries as $gallery)  
      <div class="col-lg-4 col-md-6 portfolio-item {{ $gallery->kategori }}">
        <div class="portfolio-wrap">
          <img src="{{ asset('storage/'.$gallery->image) }}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>{{ $gallery->judul }}</h4>
            
          </div>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</section>
<!-- End Portfolio Section -->   
  <!-- ======= Snorkling Section ======= -->
  <section id="snorkling" class="snorkling">
    <div class="container">
    
      <div class="row content">
        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
          <img src="{{ asset('storage/'.$content_snork->image) }}" alt="" class="w-100">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
          <h2>{{ $content_snork->judul }}</h2>
          {!! $content_snork->deskripsi !!}
        </div>
      </div>
    
    </div>
  </section>
    <!-- End snorkling Section -->

  <!-- ======= camping Section ======= -->
  <section id="camping" class="camping">
    <div class="container">
    
      <div class="row content">
        <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
          <h2>{{ $content_camp->judul }}</h2>
          {!! $content_camp->deskripsi !!}
        </div>
        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
          <img src="{{ asset('storage/'.$content_camp->image) }}" alt="" class="w-100">
        </div>
        
      </div>
    
    </div>
  </section>
    <!-- End camping Section -->

  <!-- ======= Cta Section ======= -->
  <section id="cta" class="cta">
    <div class="container">

      <div class="text-center" data-aos="zoom-in">
        <h3>BELANJA SEKARANG </h3>
        <p> Dengan layanan yang maximal dan cepat kami selalu memberikan service yang terbaik.</p>
        <a class="cta-btn" href="https://www.tokopedia.com/goodestid">SHOP NOW</a>
      </div>

    </div>
  </section><!-- End Cta Section -->



@endsection

@push('after-script')
@endpush