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

        <div class="col-sm-1 offset-3 text-center rm-gutter">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="menu-text">MENU</a>
          </button>
        </div>

        <?
          global $qtranslate_slug;
          $lang = 'nl';
          if (get_bloginfo("language") == 'nl') {
            $lang = 'en';
          }
        ?>

        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(
            [
              'theme_location' => 'primary_navigation',
              'menu_class' => 'nav navbar-nav',
              'link_after' => '<i class="fas fa-arrow-right"></i>',
              'items_wrap' => '
                <div class="outer-menu row">
                  <div class="col-10 offset-1">
                    <ul id="%1$s" class="%2$s">%3$s</ul>
                  </div>
                  <div class="col-1 menu-icons">
                    <div class="language mx-auto">
                      <a href="' . $qtranslate_slug->get_current_url($lang) . '">NL/EN</a>
                    </div>
                  </div>
                  <br>
                </div>',
              'container' => 'div',
              'container_id' => 'navbarSupportedContent',
              'container_class' => 'collapse navbar-collapse',
              'walker' => new App\wp_bootstrap4_navwalker()
            ]
          ) !!}
        @endif
        <div class="breadcrumbs-parent col-11">
          {!! App\breadcrumbs(); !!}
        </div>
        <div class="col-1">
          <div class="language-parent">
            <div class="language mx-auto">
              <a href="' . $qtranslate_slug->get_current_url($lang) . '">NL/EN</a>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </div>
</header>
