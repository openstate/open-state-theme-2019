<? $added_active_class = false; ?>
@if (get_field('project_status_lobby_score'))
<div class="carousel-item <? if (!$added_active_class) {echo 'active'; $added_active_class = true;} ?> mt-xl-5 mt-lg-0">
  <div class="row">
    <div class="col-xl-4 d-none d-xl-block rm-gutter-right">
      <div class="bg-grijs-15 left-corners">
        <img src="@asset('images/OSF-Icon-lobby-l.svg')">
      </div>
    </div>
    <div class="col-12 col-xl-8 rm-gutter-xl-left">
      <div class="bg-white right-corners status-box">
        <div class="row">
          <div class="col-12 col-md-8">
            <header class="status-big">Lobby</header>
            <img align="left" class="small-status-icon d-inline d-xl-none" src="@asset('images/OSF-Icon-lobby-l.svg')">
            <p>{!! get_field('project_status_lobby_tekst')  !!}</p>
          </div>
          <div class="col-12 col-md-4 text-right my-auto">
            <img class="status-meter" src="@asset('images/OSF-Icon-meter.svg')">
            <img class="status-wijzer status-wijzer-{!! get_field('project_status_lobby_score') !!}" src="@asset('images/OSF-Icon-wijzer-l.svg')">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@if (get_field('project_status_data_beschikbaar_score'))
<div class="carousel-item <? if (!$added_active_class) {echo 'active'; $added_active_class = true;} ?> mt-xl-5 mt-lg-0">
  <div class="row">
    <div class="col-xl-4 d-none d-xl-block rm-gutter-right">
      <div class="bg-grijs-15 left-corners">
        <img src="@asset('images/OSF-Icon-data-beschikbaar-l.svg')">
      </div>
    </div>
    <div class="col-12 col-xl-8 rm-gutter-xl-left">
      <div class="bg-white right-corners status-box">
        <div class="row">
          <div class="col-12 col-md-8">
            <header class="status-big">Data beschikbaar</header>
            <img align="left" class="small-status-icon d-inline d-xl-none" src="@asset('images/OSF-Icon-data-beschikbaar-l.svg')">
            <p>{!! get_field('project_status_data_beschikbaar_tekst')  !!}</p>
          </div>
          <div class="col-12 col-md-4 text-right my-auto">
            <img class="status-meter" src="@asset('images/OSF-Icon-meter.svg')">
            <img class="status-wijzer status-wijzer-{!! get_field('project_status_data_beschikbaar_score') !!}" src="@asset('images/OSF-Icon-wijzer-l.svg')">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@if (get_field('project_status_ontsluiten_en_hulpmiddelen_score'))
<div class="carousel-item <? if (!$added_active_class) {echo 'active'; $added_active_class = true;} ?> mt-xl-5 mt-lg-0">
  <div class="row">
    <div class="col-xl-4 d-none d-xl-block rm-gutter-right">
      <div class="bg-grijs-15 left-corners">
        <img src="@asset('images/OSF-Icon-hulpmiddelen-l.svg')">
      </div>
    </div>
    <div class="col-12 col-xl-8 rm-gutter-xl-left">
      <div class="bg-white right-corners status-box">
        <div class="row">
          <div class="col-12 col-md-8">
            <header class="status-big">Ontsluiten en hulpmiddelen</header>
            <img align="left" class="small-status-icon d-inline d-xl-none" src="@asset('images/OSF-Icon-hulpmiddelen-l.svg')">
            <p>{!! get_field('project_status_ontsluiten_en_hulpmiddelen_tekst')  !!}</p>
          </div>
          <div class="col-12 col-md-4 text-right my-auto">
            <img class="status-meter" src="@asset('images/OSF-Icon-meter.svg')">
            <img class="status-wijzer status-wijzer-{!! get_field('project_status_ontsluiten_en_hulpmiddelen_score') !!}" src="@asset('images/OSF-Icon-wijzer-l.svg')">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@if (get_field('project_status_duurzame_ontsluiting_score'))
<div class="carousel-item <? if (!$added_active_class) {echo 'active'; $added_active_class = true;} ?> mt-xl-5 mt-lg-0">
  <div class="row">
    <div class="col-xl-4 d-none d-xl-block rm-gutter-right">
      <div class="bg-grijs-15 left-corners">
        <img src="@asset('images/OSF-Icon-ontsluiting-l.svg')">
      </div>
    </div>
    <div class="col-12 col-xl-8 rm-gutter-xl-left">
      <div class="bg-white right-corners status-box">
        <div class="row">
          <div class="col-12 col-md-8">
            <header class="status-big">Duurzame ontsluiting</header>
            <img align="left" class="small-status-icon d-inline d-xl-none" src="@asset('images/OSF-Icon-ontsluiting-l.svg')">
            <p>{!! get_field('project_status_duurzame_ontsluiting_tekst')  !!}</p>
          </div>
          <div class="col-12 col-md-4 text-right my-auto">
            <img class="status-meter" src="@asset('images/OSF-Icon-meter.svg')">
            <img class="status-wijzer status-wijzer-{!! get_field('project_status_duurzame_ontsluiting_score') !!}" src="@asset('images/OSF-Icon-wijzer-l.svg')">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@if (get_field('project_status_hergebruik_score'))
<div class="carousel-item <? if (!$added_active_class) {echo 'active'; $added_active_class = true;} ?> mt-xl-5 mt-lg-0">
  <div class="row">
    <div class="col-xl-4 d-none d-xl-block rm-gutter-right">
      <div class="bg-grijs-15 left-corners">
        <img src="@asset('images/OSF-Icon-hergebruik-l.svg')">
      </div>
    </div>
    <div class="col-12 col-xl-8 rm-gutter-xl-left">
      <div class="bg-white right-corners status-box">
        <div class="row">
          <div class="col-12 col-md-8">
            <header class="status-big">Hergebruik</header>
            <img align="left" class="small-status-icon d-inline d-xl-none" src="@asset('images/OSF-Icon-hergebruik-l.svg')">
            <p>{!! get_field('project_status_hergebruik_tekst')  !!}</p>
          </div>
          <div class="col-12 col-md-4 text-right my-auto">
            <img class="status-meter" src="@asset('images/OSF-Icon-meter.svg')">
            <img class="status-wijzer status-wijzer-{!! get_field('project_status_hergebruik_score') !!}" src="@asset('images/OSF-Icon-wijzer-l.svg')">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
