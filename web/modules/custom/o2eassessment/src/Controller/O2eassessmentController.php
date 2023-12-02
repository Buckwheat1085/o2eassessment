<?php

declare(strict_types = 1);

namespace Drupal\o2eassessment\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\o2eassessment\StringFormatterInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Returns responses for O2E Assessment routes.
 */
class O2eassessmentController extends ControllerBase {

  /**
   * The controller constructor.
   */
  public function __construct(
    public StringFormatterInterface $stringFormatter,
  ) {}

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container): self {
    return new self(
      $container->get('o2eassessment.string_formatter'),
    );
  }

  /**
   * Builds a plain response with a string describing the sum of two numbers.
   *
   * I interpreted this to be requesting the plain text string exactly as in
   * the doc. Other alternatives include serving a JSON response using
   * JsonResponse (more like an API endpoint) or a render array with a
   * markup component including the string (so it would be a fully
   * rendered/styled Drupal page).
   */
  public function sumAndFormatTwoNumbers(string $number1, string $number2): Response {
    if (!is_numeric($number1) || !is_numeric($number2)) {
      return new Response('Both arguments must be numeric', 400);
    }
    return new Response(
      (string) $this->stringFormatter->sumAndFormatTwoNumbers(
        (float) $number1,
        (float) $number2
      ),
      200
    );
  }

}
