<?php if (!empty($content) || !empty($title)): ?>

<?php if (!empty($pre_object)) print $pre_object ?>

<div id="block-block-3" class="block block-block" style="margin-bottom:20px;border:none;">
  <?php if ($layout && !empty($submitted) || !empty($links)): ?>
    <div class='column-side'><div class='column-wrapper'>
  <?php endif; ?>

  <?php if (!empty($submitted)): ?>
    <div class='<?php print $hook ?>-submitted clear-block'><?php print $submitted ?></div>
  <?php endif; ?>
  <?php if (!empty($links)): ?>
    <div class='<?php print $hook ?>-links clear-block'><?php print $links ?></div>
  <?php endif; ?>

  <?php if ($layout && !empty($submitted) || !empty($links)): ?>
    </div></div>
  <?php endif; ?>

  <?php if ($layout): ?>
    <div class='column-main'><div class='column-wrapper'>
  <?php endif; ?>

  <?php if (!empty($content)): ?>
    <div class='<?php print $hook ?>-content-special clear-block <?php if (!empty($is_prose)) print 'prose' ?>'>
      <?php print $content ?>
    </div>
  <?php endif; ?>

  <?php if ($layout): ?>
    </div></div>
  <?php endif; ?>
</div>

<?php if (!empty($post_object)) print $post_object ?>

<?php endif; ?>
