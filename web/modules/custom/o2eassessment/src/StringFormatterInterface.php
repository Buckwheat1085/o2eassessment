<?php

declare(strict_types = 1);

namespace Drupal\o2eassessment;

use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Interface for the o2eassessment.string_formatter service.
 */
interface StringFormatterInterface {

  /**
   * Sum two numbers and return them as a translatable string.
   *
   * @param float $number1
   *   The first number.
   * @param float $number2
   *   The second number.
   *
   * @return string
   *   The sum of $number1 and $number2, formatted as a translated string.
   */
  public function sumAndFormatTwoNumbers(float $number1, float $number2): TranslatableMarkup;

}
