<?php include('header.inc'); ?>

  <div id='content'>
    <?php if (!empty($content)): ?>
    
  <?php if (!empty($title) && arg(0) != 'node'): ?>
    <div id='page-title' class='clear-block'>
      <h2 class='page-title <?php print $page_icon_class ?>'>
        <?php if (!empty($page_icon_class)): ?><span class='icon'></span><?php endif; ?>
        <?php if ($title) print $title ?>
      </h2>
    </div>
  <?php endif; ?>
  
    
      <div class='content-wrapper clear-block'><?php print $content ?></div>
    <?php endif; ?>
    <?php print $content_region ?>
  </div>
  <div id='right' class='clear-block'>
    <?php print $right ?>
  </div>
  
<?php include('footer.inc'); ?>