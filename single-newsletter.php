<?php

/**
 * The template for displaying all FUTURNINEWS
 *
 * @package WordPress
 */
$imgDir = plugins_url('futurninews' ) . '/img/'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" type="text/css" href="<?= plugins_url('futurninews') . '/style.css' ?>" />
	</head>

	<body>
		<div class="container">

		<?php if( have_posts() ) : while ( have_posts() ) : the_post(); 

			// HTML, CSS and the IKEA header:
			include 'template-blocks/content-header.php'; 
			
			//imports Hero image if exists.
			if( get_field( 'hero-image' ) ) :

				include 'template-blocks/content-hero.php'; 
		 		
			endif;

			if( have_rows( 'intro-post' ) ) : 

				//loops the content of intro section.
				while ( have_rows( 'intro-post' ) ) : the_row();

					include 'template-blocks/content-intro.php';

				endwhile;

			endif;

			//Loops the content of newsletter 
			if( have_rows( 'main-content' ) ) : while ( have_rows( 'main-content' ) ) : the_row();

				if( get_row_layout() == 'image' ):

					include 'template-blocks/content-image.php';

				elseif( get_row_layout() == 'content-text' ):

					include 'template-blocks/content-text.php';

				elseif( get_row_layout() == 'quote' ):

					include 'template-blocks/content-quote.php';

				elseif( get_row_layout() == 'download' ):

					include 'template-blocks/content-download.php';

				endif;

			endwhile; endif;

			if( get_field( 'signed' ) ):

				include 'template-blocks/content-signed.php';

			endif;

			include 'template-blocks/content-footer.php';

		endwhile;  endif; //end have_posts loop. ?>

		</div> <!-- .container -->
	</body>
</html>​