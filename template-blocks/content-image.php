<?php /* Image Block */
?>

<table border="0" cellspacing="0" width="100%" class="block-image">
  <tr>
    <td width="17"></td>
    <td>
      <div class="mw-720">
        <img class="image" width="100%" height="auto" src="<?= the_sub_field('image-id') ?>" alt="<?php if(the_sub_field('caption')): the_sub_field('caption'); else: echo 'Image.'; endif; ?>" />
      </div>
    </td>
    <td width="17"></td>
  </tr>
</table>