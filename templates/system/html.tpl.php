<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 */
?><?php print $doctype; ?>
<html class="no-js" lang="en">

  <head<?php print $rdf->profile; ?>>
    <?php print $head; ?>
    <title><?php print $head_title; ?></title>

    <!-- Basic Page Needs -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Specific Metas -->
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicons -->
    <!-- 128x128 -->
    <link rel="icon" type="image/png" href="<?php print $theme_path; ?>/assets/img/favicons/favicon.png" />
    <!-- 192x192, as recommended for Android http://updates.html5rocks.com/2014/11/Support-for-theme-color-in-Chrome-39-for-Android -->
    <link rel="icon" type="image/png" sizes="192x192" href="<?php print $theme_path; ?>/assets/img/favicons/favicon-192.png" />
    <!-- 57x57 (precomposed) for iPhone 3GS, pre-2011 iPod Touch and older Android devices -->
    <link rel="apple-touch-icon-precomposed" href="<?php print $theme_path; ?>/assets/img/favicons/favicon-57.png">
    <!-- 72x72 (precomposed) for 1st generation iPad, iPad 2 and iPad mini -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php print $theme_path; ?>/assets/img/favicons/favicon-72.png">
    <!-- 114x114 (precomposed) for iPhone 4, 4S, 5 and post-2011 iPod Touch -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php print $theme_path; ?>/assets/img/favicons/favicon-114.png">
    <!-- 144x144 (precomposed) for iPad 3rd and 4th generation -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php print $theme_path; ?>/assets/img/favicons/favicon-144.png">

    <?php print $styles; ?>
  </head>

  <body class="<?php print $classes; ?>" <?php print $attributes;?>>
    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>

    <?php print $scripts; ?>

    <!--[if lt IE 9]>
      <script src="<?php print $theme_path; ?>/assets/js/vendor/html5shiv.js"></script>
      <script src="<?php print $theme_path; ?>/assets/js/vendor/respond.js"></script>
      <script src="<?php print $theme_path; ?>/assets/js/vendor/selectivizr-min.js"></script>
    <![endif]-->

  </body>

</html>
