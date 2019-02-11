<?php

namespace Drupal\faq_field\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'faq_question_widget' widget.
 *
 * @FieldWidget(
 *   id = "faq_question",
 *   label = @Translation("Faq question"),
 *   field_types = {
 *     "faq_question"
 *   }
 * )
 */
class FaqQuestionWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element['question'] = [
      '#type' => 'textfield',
      '#title' => t('Question'),
      '#default_value' => isset($items[$delta]->question) ? $items[$delta]->question : NULL,
      '#size' => 120,
      '#maxlength' => 255,
    ];

    $element['answer'] = [
      '#type' => 'text_format',
      '#format' => isset($items[$delta]->answer_format) ? $items[$delta]->answer_format : 'full_html',
      '#default_value' => isset($items[$delta]->answer) ? $items[$delta]->answer : '',
      '#title' => t('Answer'),
      '#rows' => 5,
      '#attached' => [
        'library' => ['text/drupal.text'],
      ],
    ];

    return $element;
  }

}
