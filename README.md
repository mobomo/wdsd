# U.S. Web Design Standards – Drupal 7 theme

Drupal Integration of the [U.S. Web Design Standards](https://standards.usa.gov/) library.

The library is included in the 'assets' directory.

Its strongly recommended to use this theme as part of the [Installation Profile](https://gitlab.com/d7uswds/d7uswds-make).

## Dependencies

Please note that if you want to install the standalone version of this theme (ie, without our [Installation Profile](https://gitlab.com/d7uswds/d7uswds-make)) you will need to install and enable the following modules:

- Color Module [color](https://www.drupal.org/docs/7/core/modules/color)
- Style Settings Module [style_settings](https://www.drupal.org/project/style_settings)

## Theme Configuration
After installing the theme, go to Theme Settings (admin/appearance > Click on "Settings" for this theme) there you will be able to change:

1. Color scheme (using color module)
2. Hero Box Color customization
3. Fonts Customization
4. Header and Footer styles

## Page template

The page.tpl.php template for this theme is fully customized to match the block and beans structure for our Installation Profile.

## Node Templates

The U.S. Web Design Standards library defines two type of contents:

- Documentation
- Landing Pages

This theme ships with node templates integrating the defined markup for each of these. You can find them under '_themename_/templates/page/' node--documentation.tpl.php and node--landing.tpl.php so if you choose to install the standalone version of this theme, you should create these Content Types in Drupal with the defined fields.
You can use the template as a guide.
