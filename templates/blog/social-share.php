<?php global $theme_options; ?>
<?php if(!empty($theme_options['blog-social']) && $theme_options['blog-social'] == true){ ?>
<div class="post-share">
<?php  echo do_shortcode('[md_social_share facebook="yes" twitter="yes" googleplus="yes" pinterest="yes"]'); ?>
</div>
<?php } ?>