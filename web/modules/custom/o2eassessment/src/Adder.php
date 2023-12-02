<?php

declare(strict_types = 1);

namespace Drupal\o2eassessment;

/**
 * Service for summing numbers.
 */
class Adder implements AdderInterface {

  /**
   * {@inheritdoc}
   */
  public function sumTwoNumbers(float $number1, float $number2): float {
    return $number1 + $number2;
  }

}
