<?php
/* Intro block */ 
$location = get_sub_field('location');
$date = get_sub_field('date');
if( $location && $date):
	$meta = $location . ', ' . $date;
endif;
?>

<table border="0" cellspacing="0" width="100%" class="block-intro">
	<tr>
		<td width="17"></td>
			<td>
				<?php if($location || $date): ?>
					<p class="mw-720 meta"><?php if($meta): echo $meta; else: echo $location . $date; endif; ?>	</p>
				<?php endif; ?>
				<?php if(get_sub_field( 'h1')): ?>
					<h1 class="mw-720 h1"> <?php the_sub_field( 'h1' ) ?> </h1>
				<?php endif; ?>
				<?php if(get_sub_field( 'intro-content')): ?>
					<p class="mw-720 p-first"> <?php the_sub_field( 'intro-content', false, false ) ?></p>
				<?php endif; ?>
			</td>
		<td width="17"></td>
	</tr>
</table>