@extends('layouts.app')

@section('content')
  <div class="home-banner row-full text-white">
    <div class="container d-flex h-100">
      <div class="row align-self-center">
        <div class="col-md-7 col-lg-8 home-banner-text my-auto">
          <? _e("
            <!--:nl-->
              OPEN DATA VOOR <span class='text-paars'>DIGITALE</span> TRANSPARANTIE
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

        <div class="col-md-5 col-lg-4 osf-schema my-auto">
          <div class="row justify-content-center">
            <img class="osf-schema-top-left" src="@asset('images/OSF-Icon-pijl-links-boven.svg')">
            <div class="osf-schema-top text-center">
              <img src="@asset('images/OSF-Icon-besluiten.svg')">
                <? _e("
                  <!--:nl-->
                    BESLUITEN
                  <!--:--><!--:en-->
                    DECISIONS
                  <!--:-->
                ") ?>
              </div>
            <img class="osf-schema-top-right" src="@asset('images/OSF-Icon-pijl-rechts-boven.svg')">
          </div>

          <div class="row osf-schema-row-up">
            <div class="osf-schema-center-left">
              <img class="img-fluid" src="@asset('images/OSF-Icon-verkiezingen.svg')">
              <? _e("
                <!--:nl-->
                  VERKIEZINGEN
                <!--:--><!--:en-->
                  ELECTIONS
                <!--:-->
              ") ?>
            </div>
            <img class="osf-schema-center img-fluid" src="@asset('images/OSF-Icon-pijl-midden.svg')">
            <div class="osf-schema-center-right text-center">
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

          <div class="row osf-schema-row-up justify-content-center">
            <img class="osf-schema-bottom-left img-fluid" src="@asset('images/OSF-Icon-pijl-links-onder.svg')">
            <div class="osf-schema-bottom">
              <img class="img-fluid" src="@asset('images/OSF-Icon-resultaten.svg')">
              <? _e("
                <!--:nl-->
                  RESULTATEN
                <!--:--><!--:en-->
                  RESULTS
                <!--:-->
              ") ?>
            </div>
            <img class="osf-schema-bottom-right img-fluid" src="@asset('images/OSF-Icon-pijl-rechts-onder.svg')">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div class="row">
          <div class="col-12 nieuws-agenda">
            <? _e("
              <!--:nl-->
                NIEUWS
              <!--:--><!--:en-->
                NEWS
              <!--:-->
            ") ?>
          </div>
        </div>
        <div class="row">
          @while (have_posts()) @php the_post() @endphp
            <div class="col-12">
              @include('partials.content-'.get_post_type())
            </div>
          @endwhile
        </div>
      </div>
      <div class="col-sm-4">
        <div class="row">
          <div class="col-12 nieuws-agenda text-donkerpaars bg-grijs-10">
            <? _e("
              <!--:nl-->
                AGENDA
              <!--:--><!--:en-->
                AGENDA
              <!--:-->
            ") ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-8">
        {!! get_the_posts_navigation() !!}
      </div>
    </div>
  </div>
@endsection
