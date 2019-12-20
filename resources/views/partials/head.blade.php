<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php
    echo '<meta name="twitter:card" content="summary">', "\r\n  ";
    $image = get_the_post_thumbnail_url($post_id);
    if($image && !is_front_page()) {
        echo '<meta property="og:image" content="' . esc_url($image) . '">';
        echo '<meta property="og:title" content="' . ltrim(wp_title('', false)) . '">' . "\r\n  ";
    } else {
        echo '<meta property="og:image" content="https://openstate.eu/wp-content/themes/open-state-theme/dist/images/logo-open-state-foundation-og.png">';
        echo '<meta property="og:title" content="Open State Foundation">' . "\r\n  ";
    }
  ?>

  @php wp_head() @endphp

  <!-- Piwik -->
  <script type="text/javascript">
    var _paq = _paq || [];
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
      _paq.push(['setTrackerUrl',  'https://ss-api-d8700d972e5068e05df824daaf10bb1e.openstate.eu']);
      _paq.push(['setSiteId', 1]);
      _paq.push(['setApiToken', '5MCfl3NJMI6qZif3YuaM5p-89-Mj-TlAHhX0jxOoEUd']);
      var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
      g.type='text/javascript'; g.async=true; g.defer=true; g.src='https://ss-b5g27hswtn22u19wyueu.openstate.eu/embed.js'; s.parentNode.insertBefore(g,s);
    })();
  </script>
  <!-- End Piwik Code -->

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-32274817-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-32274817-1', { 'anonymize_ip': true });
  </script>
</head>
