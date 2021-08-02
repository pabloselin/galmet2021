<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package galmet2021
 */

get_header();
?>

	<main id="primary" class="site-main">



			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php get_template_part('template-parts/content-archive-expos');?>			

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
