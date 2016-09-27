<?php /* content quote */ ?>


  <table border="0" cellspacing="0" width="100%" class="block-quote">
    <tr>
      <td width="16"></td>
      <td>
        <div class="mw-720">  
          <table>
            <tr>
              <td style="vertical-align:top;">
                <img src="<?= $imgURL . 'quote.png' ?>" class="image-quote" alt="Quotes">
              </td>
              <td>
                <span class="quote"><?php the_sub_field('the-quote') ?></span>
              </td>
            </tr>
            <tr>
              <td></td>
              <td><span class="quoted"><?php the_sub_field('who-said') ?></span></td>
            </tr>
          </table>
        </div>
      </td>
      <td width="16"></td>
    </tr>
  </table>