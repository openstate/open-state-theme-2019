<div class="carousel-item active mt-5 mt-lg-0">
  <div class="row">
    <div class="col-4 rm-gutter-right">
      <div class="bg-grijs-15 left-corners">
        <img src="@asset('images/OSF-Icon-lobby-l.svg')">
      </div>
    </div>
    <div class="col-8 rm-gutter-left">
      <div class="bg-white right-corners padding-50">
        <div class="row">
          <div class="col-8">
            <header class="status-big">Lobby</header>
            <p>{!! get_field('project_status_lobby_tekst')  !!}</p>
          </div>
          <div class="col-4 text-right my-auto">
            <img class="status-meter" src="@asset('images/OSF-Icon-meter.svg')">
            <img class="status-wijzer status-wijzer-{!! get_field('project_status_lobby_score') !!}" src="@asset('images/OSF-Icon-wijzer-l.svg')">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="carousel-item mt-5 mt-lg-0">
  <div class="row">
    <div class="col-4 rm-gutter-right">
      <div class="bg-grijs-15 left-corners">
        <img src="@asset('images/OSF-Icon-data-beschikbaar-l.svg')">
      </div>
    </div>
    <div class="col-8 rm-gutter-left">
      <div class="bg-white right-corners padding-50">
        <div class="row">
          <div class="col-8">
            <header class="status-big">Data beschikbaar</header>
            <p>{!! get_field('project_status_data_beschikbaar_tekst')  !!}</p>
          </div>
          <div class="col-4 text-right my-auto">
            <img class="status-meter" src="@asset('images/OSF-Icon-meter.svg')">
            <img class="status-wijzer status-wijzer-{!! get_field('project_status_data_beschikbaar_score') !!}" src="@asset('images/OSF-Icon-wijzer-l.svg')">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="carousel-item mt-5 mt-lg-0">
  <div class="row">
    <div class="col-4 rm-gutter-right">
      <div class="bg-grijs-15 left-corners">
        <img src="@asset('images/OSF-Icon-hulpmiddelen-l.svg')">
      </div>
    </div>
    <div class="col-8 rm-gutter-left">
      <div class="bg-white right-corners padding-50">
        <div class="row">
          <div class="col-8">
            <header class="status-big">Ontsluiten en hulpmiddelen</header>
            <p>{!! get_field('project_status_ontsluiten_en_hulpmiddelen_tekst')  !!}</p>
          </div>
          <div class="col-4 text-right my-auto">
            <img class="status-meter" src="@asset('images/OSF-Icon-meter.svg')">
            <img class="status-wijzer status-wijzer-{!! get_field('project_status_ontsluiten_en_hulpmiddelen_score') !!}" src="@asset('images/OSF-Icon-wijzer-l.svg')">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="carousel-item mt-5 mt-lg-0">
  <div class="row">
    <div class="col-4 rm-gutter-right">
      <div class="bg-grijs-15 left-corners">
        <img src="@asset('images/OSF-Icon-ontsluiting-l.svg')">
      </div>
    </div>
    <div class="col-8 rm-gutter-left">
      <div class="bg-white right-corners padding-50">
        <div class="row">
          <div class="col-8">
            <header class="status-big">Duurzame ontsluiting</header>
            <p>{!! get_field('project_status_duurzame_ontsluiting_tekst')  !!}</p>
          </div>
          <div class="col-4 text-right my-auto">
            <img class="status-meter" src="@asset('images/OSF-Icon-meter.svg')">
            <img class="status-wijzer status-wijzer-{!! get_field('project_status_duurzame_ontsluiting_score') !!}" src="@asset('images/OSF-Icon-wijzer-l.svg')">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="carousel-item mt-5 mt-lg-0">
  <div class="row">
    <div class="col-4 rm-gutter-right">
      <div class="bg-grijs-15 left-corners">
        <img src="@asset('images/OSF-Icon-hergebruik-l.svg')">
      </div>
    </div>
    <div class="col-8 rm-gutter-left">
      <div class="bg-white right-corners padding-50">
        <div class="row">
          <div class="col-8">
            <header class="status-big">Hergebruik</header>
            <p>{!! get_field('project_status_hergebruik_tekst')  !!}</p>
          </div>
          <div class="col-4 text-right my-auto">
            <img class="status-meter" src="@asset('images/OSF-Icon-meter.svg')">
            <img class="status-wijzer status-wijzer-{!! get_field('project_status_hergebruik_score') !!}" src="@asset('images/OSF-Icon-wijzer-l.svg')">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
