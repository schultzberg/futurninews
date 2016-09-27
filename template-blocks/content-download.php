<?php /* Download section */ ?>


<table border="0" cellspacing="0" width="100%" class="block-download">
  <tr>
    <td width="17"></td>
    <td>
      <div class="mw-720 download-btn">
        <a href="<?php the_sub_field( 'file' )?>" target="_blank" class="download"><?php the_sub_field('label'); ?></a>
      </div>
      <div class="mw-720 block-small">
        <p class="small"><?php the_sub_field('description'); ?></p>
      </div>
    </td>
    <td width="17"></td>
  </tr>
</table>