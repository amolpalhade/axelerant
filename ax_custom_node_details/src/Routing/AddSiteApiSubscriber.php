<?php
namespace Drupal\ax_custom_node_details\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class AddSiteApiSubscriber extends RouteSubscriberBase {

  protected function alterRoutes(RouteCollection $collection) {
    //kint($collection);//die();
    // Get the collection of the site information form
    if ($route = $collection->get('system.site_information_settings')){
      //kint($route->getPath());die();
      // Fetch the path for site information
      // if path is /admin/config/system/site-information than change the default form
      if($route->getPath() == "/admin/config/system/site-information"){
        $route->setDefault('_form', 'Drupal\ax_custom_node_details\Form\AddSiteApiForm');
      }
    }
  }
}
