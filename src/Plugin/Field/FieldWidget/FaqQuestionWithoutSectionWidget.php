<?php

namespace Drupal\faq_field\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'faq_question_without_section' widget.
 *
 * @FieldWidget(
 *   id = "faq_question_without_section",
 *   label = @Translation("Faq question (without section)"),
 *   field_types = {
 *     "faq_question"
 *   }
 * )
 */
class FaqQuestionWithoutSectionWidget extends FaqQuestionWidget {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element = parent::formElement($items, $delta, $element, $form, $form_state);
    $element['section']['#access'] = FALSE;
    return $element;
  }

}
