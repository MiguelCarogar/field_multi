<?php

/**
 * @file
 * Contains Drupal\field_example\Plugin\Field\FieldType\RgbItem.
 */

namespace Drupal\field_multi\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\image\Plugin\Field\FieldType\ImageItem;
use Drupal\file\Plugin\Field\FieldType\FileItem;

/**
 * Plugin implementation of the 'field_multi' field type.
 *
 * @FieldType(
 *   id = "field_multi",
 *   label = @Translation("Field Multi Field"),
 *   module = "field_multi",
 *   description = @Translation("A field with multiple fields."),
 *   default_widget = "field_multi",
 *   default_formatter = "field_multi"
 * )
 */
class FieldMulti extends FieldItemBase {
  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return array(
      'columns' => array(
        'image' => array(
          'description' => 'The URI of the image.',
          'type' => 'varchar',
          'length' => 255,
        ),
        'title' => array(
          'description' => 'The title text.',
          'type' => 'varchar',
          'length' => 255,
        ),
        'body' => array(
          'description' => 'Long text.',
          'type' => 'blob',
          'size' => 'big',
          'serialize' => TRUE,
        ),
      ),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('title')->getValue();
    return $value === NULL || $value === '';
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['image'] = DataDefinition::create('string')
      ->setLabel(t('image'));
    $properties['title'] = DataDefinition::create('string')
    ->setLabel(t('title'));
    $properties['body'] = DataDefinition::create('string')
    ->setLabel(t('body'));

    return $properties;
  }

}
