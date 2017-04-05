<?php
/**
 *
 * Implements hook_preprocess_html().
 *
 */
function wdsd_preprocess_html(&$vars) {
  // set the path to the theme and make it available in html.tpl.php
  $vars['theme_path'] = drupal_get_path('theme', 'wdsd');
  // Ensure that the $vars['rdf'] variable is an object.
  if (!isset($vars['rdf']) || !is_object($vars['rdf'])) {
    $vars['rdf'] = new StdClass();
  }

  if (module_exists('rdf')) {
    $vars['doctype'] = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML+RDFa 1.1//EN">' . "\n";
    $vars['rdf']->version = 'version="HTML+RDFa 1.1"';
    $vars['rdf']->namespaces = $vars['rdf_namespaces'];
    $vars['rdf']->profile = ' profile="' . $vars['grddl_profile'] . '"';
  } else {
    $vars['doctype'] = '<!DOCTYPE html>' . "\n";
    $vars['rdf']->version = '';
    $vars['rdf']->namespaces = '';
    $vars['rdf']->profile = '';
  }
}

/**
 * Implements hook_preprocess_page().
 */
function wdsd_preprocess_page(&$variables) {
    // Get the entire main menu tree
    $main_menu_tree = menu_tree_all_data('main-menu');

    // Add the rendered output to the $main_menu_expanded variable
    $variables['main_menu_expanded'] = menu_tree_output($main_menu_tree);

    // if this is a panel page, add template suggestions
    if($panel_page = page_manager_get_current_page()) {
      $variables['theme_hook_suggestions'][] = 'page__panel';
    }
    if (isset($variables['node']) && isset($variables['node']->type)) {
      $variables['nodetype'] = $variables['node']->type;
    }
    // page.tpl per content type
    if (isset($variables['node']->type)) {
      $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
    }
    if (isset($variables['node']->type) && $variables['node']->type == 'documentation' ) {
      $variables['page']['search']['search_form']['#attributes']['class'] = 'usa-search usa-search-small';
    }
    if (isset($variables['node'])) {
      $variables['footer'] = theme_get_setting('footer');
      if($variables['footer'] == 'medium') {
        $variables['footer'] = 'usa-footer-medium';
      } elseif ($variables['footer'] == 'big') {
        $variables['footer'] = 'usa-footer-big';
        $variables['footer_secondary'] = ' usa-footer-big-secondary-section';
      } else {
        $variables['footer'] = 'usa-footer-slim';
      }
      //If Bean block is active on Second Footer region
      if (isset($variables['page']['secondfooter']['bean_secondary-footer']['bean']['secondary-footer'])) {
        $variables['bean_footer'] = $variables['page']['secondfooter']['bean_secondary-footer']['bean']['secondary-footer'];
        //check if bean fields are not set
        if (!isset($variables['bean_footer']['field_footer_logo_heading']) && !isset($variables['bean_footer']['field_email']) && !isset($variables['bean_footer']['field_telephone']) && !isset($variables['bean_footer']['field_logo']) ) {
          //add missing fields warning to editors/admins
          drupal_set_message(t('Some fields in the Bean "Secondary Footer" are empty. Please <a taget="_blank" href="@url">fill them in</a> to display the footer correctly', array('@url' => url('/block/secondary-footer/edit?destination=admin/content/blocks'))), 'warning');
        }

      }
    }
    //init default theme settings
    $headers = theme_get_setting('headers');
    $paragraph = theme_get_setting('paragraph');
    $logo = theme_get_setting('headerlogo');
    $menu_items = theme_get_setting('menu_items');
    $defont = theme_get_setting('defont');

    $hero_background_colour = theme_get_setting('hero_background_colour');
    $hero_title_colour = theme_get_setting('hero_title_colour');
    $hero_heading_colour = theme_get_setting('hero_heading_colour');
    $hero_link_colour = theme_get_setting('hero_link_colour');
    $hero_button_bg_colour = theme_get_setting('hero_button_bg_colour');
    $hero_button_colour = theme_get_setting('hero_button_colour');
}

/**
 * Implements hook_form_alter()
 * Remove search form from search results page.
*/
function wdsd_form_alter(&$form, &$form_state, $form_id) {
// dpm($form);
  if($form_id == "search_form") {
      $form['#access'] = FALSE;
    }
}

