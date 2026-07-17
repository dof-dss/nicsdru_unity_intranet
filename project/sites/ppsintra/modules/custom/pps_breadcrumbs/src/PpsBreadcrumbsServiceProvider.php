<?php


namespace Drupal\pps_breadcrumbs;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;

/**
 * Alters breadcrumb services for this site.
 */
class PpsBreadcrumbsServiceProvider extends ServiceProviderBase
{

  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container)
  {
    // Remove the unity_breadcrumbs publication breadcrumb builder.
    if ($container->hasDefinition('unity_breadcrumbs.breadcrumb.publication')) {
      $container->removeDefinition('unity_breadcrumbs.breadcrumb.publication');
    }
  }

}
