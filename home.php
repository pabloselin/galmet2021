<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package galmet2021
 */

get_header();
?>

	<main id="primary" class="site-main">

		<div class="home-main-expo">
			 <?php 
			  //la última exposición
			  $args= array(
			      'post_type'=> 'expos',
			      'numberposts'=> 1,
			      'post_status'=> 'publish'
			        );
			  $expos = get_posts($args);
			  if(has_post_thumbnail($expo->ID)):
	      		$pthumb = get_post_thumbnail_id($expo->ID);
	      		$psrc = wp_get_attachment_image_src($pthumb, 'invitacion');
	    	  endif;
			  ?>

			   <figure class="invitacion-exposicion">
	            <a href="<?php echo get_permalink($expos[0]->ID);?>">
	              <img style="max-width:100%;height:auto;" src="<?php echo $psrc[0];?>" alt="<?php echo $expos[0]->post_title;?>">
	            </a>
	          </figure>
	          <a class="linkprensa" href="<?php echo get_permalink($expos[0]->ID);?>">Comunicado de prensa</a>
          </div>

          <div class="anuncios">
          	<?php dynamic_sidebar( 'anuncios' );?>
          </div>

          <div class="libros-galmet">
          	<?php 
          		$args = array(
          			'post_type' 	=> 'page',
          			'post_parent' 	=> 275,
          			'numberposts'	=> -1,
          			'orderby'		=> 'menu_order',
          			'order'			=> 'ASC'
          		);
          		$libros = get_posts($args);

          		foreach($libros as $libro) {
          			$link = get_post_meta( $libro->ID, 'link_libro', true);
          			?>

          				<div class="libro-item">
          					<?php if($link):?>
          						<a href="<?php echo $link;?>">
          						<?php echo get_the_post_thumbnail( $libro->ID, 'full' );?>			
          						</a>
          					<?php else:?>
          						<?php echo get_the_post_thumbnail( $libro->ID, 'full' );?>			
          					<?php endif;?>
          				</div>

          			<?php
          		}
          	?>
          </div>

          <div class="auspicios">
          	<?php dynamic_sidebar('auspicios');?>
          </div>

	</main><!-- #main -->

<?php
get_footer();
