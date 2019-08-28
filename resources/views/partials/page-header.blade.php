<div class="page-header">
  {{-- Ugly formatting below in order to have no space between the title and the semicolon on the projects page --}}
  <h6>{!! App::title() !!}@if (in_array('page-template-projects', get_body_class()))<span id="projects-header-semicolon"></span><span id="projects-header-filters"></span><span id="projects-header-search-text"></span> [<span id="projects-header-counter-shown"></span><span id="projects-header-counter-total">{{ $total_count_query->post_count }}</span>]
    @endif
  </h6>
</div>
<div class="row">
  <div class="col-12">
    <hr class="mb-md-5">
  </div>
</div>
