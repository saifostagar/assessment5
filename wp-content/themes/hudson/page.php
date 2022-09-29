<?php

if(is_page('home')) {
	get_header('home');
   }
   else {
	get_header();
   }
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) {

			while ( have_posts() ) {
				the_post();
				the_content();
			}

		} else {
?>
	<section class="mt-5 mb-5 ml-5 mr-5">
	<h1 class="text-center">No Content Found</h1>
	</section>

		<?php  } ?>

		</main>
	</div>

<?php
get_footer();
