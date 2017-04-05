<?php
function wdsd_form_system_theme_settings_alter(&$form, &$form_state) {
  //Init vars. Get Content Types.
  $node_types = node_type_get_types();
  $style_settings_module = l(t('Style (CSS) Settings module'), 'https://drupal.org/project/style_settings', array(
      'attributes' => array(
        'title' => t('Style (CSS) Settings | Drupal.org'),
        'target' => '_blank',
      ),
  ));

  if (module_exists('style_settings')) {

    $form['hero_section'] = array(
      '#type' => 'fieldset',
      '#title' => t('Hero Box Customization'),
      '#description' => t("Select the color to use for each part of the box", array('!style_settings_module' => $style_settings_module)),
      '#weight' => 0,
    );
    $form['hero_section']['hero_background_colour'] = array(
      '#type' =>  'style_settings_colorpicker',
      '#title' => t('Background Colour'),
      '#description' => t('Background colour for Hero Section box'),
      // Besides hex color value also color names are accepted.
      '#default_value' => theme_get_setting('hero_background_colour'),
    );
    $form['hero_section']['hero_title_colour'] = array(
      '#type' =>  'style_settings_colorpicker',
      '#title' => t('Title Colour'),
      '#description' => t('Font colour for Hero Title'),
      // Besides hex color value also color names are accepted.
      '#default_value' => theme_get_setting('hero_title_colour'),
    );
    $form['hero_section']['hero_heading_colour'] = array(
      '#type' =>  'style_settings_colorpicker',
      '#title' => t('Heading Color'),
      '#description' => t('Font colour for Hero Heading'),
      // Besides hex color value also color names are accepted.
      '#default_value' => theme_get_setting('hero_heading_colour'),
    );
    $form['hero_section']['hero_link_colour'] = array(
      '#type' =>  'style_settings_colorpicker',
      '#title' => t('Link Color'),
      '#description' => t('Font colour for Hero Link'),
      // Besides hex color value also color names are accepted.
      '#default_value' => theme_get_setting('hero_link_colour'),
    );
    $form['hero_section']['hero_button_bg_colour'] = array(
      '#type' =>  'style_settings_colorpicker',
      '#title' => t('Button Background Color'),
      '#description' => t('Background Color for Hero Button'),
      // Besides hex color value also color names are accepted.
      '#default_value' => theme_get_setting('hero_button_bg_colour'),
    );
    $form['hero_section']['hero_button_colour'] = array(
      '#type' =>  'style_settings_colorpicker',
      '#title' => t('Button Text Color'),
      '#description' => t('Font Color for Hero Button Text'),
      // Besides hex color value also color names are accepted.
      '#default_value' => theme_get_setting('hero_button_colour'),
    );

    $form['typefaces'] = array(
      '#type' => 'fieldset',
      '#title' => t('Fonts Customization'),
      '#description' => t("Select Font Family to use for each section", array('!style_settings_module' => $style_settings_module)),
      '#weight' => 1,
    );

    //We define the font family options. We need to match the font-family aliases in css!
    $fontfamily = array(
      'Source Sans Pro' => t('Source Sans Pro'),
      'Merriweather' => t('Merriweather'),
    );

    $form['typefaces']['headers'] = array(
      '#type' => 'select',
      '#title' => t('Headings'),
      '#description' => t('Font Family to use in headings (h1 to h6)'),
      '#options' => $fontfamily,
      '#default_value' => theme_get_setting('headers'),
    );

    $form['typefaces']['paragraph'] = array(
      '#type' => 'select',
      '#title' => t('Paragraphs'),
      '#description' => t('Font Family to use in p tags'),
      '#options' => $fontfamily,
      '#default_value' => theme_get_setting('paragraph'),
    );

    $form['typefaces']['headerlogo'] = array(
      '#type' => 'select',
      '#title' => t('Logo Font'),
      '#description' => t('Font Family for Logo in Header'),
      '#options' => $fontfamily,
      '#default_value' => theme_get_setting('headerlogo'),
    );
    $form['typefaces']['menu_items'] = array(
      '#type' => 'select',
      '#title' => t('Menu Links'),
      '#description' => t('Font Family Menu Links'),
      '#options' => $fontfamily,
      '#default_value' => theme_get_setting('menu_items'),
    );

    $form['typefaces']['defont'] = array(
      '#type' => 'select',
      '#title' => t('Default'),
      '#description' => t('Font Family for all elements in html not listed above'),
      '#options' => $fontfamily,
      '#default_value' => theme_get_setting('defont'),
    );

    // Custom options heading.
    $form['custom_options'] = array(
      '#type' => 'fieldset',
      '#title' => t('Web Design Standards - Custom Options'),
      '#description' => t('WDSD Theme options to customise Header and Footer'),
    );

    // Header options.
    $form['header'] = array(
      '#type' => 'fieldset',
      '#title' => t('Header Styles'),
      '#description' => t('Select header style for each Content Type. Here you can see the  <a taget="_blank" href="@url">different options</a>', array('@url' => url('https://standards.usa.gov/components/headers'))),
      '#weight' => 2,
    );
    //we loop through CTs names.
    foreach ($node_types as $type => $name) {
      $hname = '';
      $hname = $name->name;
      $headertypes = array(
        'basic' => t('Basic'),
        'extended' => t('Extended')
      );
      $form['header'][$type] = array(
        '#type' => 'select',
        '#title' => t(''. $hname .''),
        '#options' => $headertypes,
        '#default_value' => theme_get_setting($type),
        '#description' => t('Select the type of Header for ' . $hname . ' Content Type.')
      );
    }
    // Footer options.
    $form['footerheading'] = array(
      '#type' => 'fieldset',
      '#title' => t('Footer Styles'),
      '#description' => t('Select Footer style to use in this theme. Here you can see the  <a taget="_blank" href="@url">different options</a>', array('@url' => url('https://standards.usa.gov/components/footers'))),
      '#weight' => 3,
    );

    $footertypes = array(
      'big' => t('Big'),
      'medium' => t('Medium'),
      'slim' => t('Slim')
    );

    $form['footerheading']['footer'] = array(
      '#type' => 'radios',
      '#title' => t('Footer Style'),
      '#options' => $footertypes,
      '#default_value' => theme_get_setting('footer'),
      '#description' => t('Select the type of Footer'),
    );
  }
  // If the Style Settings module is not enabled, provide some instructions.
  else {
    $form['hero_section']['wdsd_note'] = array(
      '#markup' => t("Enable the !style_settings_module to get style options exposed here.", array('!style_settings_module' => $style_settings_module)),
    );
  }

  // Slick.js Support
//   $form['custom_options']['slick'] = array(
//     '#type' => 'checkbox',
//     '#title' => t('Slick'),
//     '#description' => t('Enable slick.js carousel (usage: .slick as wrapper)'),
//     '#default_value' => theme_get_setting('slick'),
//   );
//
//   // MatchHeight.js Support
//   $form['custom_options']['matchHeight'] = array(
//     '#type' => 'checkbox',
//     '#title' => t('MatchHeight'),
//     '#description' => t('Enable matchHeight.js for equalising element heights (usage: .matchHeight on element to be affected)'),
//     '#default_value' => theme_get_setting('matchHeight'),
//   );
//
//   // get current year for copyright
//   $year = date('Y');
//
//   // Copyright text
//   $form['custom_options']['copyright'] = array(
//     '#type' => 'textfield',
//     '#title' => t('Copyright text'),
//     '#description' => t('Copyright text to be displayed on the site. It will be prepended by <em>&copy; '.$year.' ...</em>. See page.tpl.php for usage'),
//     '#default_value' => theme_get_setting('copyright'),
//   );

}

function wdsd_admin_settings_submit($form, &$form_state) {
    // Make sure changes are visible right after saving the settings.
    _drupal_flush_css_js();
    // If changes don't appear, try to uncomment also the line below.
    cache_clear_all('style_settings_', 'cache', TRUE);
}
