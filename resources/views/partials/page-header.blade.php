<div class="page-header">
  <?
    if ($_GET['_projects']) {
      $projects_args = $_GET['_projects'];
      if (get_bloginfo("language") == 'nl') {
        $theme_mapping = array(
          "elections" => "verkiezingen",
          "decisions" => "besluiten",
          "finances" => "financiën",
          "results" => "resultaten",
          "events" => "evenementen"
        );
        foreach ($theme_mapping as $key => $value) {
          $projects_args = str_replace($key, $value, $projects_args);
        }
      }
      $filters = str_replace(",", " / ", $projects_args);
    }

    if ($_GET['_projects_search']) {
      $search_text = 'zoekterm';
      if (get_bloginfo("language") == 'en-US') {
        $search_text = 'search term';
      }

      if ($filters) {
        $search_term = ' / ';
      }
      $search_term .= $search_text . ' \'' . $_GET['_projects_search'] . '\'';
    }

    if ($filters or $search_term) {
      $semicolon = ': ';
    }

    if($the_query) {
      if ($the_query->post_count == $total_count_query->post_count) {
        $counter = ' [' . $total_count_query->post_count . ']';
      } else {
        $counter = ' [' . $the_query->post_count . '/' . $total_count_query->post_count . ']';
      }
    }
  ?>
  <h6>{!! App::title() !!}{{ $semicolon }}{{ $filters }}{{ $search_term }}{{ $counter }}</h6>
</div>
<div class="row">
  <div class="col-12">
    <hr class="mb-md-5">
  </div>
</div>
