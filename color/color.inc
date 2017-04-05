<?php
/**
 * PART 1. Basic Color module settings
 */

$info = array();
// Define the possible replaceable items and their labels.
$info['fields'] = array(
 'usa-navbar-bg' => t('Navigation Bar Background'),
 'usa-logo-txt' => t('Logo text'),
 'usa-nav-primary-links' => t('Primary Links - Main Menu'),
 'usa-nav-secondary-links' => t('Secondary Links'),
 'usa-button-search' => t('Search Button Background'),
 'usa-nav-bg' => t('Navigation Background'),
 'usa-tagline-heading' => t('Tagline Heading'),
 'usa-tagline-body' => t('Tagline Body'),
 'usa-graphic-list-p' => t('Graphic List section Text'),
 'usa-graphic-list-bg' => t('Graphic List section Background'),
 'usa-graphic-list-headings' => t('Graphic List section Headings'),
 'usa-footer-primary-section' => t('Primary Footer Background'),
 'usa-footer-primary-link' => t('Primary Footer Links'),
 'usa-footer-secondary_section' => t('Secondary Footer Background'),

);

// Color schemes for the site.
$info['schemes'] = array(
  // Define the default scheme.
  'default' => array(
    // Scheme title.
    'title' => t('Our site default colors'),
    // Scheme colors (Keys are coming from $info['fields']).
    'colors' => array(
      'usa-navbar-bg' => '#fefefd',
      'usa-logo-txt' => '#212121',
      'usa-nav-primary-links' => '#5b616b',
      'usa-nav-secondary-links' => '#5b616b',
      'usa-button-search' => '#0071bc',
      'usa-nav-bg' => '#fefefe',
      'usa-tagline-heading' => '#000',
      'usa-tagline-body' => '#292929',
      'usa-graphic-list-p' => '#ffffff',
      'usa-graphic-list-bg' => '#112e51',
      'usa-graphic-list-headings' => '#02bfe7',
      'usa-footer-primary-section' => '#f1f1f1',
      'usa-footer-primary-link' => '#212120',
      'usa-footer-secondary_section' => '#d6d7d9',
    ),
  ),
 // Let's create a scheme called Mobomo.
  'mobomo' => array(
    // Scheme title.
    'title' => t('Mobomo Scheme'),
    // Scheme colors (Keys are coming from $info['fields']).
    'colors' => array(
      'usa-navbar-bg' => '#962D29',
      'usa-logo-txt' => '#ff7f00',
      'usa-nav-primary-links' => '#EF799A',
      'usa-nav-secondary-links' => '#777777',
      'usa-button-search' => '#0071bc',
      'usa-nav-bg' => '#02BFE7',
      'usa-tagline-heading' => '#000',
      'usa-tagline-body' => '#292929',
      'usa-graphic-list-p' => '#ff30f2',
      'usa-graphic-list-bg' => '#112e51',
      'usa-graphic-list-headings' => '#02bfe7',
      'usa-footer-primary-section' => '#f1f1f1',
      'usa-footer-primary-link' => '#212120',
      'usa-footer-secondary_section' => '#d6d7d9',
    ),
  ),
);

// Define the CSS file(s) that we want the Color module to use as a base. 
$info['css'] = array( 'css/colors.css');

/***** Advanced Color settings - Defaults. Will be used in the Part 2. *****/
 
/**
 * Default settings for the advanced stuff.
 * No need to edit these if you just want to play around with the colors.
 * Color wants these, otherwise it's not going to play.
 *
 * We dive deeper into these in the Part 2. Advanced Color settings
 */
 
// Files we want to copy along with the CSS files, let's define these later.
$info['copy'] = array();
 
// Files used in the scheme preview.
$info['preview_css'] = 'color/preview.css';
// $info['preview_html'] = 'color/preview.html';
 
// Gradients
$info['gradients'] = array();
 
// Color areas to fill (x, y, width, height).
$info['fill'] = array();
 
// Coordinates of all the theme slices (x, y, width, height)
// with their filename as used in the stylesheet.
$info['slices'] = array();
 
// Base file for image generation.
$info['base_image'] = 'color/base.png';
