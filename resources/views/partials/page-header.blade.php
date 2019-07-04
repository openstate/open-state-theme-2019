<div class="page-header">
  <? if($the_query) {
    $counter = ' [' . $the_query->post_count . ']';
  }
  ?>
  <h6>{!! App::title() !!}{{ $counter }}</h6>
</div>
<div class="row">
  <div class="col-12">
    <hr class="mb-md-5">
  </div>
</div>
