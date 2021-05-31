@extends('layouts.app')

@section('content')
  <div class="home-banner row-full text-white">
    <div class="container d-flex h-100">
      <div class="row align-self-center">
        <div class="col-md-7 col-lg-8 home-banner-text my-auto">
          <? _e("
            <!--:nl-->
              OPEN DATA, <span class='text-paars'>TRANSPARANTE SAMENLEVING</span>
            <!--:--><!--:en-->
              OPEN DATA, <span class='text-paars'>TRANSPARENT SOCIETY</span>
            <!--:-->
          ") ?>
          <div>
              <? _e("
                <!--:nl-->
                  <a href='over-ons/' class='btn btn-paars'>
                    MEER OVER ONS
                  </a>
                <!--:--><!--:en-->
                  <a href='about/' class='btn btn-paars'>
                    MORE ABOUT US
                  </a>
                <!--:-->
              ") ?>
          </div>
        </div>

        <div class="col-md-5 col-lg-4 osf-schema my-auto">
          <div class="row justify-content-center">
            <img class="osf-schema-top-left" src="@asset('images/OSF-Icon-pijl-links-boven.svg')" alt="">
            <div class="osf-schema-top text-center">
              <img src="@asset('images/OSF-Icon-besluiten.svg')" alt="">
                <? _e("
                  <!--:nl-->
                    BESLUITEN
                  <!--:--><!--:en-->
                    DECISIONS
                  <!--:-->
                ") ?>
              </div>
            <img class="osf-schema-top-right" src="@asset('images/OSF-Icon-pijl-rechts-boven.svg')" alt="">
          </div>

          <div class="row osf-schema-row-up">
            <div class="osf-schema-center-left">
              <img class="img-fluid" src="@asset('images/OSF-Icon-verkiezingen.svg')" alt="">
              <? _e("
                <!--:nl-->
                  VERKIEZINGEN
                <!--:--><!--:en-->
                  ELECTIONS
                <!--:-->
              ") ?>
            </div>
            <img class="osf-schema-center img-fluid" src="@asset('images/OSF-Icon-pijl-midden.svg')" alt="">
            <div class="osf-schema-center-right text-center">
              <img class="img-fluid" src="@asset('images/OSF-Icon-financien.svg')" alt="">
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
            <img class="osf-schema-bottom-left img-fluid" src="@asset('images/OSF-Icon-pijl-links-onder.svg')" alt="">
            <div class="osf-schema-bottom">
              <img class="img-fluid" src="@asset('images/OSF-Icon-resultaten.svg')" alt="">
              <? _e("
                <!--:nl-->
                  RESULTATEN
                <!--:--><!--:en-->
                  RESULTS
                <!--:-->
              ") ?>
            </div>
            <img class="osf-schema-bottom-right img-fluid" src="@asset('images/OSF-Icon-pijl-rechts-onder.svg')" alt="">
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
          <?
            wp_reset_query();
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $args = array(
              'post_type' => 'post',
              'posts_per_page' => 3,
              'paged' => $paged,
              'meta_query' => array(
                'relation' => 'OR',
                array(
                  'key' => 'agenda_evenement',
                  'value' => '1',
                  'compare' => '!=',
                ),
                array(
                  'key' => 'agenda_evenement',
                  'compare' => 'not exists',
                )
              )
            );
            $the_query = new WP_Query($args);

            if($the_query->have_posts()):
              while($the_query->have_posts()) : $the_query->the_post(); ?>
                <div class="col-12">
                  @include('partials.content-'.get_post_type())
                </div>
              <? endwhile;
            endif;
            wp_reset_query();
          ?>
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
        <?
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
        ?>

        @if ($the_query->have_posts())
          @while ($the_query->have_posts())
            <? $the_query->the_post() ?>
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
                    $unixtimestamp = strtotime(get_field('agenda_tijdstip', get_the_id()));
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
                    <? echo get_field('agenda_locatie', get_the_id()) ?>
                  </div>
                </div>
                @if ($agenda_inschrijfformulier_url)
                  <div class="inschrijven text-right">
                    <a href="<? echo get_field('agenda_inschrijfformulier_url', get_the_id()) ?>" target="_blank" rel="noopener"><i><b>
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
                @if ($the_query->current_post + 1 != $the_query->post_count)
                  <br>
                @endif
              </div>
            </div>
          @endwhile
        @endif
        <? wp_reset_query(); ?>

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
                    <p class="mb-0"><? echo get_field('project_samenvatting', get_the_id()) ?></p>
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
                    Wat doen we? Bekijk ons filmpje <a href='over-ons/'>of lees meer over ons</a>
                  <!--:--><!--:en-->
                    What do we do? Check out our movie <a href='about/'>or read more about us</a>
                  <!--:-->
                ") ?>
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
        <? _e("
          <!--:nl-->
            <a class='btn-block meer-nieuws' href='nieuwsarchief/'>
              MEER NIEUWS >
            </a>
          <!--:--><!--:en-->
            <a class='btn-block meer-nieuws' href='news-archive/'>
              MORE NEWS >
            </a>
          <!--:-->
        ") ?>
      </div>
    </div>
  </div>
@endsection
