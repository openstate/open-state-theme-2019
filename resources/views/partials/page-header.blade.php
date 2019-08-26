<div class="page-header">
  <?
    if($the_query) {
      if ($the_query->post_count == $total_count_query->post_count) {
        $counter = ' [' . $total_count_query->post_count . ']';
      } else {
        $counter = ' [' . $the_query->post_count . '/' . $total_count_query->post_count . ']';
      }
    }
  ?>
  <?
    if ($_GET['_projects']) {
      $filters = ': ' . str_replace(",", " / ", $_GET['_projects']);
    }
  ?>
  <h6>{!! App::title() !!}{{ $filters }}{{ $counter }}</h6>
</div>
<div class="row">
  <div class="col-12">
    <hr class="mb-md-5">
  </div>
</div>
