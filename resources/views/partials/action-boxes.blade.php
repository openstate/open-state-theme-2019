@if ($action_box_vraagteken)
  <div class="info-box question d-flex">
    <p class="d-inline my-auto"><i class="far fa-2x fa-question-circle text-donkerpaars"></i></p><h4 class="d-inline my-auto">{!! $action_box_vraagteken !!}</h4>
  </div>
@endif

@if ($action_box_download)
  <div class="info-box download d-flex">
    <p class="d-inline my-auto"><i class="far fa-2x fa-arrow-alt-circle-down text-donkerblauw"></i></p><h4 class="d-inline my-auto">{!! $action_box_download !!}</h4>
  </div>
@endif
