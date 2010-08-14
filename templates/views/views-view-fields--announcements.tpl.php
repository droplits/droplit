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

<div class="views-field-field-date-time-value">
  <?php print $fields['created']->content; ?>
</div>

<div style="margin-bottom:10px;">
<span class="views-field-title">
  <?php print $fields['title']->content; ?>
</span>
<?php if ($fields['edit_node']->content): ?>
  <?php print $fields['edit_node']->content; ?>
<?php endif ?>
</div>


<?php if ($fields['field_article_thumbnail_fid']->content): ?>
<div class="views-field-article-thumbnail">
  <?php print $fields['field_article_thumbnail_fid']->content; ?>
</div>
<?php endif ?>

<?php if ($fields['field_article_teaser_value']->content): ?>
<div class="views-field-article-teaser">
  <?php print $fields['field_article_teaser_value']->content; ?>
</div>
<?php endif ?>

<?php if ($fields['view_node']->content): ?>
<div class="read-more">
  <?php print $fields['view_node']->content; ?>
</div>
<?php endif ?>
