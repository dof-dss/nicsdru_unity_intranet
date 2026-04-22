<?php

namespace Drupal\poni_common\Plugin\Validation\Constraint;

use Drupal\Component\Utility\UrlHelper;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the LinkExternalProtocols constraint.
 */
class ContentManagerTextConstraintValidator extends ConstraintValidator {

  /**
   * {@inheritdoc}
   *
   * phpcs:ignore Drupal.Commenting.FunctionComment.VoidReturn
   * @return void
   */
  public function validate($value, Constraint $constraint) {
    if (isset($value)) {
      $url = $value->url;
        $link_text = $value->title;

      // Ensure link text is filled out if a Content manager link is present.
      if ($url && empty($link_text)) {
        $this->context->addViolation($constraint->message, ['@title' => $link_text]);
      }
    }
  }

}
