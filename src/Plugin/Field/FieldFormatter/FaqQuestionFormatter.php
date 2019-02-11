<?php

namespace Drupal\faq_field\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
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
    $build = [
      '#theme' => 'faq_questions',
      '#items' => $items->getValue(),
    ];
    return $build;
  }

}