function wdsd_preprocess_node(&$variables) {
  if ($variables['type'] == 'landing' && isset($variables['field_image'])
  && isset($variables['field_hero'])) {
    $variables['hero_background'] = file_create_url($variables['field_image'][0]['uri']);
  } else {
    $variables['hero_background'] = '';
  }
}

function wdsd_field__field_graphic_list ($variables) {
  $output = '';
  $countitems = '';
  $countitems = count($variables ['items']);
  // Render the items.
  foreach ($variables ['items'] as $delta => $item) {
    //if delta is even (0,2,4) we open the group wrapper div
    if ($delta % 2 == 0) {
        $output .= '<div class="usa-grid usa-graphic_list-row delta-' . $delta . '">';
        $output .= drupal_render($item);
    //if delta is odd (1,3,5) or we only have one item we close the group wrapper div
    } elseif ($delta % 2 != 0 || $countitems == 1) {
        $output .= drupal_render($item);
        $output .= '</div>';
    }
  }

  return $output;
}

function wdsd_preprocess_field(&$variables) {

  if ($variables['element']['#field_name'] == 'field_icon') {

    foreach($variables['items'] as $key => $item){
      $variables['items'][ $key ]['#item']['attributes']['class'][] = 'usa-banner-icon usa-media_block-img';
    }
  }
}

/**
 * Implements hook_preprocess_HOOK().
 * Remove Height and Width Inline Styles
 */
function wdsd_preprocess_image(&$variables) {
  foreach (array('width', 'height') as $key) {
    unset($variables[$key]);
  }
}
/**
* Changes the search form to use the "search" input element of HTML5.
*/
function wdsd_preprocess_search_block_form(&$variables) {
  $variables['search_form'] = str_replace('type="text"', 'type="search"', $variables['search_form']);
}
/**
 * Implements hook_form_form_ID_alter()
*/
function wdsd_form_search_block_form_alter(&$form, &$form_state, $form_id) {
  $form['#attributes'] = array ('class' => array('usa-search', 'usa-search-small', 'js-search-form'));
  hide($form['actions']);
  $form['search_block_form']['#size'] = 40;
//   $form['actions']['#attributes']['class'][] = 'element-invisible';
}

/**
* Add class to Image Style
*/
function wdsd_preprocess_image_style(&$variables) {
  if($variables['style_name'] == 'media_block'){
    $variables['attributes']['class'][] = 'usa-media_block-img';
  }
}

/**
* Overrides theme_menu_tree().
*/
function wdsd_menu_tree__menu_footer_menu($variables){
  $footer_nav_class = '';
  $footer_ul_class = '';

  if (theme_get_setting('footer')) {
    $footer_nav_class = 'usa-footer-nav';
    $footer_ul_class = 'usa-unstyled-list';
    if (theme_get_setting('footer') == 'big') {
        $footer_nav_class .= ' usa-width-two-thirds';
        $footer_ul_class .= ' usa-width-one-fourth usa-footer-primary-content';
    } elseif (theme_get_setting('footer') == 'medium') {
        $footer_nav_class .= '';
        $footer_ul_class .= '';
    } else {
        $footer_nav_class .= ' usa-width-two-thirds';
        $footer_ul_class .= '';
      }
    }

  return '<nav class="' . $footer_nav_class . '"><ul class="' . $footer_ul_class . '">' . $variables['tree'] . '</ul></nav>';
}

/**
 * Implements of hook_menu_link().
 */
