<ol class="carousel-indicators row status-list">
  <li class="col-12 col-xl-2 offset-1 active" data-target="#carouselStatusControls" data-slide-to="0">
    <div class="status-indicator text-xl-center">
      <div class="d-none d-xl-block">
        <? _e("
          <!--:nl-->
            Lobby
          <!--:--><!--:en-->
            Lobby
          <!--:-->
        ") ?>
        <br>
        <br>
      </div>
      <img class="align-top d-inline d-xl-block img-fluid" src="@asset('images/OSF-Icon-lobby-l.svg')">
      <div class="d-inline-block">
        <div class="d-inline d-xl-none">
          <? _e("
            <!--:nl-->
              Lobby
            <!--:--><!--:en-->
              Lobby
            <!--:-->
          ") ?>
        </div>
        <div class="status-meter-icon-wrapper">
          @foreach (range(1, 5) as $num)
            @if (get_field('project_status_lobby_score') == $num)
              <div class="status-meter-icon status-score-{{ $num }} mx-auto"></div>
            @else
              <div class="status-meter-icon mx-auto"></div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </li>
  <li class="col-12 col-xl-2" data-target="#carouselStatusControls" data-slide-to="1">
    <div class="status-indicator text-xl-center">
      <div class="d-none d-xl-block">
        <? _e("
          <!--:nl-->
            Data beschikbaar
          <!--:--><!--:en-->
            Data available
          <!--:-->
        ") ?>
        <br>
        <br>
      </div>
      <img class="align-top d-inline d-xl-block img-fluid" src="@asset('images/OSF-Icon-data-beschikbaar-l.svg')">
      <div class="d-inline-block">
        <div class="d-inline d-xl-none">
          <? _e("
            <!--:nl-->
              Data beschikbaar
            <!--:--><!--:en-->
              Data available
            <!--:-->
          ") ?>
        </div>
        <div class="status-meter-icon-wrapper">
          @foreach (array(1, 2, 3, 4, 5) as $num)
            @if (get_field('project_status_data_beschikbaar_score') == $num)
              <div class="status-meter-icon status-score-{{ $num }} mx-auto"></div>
            @else
              <div class="status-meter-icon mx-auto"></div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </li>
  <li class="col-12 col-xl-2" data-target="#carouselStatusControls" data-slide-to="2">
    <div class="status-indicator text-xl-center">
      <div class="d-none d-xl-block">
        <? _e("
          <!--:nl-->
            Ontsluiten en hulpmiddelen
          <!--:--><!--:en-->
            Release and Tools
            <br>
            <br>
          <!--:-->
        ") ?>
      </div>
      <img class="align-top d-inline d-xl-block img-fluid" src="@asset('images/OSF-Icon-hulpmiddelen-l.svg')">
      <div class="d-inline-block">
        <div class="d-inline d-xl-none">
          <? _e("
            <!--:nl-->
              Ontsluiten en hulpmiddelen
            <!--:--><!--:en-->
              Release and tools
            <!--:-->
          ") ?>
        </div>
        <div class="status-meter-icon-wrapper">
          @foreach (array(1, 2, 3, 4, 5) as $num)
            @if (get_field('project_status_ontsluiten_en_hulpmiddelen_score') == $num)
              <div class="status-meter-icon status-score-{{ $num }} mx-auto"></div>
            @else
              <div class="status-meter-icon mx-auto"></div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </li>
  <li class="col-12 col-xl-2" data-target="#carouselStatusControls" data-slide-to="3">
    <div class="status-indicator text-xl-center">
      <div class="d-none d-xl-block">
        <? _e("
          <!--:nl-->
            Duurzame ontsluiting
          <!--:--><!--:en-->
            Durable releasing
            <br>
            <br>
          <!--:-->
        ") ?>
      </div>
      <img class="align-top d-inline d-xl-block img-fluid" src="@asset('images/OSF-Icon-ontsluiting-l.svg')">
      <div class="d-inline-block">
        <div class="d-inline d-xl-none">
          <? _e("
            <!--:nl-->
              Duurzame ontsluiting
            <!--:--><!--:en-->
              Durable releasing
            <!--:-->
          ") ?>
        </div>
        <div class="status-meter-icon-wrapper">
          @foreach (array(1, 2, 3, 4, 5) as $num)
            @if (get_field('project_status_duurzame_ontsluiting_score') == $num)
              <div class="status-meter-icon status-score-{{ $num }} mx-auto"></div>
            @else
              <div class="status-meter-icon mx-auto"></div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </li>
  <li class="col-12 col-xl-2" data-target="#carouselStatusControls" data-slide-to="4">
    <div class="status-indicator text-xl-center">
      <div class="d-none d-xl-block">
        <? _e("
          <!--:nl-->
            Hergebruik
          <!--:--><!--:en-->
            Reuse
          <!--:-->
        ") ?>
        <br>
        <br>
      </div>
      <img class="align-top d-inline d-xl-block img-fluid" src="@asset('images/OSF-Icon-hergebruik-l.svg')">
      <div class="d-inline-block">
        <div class="d-inline d-xl-none">
          <? _e("
            <!--:nl-->
              Hergebruik
            <!--:--><!--:en-->
              Reuse
            <!--:-->
          ") ?>
        </div>
        <div class="status-meter-icon-wrapper">
          @foreach (array(1, 2, 3, 4, 5) as $num)
            @if (get_field('project_status_hergebruik_score') == $num)
              <div class="status-meter-icon status-score-{{ $num }} mx-auto"></div>
            @else
              <div class="status-meter-icon mx-auto"></div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </li>
</ol>
