<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php
    echo '<meta name="twitter:card" content="summary">', "\r\n  ";
    if(!is_front_page()) {
        echo '<meta property="og:title" content="' . ltrim(wp_title('', false)) . '">' . "\r\n  ";
        $image = get_the_post_thumbnail_url($post_id);
        if ($image) {
            echo '<meta property="og:image" content="' . esc_url($image) . '">';
        } else {
            echo '<meta property="og:image" content="https://openstate.eu/wp-content/themes/open-state-theme/dist/images/logo-open-state-foundation-og.png">';
        }
    } elseif (strpos($_SERVER['REQUEST_URI'], 'civicrm/petition/sign') !== false && isset($_GET['sid']) && $_GET['sid'] == '2') {
        echo '<meta property="og:image" content="https://openstate.eu/wp-content/uploads/sites/14/2025/03/Petitie-lobbyregister.webp">';
        echo '<meta property="og:title" content="Petitie: Maak lobby transparant!">' . "\r\n  ";
    } else {
        echo '<meta property="og:image" content="https://openstate.eu/wp-content/themes/open-state-theme/dist/images/logo-open-state-foundation-og.png">';
        echo '<meta property="og:title" content="Open State Foundation">' . "\r\n  ";
    }
  ?>

  @php wp_head() @endphp

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-32274817-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-32274817-1', { 'anonymize_ip': true });
  </script>
</head>
