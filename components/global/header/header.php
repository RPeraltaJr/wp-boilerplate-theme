<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

  <?php if (!empty($global->tag_manager->gtm_id)): ?>
    <!-- Google Tag Manager -->
    <script>
      (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
          'gtm.start': new Date().getTime(),
          event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
          j = d.createElement(s),
          dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
          'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
      })(window, document, 'script', 'dataLayer', '<?php echo $global->tag_manager->gtm_id; ?>');
    </script>
    <!-- End Google Tag Manager -->
  <?php endif; ?>

  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Cache-control" content="public">

  <title><?php echo get_bloginfo('name') . " - " ?? ''; ?><?php the_title(); ?></title>

  <?php wp_head(); ?>

  <!-- Stylesheet -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/build/css/<?php echo $page_setting->type; ?>.min.css?ver=<?php echo $version; ?>">

</head>

<body id="top" <?php body_class(); ?>>

  <?php if (!empty($global->tag_manager->gtm_id)): ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $global->tag_manager->gtm_id; ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
  <?php endif; ?>

  <a href='<?php if (!empty($page_setting->main)): echo $page_setting->main;
            endif; ?>' class='sr-only'>Skip to main content</a>

  <main>
