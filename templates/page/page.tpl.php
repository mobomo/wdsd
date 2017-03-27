<?php
/**
 * @file
 * U.S. Web Design Standards theme implementation to display the default Drupal
 * page. Credit goes to the Bartik team for this awesome documentation!
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the directory
 * above.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['navigation']: Items for the featured region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['simple_toc']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items for the bottom region.
 *
 */
?>
<?php
//init vars. Set some defaults and check if are defined.
$nodetype = 'landing';
$footer_type = 'slim';
$footer_secondary = '';
if (isset($variables['nodetype'])) : $nodetype = $variables['nodetype']; endif;
if (isset($variables['footer'])) : $footer_type = $variables['footer']; endif;
if (isset($variables['footer_secondary']) && theme_get_setting('footer') == 'big') : $footer_secondary = $variables['footer_secondary']; endif;
?>
  <a class="usa-skipnav" href="#main-content"><?php print t('Skip to main content');?></a>
  <header class="usa-header usa-header-<?php print (check_plain(theme_get_setting($nodetype)));?>" role="banner">

    <!-- Gov banner BEGIN -->
    <div class="usa-banner">
      <div class="usa-accordion">
        <header class="usa-banner-header">
          <div class="usa-grid usa-banner-inner">
          <img src="<?php print(file_create_url(drupal_get_path('theme', 'wdsd') . '/assets/img/favicons/favicon-57.png'));?>" alt="U.S. flag">
          <?php if ($site_slogan): ?><p><?php print $site_slogan; ?></p><?php endif ;?>
          <button class="usa-accordion-button usa-banner-button"
            aria-expanded="false" aria-controls="gov-banner">
            <span class="usa-banner-button-text"><?php print t('Here\'s how you know');?></span>
          </button>
          </div>
        </header>
        <div class="usa-banner-content usa-grid usa-accordion-content" id="gov-banner">
          <p><i>All this section ("Gov banner") is hardcoded in template, lets discuss if its worth to add it by default</i></p>
          <div class="usa-banner-guidance-gov usa-width-one-half">
            <img class="usa-banner-icon usa-media_block-img" src="<?php print(file_create_url(drupal_get_path('theme', 'wdsd') . '/assets/img/icon-dot-gov.svg'));?>" alt="Dot gov">
            <div class="usa-media_block-body">
              <p>
                <strong>The .gov means it’s official.</strong>
                <br>
                Federal government websites always use a .gov or .mil domain. Before sharing sensitive information online, make sure you’re on a .gov or .mil site by inspecting your browser’s address (or “location”) bar.
              </p>
            </div>
          </div>
          <div class="usa-banner-guidance-ssl usa-width-one-half">
            <img class="usa-banner-icon usa-media_block-img" src="<?php print(file_create_url(drupal_get_path('theme', 'wdsd') . '/assets/img/icon-https.svg'));?>" alt="SSL">
            <div class="usa-media_block-body">
              <p>This site is also protected by an SSL (Secure Sockets Layer) certificate that’s been signed by the U.S. government. The <strong>https://</strong> means all transmitted data is encrypted  — in other words, any information or browsing history that you provide is transmitted securely.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Gov banner END -->
  <?php if (theme_get_setting($nodetype) == 'basic') :?>
    <div class="usa-nav-container">
  <?php endif ;?>
      <div class="usa-navbar">
        <button class="usa-menu-btn"><?php print t('Menu');?></button>
        <?php if ($site_name): ?>
          <div class="usa-logo" id="logo">
            <em class="usa-logo-text">
              <a href="<?php print $front_page;?>" accesskey="1" title="Home" aria-label="Home"><?php print $site_name; ?></a>
            </em>
          </div>
        <?php endif; ?>
      </div>

      <nav role="navigation" class="usa-nav">
        <?php if (theme_get_setting($nodetype) == 'extended') :?>
          <div class="usa-nav-inner">
        <?php endif ;?>
            <button class="usa-nav-close">
              <img src="<?php print(file_create_url(drupal_get_path('theme', 'wdsd') . '/assets/img/close.svg'));?>" alt="close">
            </button>

            <?php // print main menu
            print theme('links__system_main_menu', array('links' => $main_menu_expanded,'attributes' => array('id' => 'main-menu','class' => array('usa-nav-primary', 'usa-accordion'))));
            ?>
            <?php if (theme_get_setting($nodetype) == 'basic') :?>
              <?php print render($page['search']); ?>
            <?php else :?>
              <div class="usa-nav-secondary">
                <?php print render($page['search']); ?>
                <ul class="usa-unstyled-list usa-nav-secondary-links">
                  <li class="js-search-button-container">
                    <button class="usa-header-search-button js-search-button"><?php print t('Search');?></button>
                  </li>
                  <li>
                    <a href="#">Secondary priority link</a>
                  </li>
                  <li>
                    <a href="#">Easy to comprehend</a>
                  </li>
                </ul>
              </div>
            <?php endif ;?>

          <?php if (theme_get_setting($nodetype) == 'extended') :?>
            </div><!--.usa-nav-inner ends-->
          <?php endif ;?>
        </nav>

  <?php if (theme_get_setting($nodetype) == 'basic') :?>
    </div> <!--.usa-nav-container ends -->
  <?php endif ;?>

  </header>

  <?php $tab_rendered = render($tabs); ?>
  <?php if ($page['highlighted'] || $messages || !empty($tab_rendered) || $action_links): ?>
    <div class="row">
      <div class="large-12 columns" id="admin-functions">
        <?php if ($page['highlighted']): ?>
          <div id="highlighted"><?php print render($page['highlighted']); ?></div>
        <?php endif; ?>
        <?php print $messages; ?>
        <?php if (!empty($tab_rendered)): ?><div class="tabs clearfix"><?php print $tab_rendered; ?></div><?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
  
  <div class="usa-overlay"></div>

  <main id="main-content"<?php if ($nodetype == 'documentation'):?> class="usa-grid usa-section usa-content usa-layout-docs"<?php endif;?>>
      <?php if ($page['simple_toc'] || $page['sidebar_second']): ?>
        <aside class="usa-width-one-fourth usa-layout-docs-sidenav">
          <?php print render($page['simple_toc']); ?>
          <?php print render($page['sidebar_second']); ?>
        </aside>
      <?php endif; ?>
      <?php if (!isset($node)) : ?>
        <section class="usa-grid">
          <?php print render($page['content']); ?>
        <section>
      <?php else : ?>
        <?php print render($page['content']); ?>
      <?php endif;?>
      <?php print $feed_icons; ?>
  </main>

  <?php if ($page['primaryfooter'] || $page['secondfooter']) : ?>

  <footer class="usa-footer <?php print $footer_type;?>" role="contentinfo">
      <div class="usa-grid usa-footer-return-to-top">
        <a href="#"><?php print t('Return to top');?></a>
      </div>
      <?php if (theme_get_setting('footer') !== 'slim') :?>
        <div class="usa-footer-primary-section">
          <div class="usa-grid-full">
            <?php print render($page['primaryfooter']); ?>
          </div>
        </div>
        <div class="usa-footer-secondary_section<?php print $footer_secondary;?>">
          <div class="usa-grid">
            <?php print render($page['secondfooter']); ?>
          </div>
        </div>
      <?php else : ?>

        <div class="usa-footer-primary-section">
          <div class="usa-grid-full">
            <?php print render($page['primaryfooter']); ?>
            <div class="usa-width-one-third">
              <div class="usa-footer-primary-content usa-footer-contact_info">
                <?php if (isset($variables['bean_footer']['field_telephone'])) : ?>
                  <p><?php print render($variables['bean_footer']['field_telephone']);?></p>
                <?php endif ;?>
              </div>
              <div class="usa-footer-primary-content usa-footer-contact_info">
                <?php if (isset($variables['bean_footer']['field_email'])) : ?>
                  <?php print render($variables['bean_footer']['field_email']);?>
                <?php endif ;?>
              </div>
            </div>
          </div>
        </div>
        <div class="usa-footer-secondary_section">
          <div class="usa-grid">
            <div class="usa-footer-logo">
              <?php if (isset($variables['bean_footer']['field_logo'])) : ?>
                <img class="usa-footer-slim-logo-img" src="<?php print (file_create_url($variables['bean_footer']['field_logo'][0]['#item']['uri']));?>" alt="<?php print ($variables['bean_footer']['field_logo'][0]['#item']['alt']);?>">
              <?php endif ;?>
              <?php if (isset($variables['bean_footer']['field_footer_logo_heading'])) : ?>
                <h3 class="usa-footer-slim-logo-heading"><?php print render($variables['bean_footer']['field_footer_logo_heading']);?></h3>
              <?php endif ;?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </footer>
  <?php endif; ?>
