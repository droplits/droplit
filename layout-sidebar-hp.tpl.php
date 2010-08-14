<?php include('header.inc'); ?>

  <div id='content'>
    <div class="content-wrapper">
    <?php if (!empty($content) && (!$is_front)): ?>
    <div class='content-wrapper clear-block'><?php print $content ?></div>
    <?php endif; ?>
    <?php print $content_region ?>

    <div id='columns'><div class='columns-wrapper clear-block'>
    <?php if (!empty($columna)): ?>
      <div class='column-a'>
      <?php print $columna ?>
      </div>
    <?php endif; ?>
    <?php print $columna_region ?>

    <?php if (!empty($columnb)): ?>
      <div class='column-b'>
      <?php print $columnb ?>
      </div>
    <?php endif; ?>
    <?php print $columnb_region ?>
    </div></div>
    </div>
  </div>
  <div id='right' class='clear-block'>
    <?php print $right ?>
  </div>

<?php include('footer.inc'); ?>
