<?php
	get_header(); ?>
	
	<div class="site-content clearfix">
		<h3>Custom HTML here!</h3>
			<?php if(have_posts()) :
				while(have_posts()) : the_post();

				the_content(); ?>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, error eaque neque laborum consectetur impedit quas aspernatur quo harum sequi accusantium voluptatum ex molestias. Minus fugit ut, hic quisquam accusamus accusantium, quidem consequuntur ipsam, repellendus eveniet omnis consequatur sed quae tempora ratione maiores! Consequatur reprehenderit aspernatur nihil, id quod nesciunt numquam excepturi modi tempore delectus quo. Repellat quis sint consectetur odit. Nisi illum ipsum pariatur dolorem, ea numquam laudantium molestias tenetur iure! Eveniet dolorem illum sint accusantium delectus labore hic, dolore dolor repellat quo ducimus voluptate ratione eius, omnis quaerat dolores? Repellat, voluptatibus, atque? Mollitia, amet eum repellat quibusdam. Unde nobis similique accusamus officiis sit quisquam quo dicta consectetur modi, consequatur dolores dolore vitae a voluptatum, magni officia? Vel vitae nam ipsa, quia enim nostrum! Inventore minus sunt vitae velit ipsum earum sapiente porro quibusdam eius autem, unde, obcaecati ipsa, perferendis fugiat dolore quidem labore ab, nulla eligendi sit sequi nam pariatur! Inventore optio, ullam saepe quo! Atque ab voluptatem, cupiditate dolor aliquid porro nisi eius adipisci repellat rerum rem placeat, quisquam voluptas possimus earum animi deserunt! Iusto error doloremque quos ad ratione sequi ipsa. Odio blanditiis rerum cumque dignissimos ipsum ipsam dolorem aut, consequatur ullam vitae alias magni asperiores suscipit autem eaque quasi voluptatem nobis, voluptas reprehenderit in a ut? Repellat harum itaque corporis iste odit officiis hic provident ratione eum voluptas quam, blanditiis dolore adipisci, excepturi, dicta consectetur nostrum. Provident quam molestiae velit sequi, nihil autem corrupti blanditiis error et aut quas delectus hic accusantium quaerat reiciendis soluta alias veritatis non debitis harum, voluptas, sint suscipit saepe incidunt. Voluptate ullam perspiciatis quaerat, aliquid ab eius optio fuga tempora deleniti delectus ex magnam consequatur aperiam! Quas soluta, sapiente, officiis nemo aperiam nobis? Itaque ratione expedita, eligendi aliquam placeat eos corporis cupiditate asperiores fugit odit! Aliquam sapiente blanditiis molestias, fuga similique nemo eius, nostrum expedita tempora suscipit eveniet quos provident repudiandae ex esse vitae dolores, obcaecati harum dolorem. Vitae, similique voluptas. Magnam eaque officia optio blanditiis inventore iure repellendus, adipisci, delectus, minus similique vero fugit a. Nemo soluta facilis quod iusto, cumque quam, repellat praesentium minima porro alias velit explicabo. Doloremque aliquid temporibus quae tempore rerum iure molestias quis culpa? Nesciunt dolor quidem atque reprehenderit asperiores aperiam deleniti minima assumenda? Enim ipsum quia accusamus architecto, voluptatem, doloribus debitis dolorem totam magni consequuntur optio, eveniet deserunt pariatur sed. Praesentium aperiam totam inventore omnis, fugiat corporis obcaecati. Neque consequatur ex repudiandae sequi natus facilis pariatur delectus, impedit quaerat, labore aspernatur libero itaque alias, saepe, corporis animi. Quod veritatis, aliquam sint cupiditate, temporibus sit quo, repudiandae voluptates, inventore quis voluptatem incidunt tempore. Tenetur a ratione facilis delectus dolores, aspernatur possimus inventore unde blanditiis fuga pariatur illum quo dolorem modi eaque necessitatibus, vel nam rerum? Soluta veritatis eveniet quos perspiciatis voluptate laborum, quaerat magnam eaque iste. Quasi officiis vel nemo, ea quibusdam sed quis nihil repellat ratione rem, at voluptatem assumenda suscipit, aliquam voluptas! Quia, voluptatem nulla neque qui est numquam dolore nihil, incidunt debitis officiis iste minus quod beatae accusamus asperiores eveniet suscipit!</p>
				<?php 
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