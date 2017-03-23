<?php
/**
 * @file
 * Default theme implementation for entities.
 *
 * Available variables:
 * - $content: An array of comment items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $title: The (sanitized) entity label.
 * - $url: Direct url of the current entity if specified.
 * - $page: Flag for the full page state.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity-{ENTITY_TYPE}
 *   - {ENTITY_TYPE}-{BUNDLE}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */
?>
  <h2><span class="usa-hero-callout-alt"><?php print render($title);?></span> <?php print render($content['field_subtitle']);?></h2>
  <?php if (!empty($content['field_link'])) : ?>
    <a class="usa-hero-link" href="<?php print render($content['field_link'][0]['#element']['url']);?>"><?php print render($content['field_link'][0]['#element']['title']);?></a>
  <?php endif ; ?>
  <?php if (!empty($content['field_button'])) : ?>
    <a class="usa-button usa-button-big usa-button-secondary" href="<?php print render($content['field_button'][0]['#element']['url']);?>"><?php print render($content['field_button'][0]['#element']['title']);?></a>
  <?php endif ; ?>


