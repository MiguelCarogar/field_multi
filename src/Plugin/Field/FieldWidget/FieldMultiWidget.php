<?php

/**
 * @file
 * Contains \Drupal\field_example\Plugin\field\widget\TextWidget.
 */

namespace Drupal\field_multi\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\image\Plugin\Field\FieldWidget\ImageWidget;
use Drupal\image\Plugin\Field\FieldWidget\FileWidget;
use Drupal\Component\Utility\NestedArray;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldFilteredMarkup;




/**
 * Plugin implementation of the 'field_multi' widget.
 *
 * @FieldWidget(
 *   id = "field_multi",
 *   module = "field_multi",
 *   label = @Translation("This is a multi field Widget"),
 *   field_types = {
 *     "field_example_rgb"
 *   }
 * )
 */
class FieldMultiWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $value = isset($items[$delta]->value) ? $items[$delta]->value : '';
    $element['title']= array(
      '#type' => 'textfield',
      '#default_value' => $value,
      '#required' => FALSE,
    );
    $element['body']= array(
      '#type' => 'textfield',
      '#default_value' => $value,
      '#required' => FALSE,
    );
    $element['image'] = array(
      '#type' => 'file',
      '#title' => t('Image'),
      '#upload_location' => 'public://test',
      '#empty_value' => '',
    );
    return $element;
  }

  /**
   * Validate the color text field.
   */
  public function validate($element, FormStateInterface $form_state) {
    return true;
  }

}
