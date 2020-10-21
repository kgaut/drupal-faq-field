<?php

namespace Drupal\faq_field\Plugin\Field\FieldType;

use Drupal\Component\Utility\Random;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'faq_question' field type.
 *
 * @FieldType(
 *   id = "faq_question",
 *   label = @Translation("Faq question"),
 *   description = @Translation("A FAQ question with it's answer"),
 *   default_widget = "faq_question",
 *   default_formatter = "faq_question"
 * )
 */
class FaqQuestion extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['question'] = DataDefinition::create('string')
      ->setLabel(new TranslatableMarkup('Question'));

    $properties['answer'] = DataDefinition::create('string')
      ->setLabel(t('Answer'));

    $properties['answer_format'] = DataDefinition::create('filter_format')
      ->setLabel(t('Text format'));

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    $schema = [
      'columns' => [
        'question' => [
          'type' => 'varchar',
          'length' => 255,
          'not null' => FALSE,
        ],
        'answer' => [
          'type' => 'text',
          'size' => 'big',
          'not null' => FALSE,
        ],
        'answer_format' => [
          'type' => 'varchar',
          'length' => 255,
          'not null' => FALSE,
        ],
      ],
    ];

    return $schema;
  }

  /**
   * {@inheritdoc}
   */
  public static function generateSampleValue(FieldDefinitionInterface $field_definition) {
    $values['question'] = t('How are you ?');
    $values['answer'] = t('I m fine');
    $values['answer_format'] = 'full html';
    return $values;
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $question = $this->get('question')->getValue();
    $answer = $this->get('answer')->getValue();
    return $question === NULL || $question === '' || $answer === NULL || $answer === '';
  }

}
