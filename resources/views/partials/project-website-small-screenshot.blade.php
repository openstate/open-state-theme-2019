<li class="d-flex text-center {{ $active }}" data-target="#carouselControls" data-slide-to="{{ $counter }}">
  <div class="small-screenshot d-flex mx-auto">
    {!!$project_screenshot_small !!}
    <div class="inverse-paars-button">
      <button class="open-site-small btn btn-paars mx-auto">{{ $project_url_trimmed }}</button>
    </div>
  </div>
</li>
