<header class="usa-banner-header">
  <div class="usa-grid usa-banner-inner">
  <?php print render($content['field_banner_icon']); ?>
  <button class="usa-accordion-button usa-banner-button"
    aria-expanded="false" aria-controls="gov-banner">
    <span class="usa-banner-button-text"><?php print $title;?></span>
  </button>
  </div>
</header>
<div class="usa-banner-content usa-grid usa-accordion-content" id="gov-banner">
  <?php print render($content['field_banner_items']);?>
</div>
