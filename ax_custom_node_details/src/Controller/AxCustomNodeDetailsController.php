<?php

namespace Drupal\ax_custom_node_details\Controller;
// Importing the Namespaces for Controller
use Drupal\Core\Controller\ControllerBase;


/**
 * Provides route responses for the ax_custom_node_details module.
 */
class AxCustomNodeDetailsController extends ControllerBase {
   /**
   * Function to fetch the details of Node
   * @param - Site API Key
   * @param - node Id
   */
   public function nodeDetailAPI($site_api,$nid){
     $response = ['message' => 'Hello, this is a rest service from Controller','site_api' => $site_api, 'nid' => $nid];
     echo "hasd";
     print_r($response);die();
     return $response;
  }
}

?>
