<header class="banner">
  <div class="container">
    <div class="row">
      <nav class="nav-top fixed-top navbar bg-white justify-content-start">
        <div class="col-sm-4">
          @if (has_nav_menu('top_navigation'))
            {!! wp_nav_menu(['theme_location' => 'top_navigation', 'menu_class' => 'nav navbar-nav', 'link_after' => '<i class="fas fa-arrow-right"></i>', 'walker' => new App\wp_bootstrap4_navwalker()]) !!}
          @endif
        </div>

        <div class="col-sm-4 text-center">
          <a class="navbar-brand" href="{{ home_url('/') }}">
            <img class="navbar-brand-img img-fluid" src="@asset('images/Open-state-foundation-logo.svg')">
          </a>
        </div>

        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="menu-text">MENU</a>
        </button>

        <div id="qtranslate_dropdown">
          {!! qts_language_menu('text'); // qTranslate Slug plugin !!}
        </div>
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav', 'link_after' => '<i class="fas fa-arrow-right"></i>', 'container' => 'div', 'container_id' => 'navbarSupportedContent', 'container_class' => 'collapse navbar-collapse', 'walker' => new App\wp_bootstrap4_navwalker()]) !!}
        @endif
        <div class="breadcrumbs-parent col-12">
          {!! App\breadcrumbs(); !!}
        </div>
      </nav>
    </div>
  </div>
</header>
