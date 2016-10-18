<?php 
/* Block containeng Hero image */ 
$heroImg = get_field( 'hero-image' );
?>

<table border="0" cellspacing="0" width="100%" class="block-hero">
	<tr>
		<td>	
			<img class="hero" width="100%" src="<?= $heroImg['url'] ?>" alt="<?php if($heroImg['alt']): echo $heroImg['alt']; else: echo 'Newsletter Hero Image.'; endif; ?>" />
		</td>
	</tr>
</table>