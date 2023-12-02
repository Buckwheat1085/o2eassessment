<?php

declare(strict_types = 1);

namespace Drupal\o2eassessment;

/**
 * Interface for the o2eassessment.adder service.
 */
interface AdderInterface {

  /**
   * Sum two numbers.
   *
   * @param float $number1
   *   The first number.
   * @param float $number2
   *   The second number.
   *
   * @return float
   *   The sum of $number1 and $number2.
   */
  public function sumTwoNumbers(float $number1, float $number2): float;

}
