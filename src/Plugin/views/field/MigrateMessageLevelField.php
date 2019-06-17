<?php

namespace Drupal\migrate_views\Plugin\views\field;

use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;

/**
 * Defines a field handler to display a migrate message level.
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("migrate_message_level")
 */
class MigrateMessageLevelField extends FieldPluginBase {

  /**
   * {@inheritdoc}
   */
  public function render(ResultRow $values) {
    $value = $this->getValue($values);
    $options = _migrate_views_migrate_message_level_options();
    return $options[$value] ?: $this->t('Unknown');
  }

}
