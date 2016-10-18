<?php 
//replaces all <p> in content with <br>
$content = get_field('signed');
$newcontent = preg_replace("/<p[^>]*?>/", "", $content);
$newcontent = str_replace("</p>", "<br>", $newcontent);
?>

<table border="0" cellspacing="0" width="100%" class="block-sign">
	<tr>
		<td width="17"></td>
		<td>
			<p class="mw-720"><?php echo $newcontent ?></p>
		</td>
		<td width="17"></td>
	</tr>
</table>