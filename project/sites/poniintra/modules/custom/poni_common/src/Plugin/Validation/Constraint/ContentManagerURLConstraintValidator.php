<?php

namespace Drupal\poni_common\Plugin\Validation\Constraint;

use Drupal\Component\Utility\UrlHelper;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the LinkExternalProtocols constraint.
 */
class ContentManagerURLConstraintValidator extends ConstraintValidator {

  /**
   * {@inheritdoc}
   *
   * phpcs:ignore Drupal.Commenting.FunctionComment.VoidReturn
   * @return void
   */
  public function validate($value, Constraint $constraint) {
    if (isset($value)) {
        $url = $value->url;

        // Disallow non content manager links.
      if ($url && !preg_match('/^contentmanager:\/\/.*/', $url)) {
        $this->context->addViolation($constraint->message, ['@url' => $url]);
      }
    }
  }

}
