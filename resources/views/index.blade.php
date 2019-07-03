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
      <div class="col-lg-8">
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
      <div class="col-lg-4">
        <div class="row agenda">
          <div class="col-12 nieuws-agenda sidebar text-donkerpaars bg-grijs-10">
            <? _e("
              <!--:nl-->
                AGENDA
              <!--:--><!--:en-->
                AGENDA
              <!--:-->
            ") ?>
          </div>
        </div>
        <?=
          wp_reset_query();
          $args = array(
            'numberposts' => -1,
            'post_type' => array('post'),
            'posts_per_page' => 5,
            'meta_query' => array(
              array(
                'key' => 'agenda_uitgelicht',
                'compare' => '=',
                'value' => '1'
              )
            ),
            'meta_key' => 'agenda_uitgelicht_volgorde',
            'orderby' => 'meta_value',
            'order' => 'asc'
          );
          $the_query = new WP_Query($args);

          if($the_query->have_posts()):
            while($the_query->have_posts()) : $the_query->the_post(); ?>
              <div class="row">
                <div class="col-12 sidebar bg-grijs-10">
                  <a href="<? the_permalink(); ?>">
                    <div class="overlay-container agenda-image">
                      <? the_post_thumbnail('col-4-thumbnail', array('class' => 'img-fluid image-cover agenda-image')); ?>
                      <div class="overlay overlay-donkerpaars d-flex agenda-image"></div>
                    </div>
                  </a>
                  <div class="agenda-item">
                    <?
                      $unixtimestamp = strtotime($agenda_tijdstip);
                      $formatted_date = date_i18n('j F, H:i', $unixtimestamp);
                    ?>
                    <h5 class="text-donkerpaars font-weight-bold">{{ $formatted_date }}</h5>
                    <a href="<? the_permalink(); ?>"><h5 class="font-weight-bold"><? the_title(); ?></h5></a>
                  </div>
                  <div class="row agenda-locatie bg-white mx-0">
                    <div class="col-3 my-auto rm-gutter">
                      <span class="fa-stack text-donkerpaars">
                        <i class="far fa-circle fa-stack-2x icon-background"></i>
                        <i class="fas fa-map-marker-alt fa-stack-1x"></i>
                      </span>
                    </div>
                    <div class="col-9">
                      {{ $agenda_locatie }}
                    </div>
                  </div>
                  @if ($agenda_inschrijfformulier_url)
                    <div class="inschrijven text-right">
                      <a href="{{ $agenda_inschrijfformulier_url }}" target="_blank" rel="noopener"><i><b>
                        <? _e("
                          <!--:nl-->
                            INSCHRIJVEN >
                          <!--:--><!--:en-->
                            REGISTER >
                          <!--:-->
                        ") ?>
                      </b></i></a>
                      <hr class="mt-0">
                    </div>
                  @endif
                </div>
              </div>
            <? endwhile;
          endif;
          wp_reset_query();
        ?>

        <div class="row highlights">
          <div class="col-12 nieuws-agenda sidebar text-paars bg-grijs-5">
            <? _e("
              <!--:nl-->
                UITGELICHT
              <!--:--><!--:en-->
                HIGHLIGHTS
              <!--:-->
            ") ?>
          </div>
        </div>
        <?=
          wp_reset_query();
          $args = array(
            'numberposts' => -1,
            'post_type' => array('post', 'page'),
            'posts_per_page' => 5,
            'meta_query' => array(
              array(
                'key' => 'uitgelicht',
                'compare' => '=',
                'value' => '1'
              )
            ),
            'meta_key' => 'uitgelicht_volgorde',
            'orderby' => 'meta_value',
            'order' => 'asc'
          );
          $the_query = new WP_Query($args);

          if($the_query->have_posts()):
            while($the_query->have_posts()) : $the_query->the_post(); ?>
              <div class="row">
                <div class="col-12 sidebar bg-grijs-5">
                  <a href="<? the_permalink(); ?>">
                    <div class="overlay-container">
                      <? the_post_thumbnail('col-4-thumbnail', array('class' => 'img-fluid image-cover')); ?>
                      <div class="overlay overlay-paars d-flex"></div>
                    </div>
                  </a>
                  <div class="bg-grijs-15 uitgelicht-item">
                    <a href="<? the_permalink(); ?>"><h5><? the_title(); ?></h5></a>
                  </div>
                </div>
              </div>
            <? endwhile;
          endif;
          wp_reset_query();
        ?>
        <div class="row">
          <div class="col-12 sidebar bg-grijs-5">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/265160064" allowfullscreen></iframe>
            </div>
            <div class="bg-grijs-15 uitgelicht-item">
              <h5>
                <? _e("
                  <!--:nl-->
                    Wat doen we? Bekijk ons filmpje
                  <!--:--><!--:en-->
                    What do we do? Check out our movie
                  <!--:-->
                ") ?>
                <a href="/over-ons/">
                  <? _e("
                    <!--:nl-->
                      of lees meer over ons
                    <!--:--><!--:en-->
                      or read more about us
                    <!--:-->
                  ") ?>
                </a>
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        {!! get_the_posts_navigation() !!}
      </div>
    </div>
  </div>
@endsection
