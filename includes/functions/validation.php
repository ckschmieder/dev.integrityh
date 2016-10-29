<?php
/**
 * Integrity House
 * Piklist Field Validation Functions
 */

function ih_validate_date_format() {
  $validation_rules = array(
    'date_format' => array(
      'rule' => '/^\d{4}\-\d{1,2}\-\d{1,2}$/',
      'message' => 'is not formatted correctly (YYYY-MM-DD)',
    ),
  );

  return $validation_rules;
}
add_filter('piklist_validation_rules', 'ih_validate_date_format');

?>
