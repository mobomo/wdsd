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

  $form['typefaces'] = array(
    '#type' => 'fieldset',
    '#title' => t('Fonts Customization'),
    '#description' => t("Select Font Family to use for each section", array('!style_settings_module' => $style_settings_module)),
    '#weight' => -1,
  );

  //We define the font family options. We need to match the font-family aliases in css!
  $fontfamily = array(
    'Merriweather' => t('Merriweather'),
    'Source Sans Pro' => t('Source Sans Pro'),
  );

  $form['typefaces']['headers'] = array(
    '#type' => 'select',
    '#title' => t('Headings'),
    '#description' => t('Font Family to use in headings (h1 to h6)'),
    '#options' => $fontfamily,
    // Besides hex color value also color names are accepted.
    '#default_value' => theme_get_setting('headers'),
  );

  $form['typefaces']['paragraph'] = array(
    '#type' => 'select',
    '#title' => t('Body'),
    '#description' => t('Font Family to use in body'),
    '#options' => $fontfamily,
    // Besides hex color value also color names are accepted.
    '#default_value' => theme_get_setting('paragraph'),
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
    '#description' => t('Select header style for each Content Type. Here you can see the  <a taget="_blank" href="@url">different options</a>', array('@url' => url('https://standards.usa.gov/components/headers')))
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
    '#description' => t('Select Footer style to use in this theme. Here you can see the  <a taget="_blank" href="@url">different options</a>', array('@url' => url('https://standards.usa.gov/components/footers')))
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
