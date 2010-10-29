  </div>
</div>
  <?php if ($feed_icons || $footer_message): ?>
  <div id='footer' class='limiter clear-block'>
    <?php if ($feed_icons): ?>
      <div class='feed-icons clear-block'>
        <label><?php print t('Feeds') ?></label>
        <?php print $feed_icons ?>
      </div>
    <?php endif; ?>
    <?php if ($footer_message): ?><div class='footer-message'><?php print $footer_message ?></div><?php endif; ?>
  </div>
  <?php endif; ?>

  <div id='user-links' class='limiter clear-block'>
    <?php if ($user_links) print theme('links', $user_links) ?>
  </div>

  <?php print $scripts ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> </script>
  <!-- Script for SUPERFISH -->
  <script type="text/javascript">
    $(document).ready(function() {
    $("#superfish ul.menu").superfish(); });
  </script>
  <script type="text/javascript"> jQuery('a[href=#]').attr('href', 'javascript:void(0);'); </script>
  <?php print $closure; ?>

  </body>
</html>
