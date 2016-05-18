<?php

/**
 * @file
 * Contains Drupal\field_example\Plugin\Field\FieldFormatter\SimpleTextFormatter.
 */

namespace Drupal\field_multi\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'field_multi' formatter.
 *
 * @FieldFormatter(
 *   id = "field_multi",
 *   module = "field_multi",
 *   label = @Translation("This is a field multi formatter"),
 *   field_types = {
 *     "field_multi"
 *   }
 * )
 */
class FieldMultiFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = array();

    foreach ($items as $delta => $item) {
      $elements[$delta] = array(
        // We create a render array to produce the desired markup,
        // "<p style="color: #hexcolor">The color code ... #hexcolor</p>".
        // See theme_html_tag().
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#attributes' => array(
          'style' => 'color: ' . $item->value,
        ),
        '#value' => $this->t('The color code in this field is @code', array('@code' => $item->value)),
      );
    }

    return $elements;
  }

}
