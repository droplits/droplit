<?php
// $Id: views-view-fields.tpl.php,v 1.6 2008/09/24 22:48:21 merlinofchaos Exp $
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->separator: an optional separator that may appear before a field.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
// dsm($fields);
?>

<div class="highlight-image-caption">
<?php if ($fields['field_ss_image_fid']->content): ?>
  <?php print $fields['field_ss_image_fid']->content; ?>
<?php endif ?>
  <div class="field-field-slideshow-teaser clear-block">
      <div class="slideshow-teaser">
        <div class="slideshow-teaser-inner">

        <?php if ($fields['field_slideshow_teaser_value']->content): ?>
          <?php print $fields['field_slideshow_teaser_value']->content; ?>
        <?php endif ?>

        <?php if ($fields['edit_node']->content): ?>
          <?php print $fields['edit_node']->content; ?>
        <?php endif ?>
        </div>
      </div>
  </div>
</div>