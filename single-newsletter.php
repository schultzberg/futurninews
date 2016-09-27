<?php

/**
 * The template for displaying all FUTURNINEWS
 *
 * @package WordPress
 */

$dir = plugins_url( __FILE__ );
$imgURL = plugins_url( 'img/', __FILE__ );

if( have_posts() ) : while ( have_posts() ) : the_post(); 

	// HTML, CSS + IKEA header:
	include 'template-blocks/header.php'; 
	
	//imports Hero image if exists.
	if( get_field( 'hero-image' )) :

		include 'template-blocks/hero.php'; 
 		
	endif;

	if( have_rows( 'intro-post' )) : 

		//loops content of intro section.
		while (have_rows( 'intro-post')) : the_row();

			include 'template-blocks/intro.php';

		endwhile;

	endif;

	//Loops the content of post if exists.
	if( have_rows( 'main-content' ) ) : while (have_rows( 'main-content')) : the_row();

		if( get_row_layout() == 'image' ):

			include 'template-blocks/content-image.php';

		elseif( get_row_layout() == 'content-text' ):

			include 'template-blocks/content-text.php';

		elseif(get_row_layout() == 'quote' ):

			include 'template-blocks/content-quote.php';

		elseif(get_row_layout() == 'download' ):

			include 'template-blocks/content-download.php';

		endif;

	endwhile; endif;

	if( get_field('signed') ):

		include 'template-blocks/signed.php';
	
	endif;

	include 'template-blocks/footer.php';

endwhile;  endif; //end have_posts loop.
?>
