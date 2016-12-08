<?php
	get_header(); ?>
	
	<div class="site-content clearfix">
		<h3>Custom HTML here!</h3>
			<?php if(have_posts()) :
				while(have_posts()) : the_post();

				the_content();
				
				endwhile;
				else :
					echo '<p>No content found</p>';
			endif; 
			//anather loop
			$newPostLoop = new WP_Query('cat=4');

			if($newPostLoop->have_posts()) :
				while($newPostLoop->have_posts()) : $newPostLoop->the_post(); ?>

				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><!-- show title -->
				<h2><?php the_content(); ?></h2><!-- show content -->
				
				<?php endwhile;
				else :
					echo '<p>No content found</p>';
			endif; 

			wp_reset_postdata();//reset loop

			?>
	</div>

	<?php get_footer();
?>