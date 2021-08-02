<div class="expolist">
<?php 
	$args = array(
		'post_type' => 'expos',
		'numberposts' => -1
	);

	$expos = get_posts($args);

	foreach($expos as $expo) {
		$img = get_post_thumbnail_id($expo->ID);
		$imgsrcmed = wp_get_attachment_image_src($img, 'medium');
		$imgsrclarge = wp_get_attachment_image_src($img, 'large');

		?>

		<div class="foto newlist">
			<a href="<?php echo get_permalink($expo->ID);?>" rel="lightbox[<?php echo $expo->post_name;?>]" title="<?php echo $expo->post_title;?>">
			
				<div class="imgwrap">
					<img src="<?php echo $imgsrcmed[0];?>" alt="<?php echo $expo->post_title;?>"/>
				</div>
				
				
				
				<h1 class="exptit"><?php echo $expo->post_title;?></h1>
			
			</a>
			
			<a class="linkprensa" href="<?php echo get_permalink($expo->ID);?>">-Comunicado de Prensa</a>
		</div>

		<?php
		$args = array(
			'post_type' 		=> 'attachment',
			'post_parent'		=> $expo->ID,
			'post_mime_type'	=> array('image/jpeg', 'image/png', 'image/gif'),
			'post__not_in' 		=> array($img)
		);

		$imgsextra = get_posts($args);

		if($imgsextra) { ?>

			<div class="escondido">
			<?php

			foreach($imgsextra as $imgextra) {
				$extraimglarge = wp_get_attachment_image_src($imgextra->ID, 'large');
				?>

				<a href="<?php echo $extraimglarge[0];?>" rel="lightbox[<?php echo $expo->post_name;?>]" title="<?php echo $expo->post_title;?>"></a>

				<?php

			}

			?>

			</div> 

			<?php 
		}
	}
?>
</div>