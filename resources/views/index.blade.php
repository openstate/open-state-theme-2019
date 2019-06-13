@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  <div class="home-banner row-full text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-8 home-banner-text">
          <? _e("
            <!--:nl-->
              OPEN DATA VOOR <span class='text-paars'>DIGITALE</span> TRANSPARENTIE
            <!--:--><!--:en-->
              OPEN DATA FOR <span class='text-paars'>DIGITAL</span> TRANSPARENCY
            <!--:-->
          ") ?>
          <div>
            <button class="btn btn-paars">
              <? _e("
                <!--:nl-->
                  MEER OVER THEMA'S
                <!--:--><!--:en-->
                  MORE ABOUT THEMES
                <!--:-->
              ") ?>
            </button>
          </div>
        </div>
        <div class="col-md-4 osf-schema">
          <div class="row">
            <div class="col-4">
              <img class="img-fluid" src="@asset('images/OSF-Icon-pijl-links-boven.svg')">
            </div>
            <div class="col-4">
              <img class="img-fluid" src="@asset('images/OSF-Icon-besluiten.svg')">
              <? _e("
                <!--:nl-->
                  BESLUITEN
                <!--:--><!--:en-->
                  DECISIONS
                <!--:-->
              ") ?>
            </div>
            <div class="col-4">
              <img class="img-fluid" src="@asset('images/OSF-Icon-pijl-rechts-boven.svg')">
            </div>
          </div>

          <div class="row">
            <div class="col-4">
              <img class="img-fluid" src="@asset('images/OSF-Icon-verkiezingen.svg')">
              <? _e("
                <!--:nl-->
                  VERKIEZINGEN
                <!--:--><!--:en-->
                  ELECTIONS
                <!--:-->
              ") ?>
            </div>
            <div class="col-4">
              <img class="img-fluid" src="@asset('images/OSF-Icon-pijl-midden.svg')">
            </div>
            <div class="col-4">
              <img class="img-fluid" src="@asset('images/OSF-Icon-financien.svg')">
              <? _e("
                <!--:nl-->
                  FINANCIËN
                <!--:--><!--:en-->
                  FINANCES
                <!--:-->
              ") ?>
            </div>
          </div>

          <div class="row">
            <div class="col-4">
              <img class="img-fluid" src="@asset('images/OSF-Icon-pijl-links-onder.svg')">
            </div>
            <div class="col-4">
              <img class="img-fluid" src="@asset('images/OSF-Icon-resultaten.svg')">
              <? _e("
                <!--:nl-->
                  RESULTATEN
                <!--:--><!--:en-->
                  RESULTS
                <!--:-->
              ") ?>
            </div>
            <div class="col-4">
              <img class="img-fluid" src="@asset('images/OSF-Icon-pijl-rechts-onder.svg')">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @while (have_posts()) @php the_post() @endphp
    @include('partials.content-'.get_post_type())
  @endwhile

  {!! get_the_posts_navigation() !!}
@endsection
