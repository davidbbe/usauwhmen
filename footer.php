

<?php
	global $theme_options;
?>

<?php if($theme_options['footer-enabled']) : ?>
<footer>
	<div class="container">
		<div class="row">

			<?php

			$footerCols = (!empty($theme_options['footer_cols'])) ? $theme_options['footer_cols'] : 4;

			if($footerCols == '2'){
				$footerColClass = '6';
			} else if($footerCols == '3'){
				$footerColClass = '4';
			} else {
				$footerColClass = '3';
			}

			?>

			<div class="col-md-<?php echo $footerColClass; ?> column">
				<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('footer-area-1')) : else : ?>
					<div class="widget">
						<h3 class="widget-title">Footer Area 1</h3>
						<p class="fallback"><a href="<?php echo admin_url('widgets.php'); ?>">Click here to assign a widget to this area.</a></p>
					</div>
				<?php endif; ?>
			</div>

			<div class="col-md-<?php echo $footerColClass; ?> column">
				<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('footer-area-2')) : else : ?>
					<div class="widget">
						<h3 class="widget-title">Footer Area 2</h3>
						<p class="fallback"><a href="<?php echo admin_url('widgets.php'); ?>">Click here to assign a widget to this area.</a></p>
					</div>
				<?php endif; ?>
			</div>

			<?php if ($footerCols == 3 || $footerCols == 4) { ?>

			<div class="col-md-<?php echo $footerColClass; ?> column">
				<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('footer-area-3')) : else : ?>
					<div class="widget">
						<h3 class="widget-title">Footer Area 3</h3>
						<p class="fallback"><a href="<?php echo admin_url('widgets.php'); ?>">Click here to assign a widget to this area.</a></p>
					</div>
				<?php endif; ?>
			</div>

			<?php } ?>

			<?php if ($footerCols == 4) { ?>

			<div class="col-md-<?php echo $footerColClass; ?> column">
				<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('footer-area-4')) : else : ?>
					<div class="widget">
						<h3 class="widget-title">Footer Area 4</h3>
						<p class="fallback"><a href="<?php echo admin_url('widgets.php'); ?>">Click here to assign a widget to this area.</a></p>
					</div>
				<?php endif; ?>
			</div>

			<?php } ?>
		</div>
	</div>	
</footer>
<?php endif; ?>


<?php if($theme_options['copyright-enabled']) : ?>
<div id="copyright">
	<div class="container">
		<div id="copyright-text"><?php echo $theme_options['copyright-text']; ?></div>
		<div class="float-right">
		<?php
			get_template_part('/templates/footer/social-links');
		?>
		</div>
	</div>
</div>
<?php endif; ?>


<?php 
	if($theme_options['back-top'])
	echo '<a href="#" id="md-back-top"></a>';

	if(isset($theme_options['tracking-code']) && $theme_options['tracking-code'] != '')
	echo '<script type="text/javascript">'.$theme_options['tracking-code'].'</script>';

	if(isset($theme_options['custom-js']) && $theme_options['custom-js'] != '')
	echo '<script type="text/javascript">'.$theme_options['custom-js'].'</script>';
?>

</div><!-- CLOSE WRAP -->

<?php wp_footer(); ?>

</body>
</html>