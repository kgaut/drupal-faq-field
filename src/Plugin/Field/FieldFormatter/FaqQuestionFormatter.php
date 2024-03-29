<?php

namespace Drupal\faq_field\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FormatterInterface;
use Drupal\Core\Field\PluginSettingsBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'faq_question_type' formatter.
 *
 * @FieldFormatter(
 *   id = "faq_question",
 *   label = @Translation("Faq question"),
 *   field_types = {
 *     "faq_question"
 *   }
 * )
 */
class FaqQuestionFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $bundle = NULL;
    $entityType = NULL;
    if($items->getParent() && $items->getParent()->getEntity()) {
      $entityType = $items->getParent()->getEntity()->getEntityType()->id();
      $bundle = $items->getParent()->getEntity()->bundle();
    }
    $items = $items->getValue();

    foreach ($items as &$item) {
      $item['answer'] = [
        '#type' => 'processed_text',
        '#text' => $item['answer'],
        '#format' => $item['answer_format'],
      ];
    }

    return [
      '#theme' => 'faq_questions',
      '#items' => $items,
      '#field_name' => $this->fieldDefinition->get('field_name'),
      '#wrapper_bundle' => $bundle,
      '#wrapper_type' => $entityType,
    ];
  }

}
