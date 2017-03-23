<div class="usa-footer-logo usa-width-one-half">
  <img class="usa-footer-circle-124" src="<?php print (file_create_url($content['field_logo'][0]['#item']['uri']));?>" alt="<?php print ($content['field_logo'][0]['#item']['alt']);?>">
  <h3 class="usa-footer-logo-heading">Name of Agency</h3>
</div>

<div class="usa-footer-contact-links usa-width-one-half">
  <a class="usa-link-facebook" href="<?php print render($content['field_social_facebook']);?>">
    <span><?php print t('Facebook');?></span>
  </a>
  <a class="usa-link-twitter" href="<?php print render($content['field_social_twitter']);?>">
    <span><?php print t('Twitter');?></span>
  </a>
  <a class="usa-link-youtube" href="<?php print render($content['field_social_youtube']);?>">
    <span><?php print t('YouTube');?></span>
  </a>
  <a class="usa-link-rss" href="<?php print render($content['field_rss']);?>">
    <span><?php print t('RSS');?></span>
  </a>
  <address>
    <h3 class="usa-footer-contact-heading"><?php print render($content['field_contact_heading']);?></h3>
    <p><?php print render($content['field_telephone']);?></p>
    <?php print render($content['field_email']);?>
  </address>
</div>
