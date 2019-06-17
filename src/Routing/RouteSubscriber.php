<?php

namespace Drupal\migrate_views\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Modify migrate_tools routes permissions.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    $route_names = [
      'entity.migration_group.list',
      'entity.migration.list',
      'entity.migration.overview',
      'entity.migration.source',
      'entity.migration.process',
      'entity.migration.destination',
      'migrate_tools.messages',
    ];

    foreach ($route_names as $route_name) {
      $route = $collection->get($route_name);
      if ($route) {
        $permission = $route->getRequirement('_permission');
        $route->setRequirements([
          '_permission' => implode('+', [
            $permission,
            'view migrate reports',
          ]),
        ]);
      }
    }
  }

}
