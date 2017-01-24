<?php
/*
Template Name: Page Sidebar Right
*/
?>
<?php get_header(); ?>
<?php get_template_part( '/templates/page/page-header' ); ?>

	<div class="page-content padding-small" id="page-container">
		<div class="container">
			<div class="row">
				<div class="md-column col-md-8 col-md-left col-sm-left content-full">
					<?php get_template_part( '/templates/page/content-page-body' ); ?>
				</div>
				<div class="md-column col-side col-md-4 col-md-right col-sm-right">
					<?php dynamic_sidebar('sidebar-page'); ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>