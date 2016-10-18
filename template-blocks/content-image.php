<?php /* Image Block */

$imageArr = get_sub_field('image'); 

 ?>

<table border="0" cellspacing="0" width="100%" class="block-image">
  <tr>
    <td width="17"></td>
    <td>
      <div class="mw-720">
        <img class="image" width="100%" height="auto" src="<?= $imageArr[url] ?>" alt="<?php if($imageArr['alt']): echo $imageArr['alt']; else: echo 'Image.'; endif; ?>" />	
      </div>
    </td>
    <td width="17"></td>
  </tr>
</table>