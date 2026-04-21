<?php

namespace Drupal\poni_common\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\Attribute\FieldFormatter;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Plugin implementation of the 'default' formatter.
 */
#[FieldFormatter(
  id: 'content_manager_formatter',
  label: new TranslatableMarkup('Default'),
  field_types: [
    'content_manager',
  ],
)]
class ContentManagerFormatter extends FormatterBase {

  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    foreach ($items as $delta => $item) {
      $url = $item->url;
      $url_text = $item->title;

      $element[$delta] = [
        '#type' => 'link',
        '#title' => $url_text,
        'url' => $url,
        'link_text' => $url_text,
      ];
    }

    return $element;
  }

}
