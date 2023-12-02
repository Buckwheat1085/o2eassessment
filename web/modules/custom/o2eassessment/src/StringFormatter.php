<?php

declare(strict_types = 1);

namespace Drupal\o2eassessment;

use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\StringTranslation\TranslationInterface;

/**
 * Service for summing and formatting numbers.
 */
class StringFormatter implements StringFormatterInterface {

  use StringTranslationTrait;

  /**
   * The o2eassessment.adder service.
   */
  protected AdderInterface $adder;

  /**
   * Constructs a StringFormatter object.
   */
  public function __construct(
    AdderInterface $adder,
    TranslationInterface $string_translation,
  ) {
    $this->adder = $adder;
    $this->stringTranslation = $string_translation;
  }

  /**
   * {@inheritDoc}
   */
  public function sumAndFormatTwoNumbers(float $number1, float $number2): TranslatableMarkup {
    $sum = $this->adder->sumTwoNumbers($number1, $number2);
    $sum = round($sum);
    // Original requirements had "Product" in the string - I think this was a
    // typo as it otherwise seems to refer to adding numbers.
    return $this->t('The sum of @number1 and @number2 is @sum', [
      '@number1' => $number1,
      '@number2' => $number2,
      '@sum' => $sum,
    ]);
  }

}
