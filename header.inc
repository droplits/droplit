<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <?php print $head ?>
    <?php print $styles ?>
    <?php print $scripts ?>
    <title><?php print $head_title ?></title>
  </head>
  <body <?php print drupal_attributes($attr) ?>>

  <?php if ($help): ?>
  <div id='page-help'><div class='limiter clear-block'>
    <?php if ($help_toggler) print $help_toggler ?>
    <?php if ($help) print $help ?>
  </div></div>
  <?php endif; ?>

  <div id='logo' class='clear-block limiter'>
    <h1 style="width:400px;float:left;"><a href="/">Konbit Sante</a></h1>
    <?php // print $header ?>

    <div style="float:right;text-align:right;width:260px;padding: 20px 20px 0pt;">
      <div class="signup-box">
        <input type="text" maxlength="255" name="email" id="email-form" value="Email (example only)" class="form-text required inline" style="display:inline;color:#666;font-size:11px;background-color:#FFF;width:80px;">
        <input type="text" maxlength="255" name="zip" id="email-form" value="Zip (example only)" class="form-text required inline" style="display:inline;color:#666;font-size:11px; background-color:#FFF;width:70px;">
        <input type="submit" name="op" id="edit-submit" value="Join" class="form-submit">        
      </div>
      <div id="take-action" class="clear-block">
        <div class="take-action-content clear-block">
        	<a class="large-button" href="#">Take Action</a>
        </div>
      </div>
      <div id="donate" class="clear-block">
        <div class="donate-content clear-block">
          <a href="/node/6" class="large-button">Donate Now</a>  
        </div>    
      </div>
    </div>
  </div>

  <?php // if (!empty($navigation)): ?>
  <div id='navigation' class='limiter clear-block'>
  <?php if (isset($primary_links)) : ?>
    <div id="superfish">
      <div class='superfish-content clear-block'>
    <?php print $primary_menu; ?>
      </div>
    </div>
  <?php endif; ?>
  </div>
  <?php // endif; ?>

<div id='page'>  
  <div class='page-content clear-block'>

  <?php if ($breadcrumb): ?>
  <div id='top'>
    <div id='branding'><div class='clear-block'>
      <div class='breadcrumb clear-block'><?php print $breadcrumb ?></div>
    </div></div>
  </div>
  <?php endif; ?>
  
  <?php if ($show_messages && $messages): ?>
    <div id='console' class='clear-block'><?php print $messages; ?></div>
  <?php endif; ?>
  
  <?php if ($tabs): ?>
    <div id="tabs" class="clear-block">
      <div class='primary-tabs clear-block'><?php print $tabs ?></div>
      <?php if ($tabs2): ?><div class="secondary-tabs clear-block"><?php print $tabs2 ?></div><?php endif; ?>
    </div>
  <?php endif; ?>