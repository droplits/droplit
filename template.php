<?php

/**
 * Strips CSS files from a Drupal CSS array whose filenames start with
 * prefixes provided in the $match argument.
 */
function droplit_css_stripped($match = array('modules/*', 'profiles/droplitinstallprofile/modules/contrib/print/*'), $exceptions = NULL) {
  // Set default exceptions
  if (!is_array($exceptions)) {
    $exceptions = array(
      'modules/color/color.css',
      'modules/locale/locale.css',
      'modules/system/system.css',
      'modules/update/update.css',
      'modules/openid/openid.css',
      'modules/acquia/*',
    );
  }
  $css = drupal_add_css();
  $match = implode("\n", $match);
  $exceptions = implode("\n", $exceptions);
  foreach (array_keys($css['all']['module']) as $filename) {
    if (drupal_match_path($filename, $match) && !drupal_match_path($filename, $exceptions)) {
      unset($css['all']['module'][$filename]);
    }
  }

  // This servers to move the "all" CSS key to the front of the stack.
  // Mainly useful because modules register their CSS as 'all', while
  // droplit has a more media handling.
  ksort($css);
  return $css;
}

/**
 * Preprocessor for theme('page').
 */
function droplit_preprocess_page(&$vars) {
  $attr = array();
  $attr['class'] = $vars['body_classes'];
  $attr['class'] .= ' droplit'; // Add the droplit class so that we can avoid using the 'body' selector






  // Prep the logo for being displayed
  $site_slogan = (!$vars['site_slogan']) ? '' : ' - '. $vars['site_slogan'];
  $logo_img ='';
  $title = $text = variable_get('site_name', '');
  if ($vars['logo']) {
    $logo_img = "<img src='". $vars['logo'] ."' alt='". $title ."' border='0' />";
    // $text = ($vars['site_name']) ? $logo_img . $text : $logo_img;
    $text = ($vars['site_name']) ? $logo_img : $logo_img;
  }
  $vars['logo_block'] = (!$vars['site_name'] && !$vars['logo']) ? '' : '<h1>'. l($text, '', array('attributes' => array('title' => $title . $site_slogan), 'html' => !empty($logo_img))) .'</h1>';
  // Even though the site_name is turned off, let's enable it again so it can be used later.
  $vars['site_name'] = variable_get('site_name', '');



  
  // Automatically adjust layout for page with right sidebar content if no
  // explicit layout has been set.
  // $layout = module_exists('context_layouts') ? context_layouts_get_active_layout() : NULL;
  // if (arg(0) != 'admin' && !empty($vars['right']) && !$layout) {
  //   $vars['template_files'][] = 'layout-sidebar';
  //   $css = array('screen' => array('theme' => array(drupal_get_path('theme', 'droplit') . '/layout-sidebar.css' => TRUE)));
  //   $vars['styles'] .= drupal_get_css($css);
  // }
  

  // Replace screen/all stylesheets with print
  // We want a minimal print representation here for full control.
  if (isset($_GET['print'])) {
    $css = droplit_css_stripped();
    unset($css['all']);
    unset($css['screen']);
    $css['all'] = $css['print'];
    $vars['styles'] = drupal_get_css($css);

    // Add print header
    $vars['print_header'] = theme('print_header');

    // Replace all body classes
    $attr['class'] = 'print';

    // Use print template
    $vars['template_file'] = 'print-page';

    // Suppress devel output
    $GLOBALS['devel_shutdown'] = FALSE;
  }
  // Get minimalized CSS. Add designkit styles back in if needed.
  else {
    $vars['styles'] = drupal_get_css(droplit_css_stripped());
    $vars['styles'] .= isset($vars['designkit']) ? $vars['designkit'] : '';
  }
  
  // Add body class for theme.
  $vars['attr']['class'] .= ' droplit';

  // Don't render the attributes yet so subthemes can alter them
  $vars['attr'] = $attr;
  
  $vars['primary_menu'] = menu_tree(variable_get('menu_primary_links_source', 'primary-links'));
  $vars['secondary_menu'] = theme('links', $vars['secondary_links'], array('class' => 'links secondary-links'));

  
}




/**
 * Override of theme('breadcrumb').
 */
function droplit_breadcrumb($breadcrumb, $prepend = TRUE) {
  $output = '';

  // Add current page onto the end.
  if (!drupal_is_front_page()) {
    $item = menu_get_item();
    $end = end($breadcrumb);
    if ($end && strip_tags($end) !== $item['title']) {
      $breadcrumb[] = "<strong>". check_plain($item['title']) ."</strong>";
    }
  }

  // Remove the home link.
  // foreach ($breadcrumb as $key => $link) {
  //   if (strip_tags($link) === t('Home')) {
  //     unset($breadcrumb[$key]);
  //     break;
  //   }
  // }

  // Optional: Add the site name to the front of the stack.
  // if ($prepend) {
  //   $site_name = empty($breadcrumb) ? "<strong>". check_plain(variable_get('site_name', '')) ."</strong>" : l(variable_get('site_name', ''), '<front>', array('purl' => array('disabled' => TRUE)));
  //   array_unshift($breadcrumb, $site_name);
  // }

  foreach ($breadcrumb as $link) {
    $output .= "<span class='breadcrumb-link'>{$link}</span>";
  }
  return $output;
}