function wdsd_menu_link__menu_footer_menu($variables) {

  $footer_li_class = '';
  $footer_a_class = '';

  if (theme_get_setting('footer')) {
    $footer_li_class = 'usa-footer-primary-content';
    $footer_a_class = 'usa-footer-primary-link';
    if (theme_get_setting('footer') == 'big') {
        $footer_li_class = '';
        $footer_a_class = '';
    } elseif (theme_get_setting('footer') == 'medium') {
        $footer_li_class .= ' usa-width-one-sixth';
        $footer_a_class .= '';
    } else {
        $footer_li_class .= ' usa-width-one-fourth';
        $footer_a_class .= '';
      }
  }

  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  // Classes on parent <li>.
  $element['#attributes']['class'][] = $footer_li_class;

  // Classes on link <a>.
  $element['#localized_options']['attributes']['class'][] = $footer_a_class;

  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
* Customise Main Menu output.
*/
function wdsd_menu_link__menu_block__2($variables) {
  $element = $variables['element'];
  $sub_menu = '';
  $parentTitle = '';
  if ($element['#below']) {
      $sub_menu = drupal_render($element['#below']);
      $parentTitle = $element['#title'];

      // classes and ids replacement. Yeah, crappy and nasty. Sorry :(
      $pmlid = $element['#original_link']['mlid'];
      $sub_menu = str_replace('usa-nav-primary usa-accordion', 'usa-nav-submenu', $sub_menu);
      $sub_menu = str_replace('parent-menu-', 'sidenav-' . $pmlid, $sub_menu);

      // parent item button attributes
      $element['#localized_options']['attributes']['aria-controls'] = 'sidenav-' . $pmlid;
      $element['#localized_options']['attributes']['aria-expanded'] = 'false';
      $element['#localized_options']['attributes']['class'][] = 'usa-accordion-button usa-nav-link';
//       dpm($sub_menu);
      $output = '<button ' . drupal_attributes($element['#localized_options']['attributes']) . '><span>' . $parentTitle .'</span></button>';
     } else {

    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    }

    return '<li>' . $output . $sub_menu . "</li>\n";
}

/**
* Customise Main Menu output.
*/
// function wdsd_links__system_main_menu($variables) {
//
// dpm($variables);
//
//   $output = '';
//   foreach ($variables['links'] as $link) {
//     $output .= l($link['title'], $link['href'], $link);
//   }
//   return $output;
// }

/**
 * Implements hook_links__system_main_menu().
 */
function wdsd_links__system_main_menu($variables) {
  // Get the active trail
  $menu_active_trail = menu_get_active_trail();
  // Init our custom trail.
  $active_trail = array();

  // UL classes
  $class = implode($variables['attributes']['class'], ' ');
  $html = '<ul class="' . $class . '" id="' . $variables['attributes']['id'] . '">';

  // Loop links to build the menu.
  foreach ($variables['links'] as $key => $link) {

    // Check this is a link not a property.
    if (is_numeric($key)) {
      $sub_menu = '';

      $link_title = $link['#title'];

      // Check if we have a submenu and depth is 1.
      if ($link['#below'] && $link['#original_link']['depth'] == 1) {
          $pmlid = '';
          $pmlid = $link['#original_link']['mlid'];
          $link['#localized_options']['attributes']['aria-controls'] = 'sidenav-' . $pmlid;
          $link['#localized_options']['attributes']['aria-expanded'] = 'false';
          $link['#localized_options']['attributes']['class'][] = 'usa-accordion-button usa-nav-link';

          $output = '<button ' . drupal_attributes($link['#localized_options']['attributes']) . '><span>' . $link_title .'</span></button>';

        // Theme submenu
        $sub_menu = theme('links__system_main_menu', array('links' => $link['#below'], 'attributes' => array('class' => array('usa-nav-submenu'), 'id' => 'sidenav-' . $pmlid)));

        $html .= '<li><button ' . drupal_attributes($link['#localized_options']['attributes']) . '><span>' . $link['#title'] .'</span></button>' . $sub_menu . '</li>';
      } else {
        // If no children
        $html .= '<li>' . l($link['#title'], $link['#href'], $link['#localized_options']) . '</li>';
      }
    }
  }
  $html .= '</ul>';

  return $html;
}

/**
 * Implements theme_menu_item_link().
 * Code from: https://www.drupal.org/docs/7/working-with-menus/named-anchors-in-menus
 */
function wdsd_menu_item_link($item, $link_item) {
  // Convert anchors in path to proper fragment
  $path = explode('#', $link_item['path'], 2);
  $fragment = !empty($path[1]) ? $path[1] : NULL;
  $path = $path[0];
  return l(
            $item['title'],
            $path,
            !empty($item['description']) ? array('title' => $item['description']) : array(),
            !empty($item['query']) ? $item['query'] : NULL,
            $fragment,
            FALSE,
            FALSE
          );
}

/**
 * Override or insert variables into the page template for HTML output.
 */
function wdsd_process_html(&$variables) {
 // Hook into color.module.
 if (module_exists('color')) {
 _color_html_alter($variables);
 }
}

/**
 * Override or insert variables into the page template.
 */
function wdsd_process_page(&$variables, $hook) {
 // Hook into color.module
 if (module_exists('color')) {
 _color_page_alter($variables);
 }
}
