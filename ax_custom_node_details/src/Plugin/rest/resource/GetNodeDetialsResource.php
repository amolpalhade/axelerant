<?php

namespace Drupal\ax_custom_node_details\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Drupal\ax_custom_node_details\Controller\AxCustomNodeDetailsController;

/**
 * Provides a Demo Resource
 *
 * @RestResource(
 *   id = "get_node_details",
 *   label = @Translation("Node Details"),
 *   uri_paths = {
 *     "canonical" = "/page_json/{site_api}/{nid}"
 *   }
 * )
 */

class GetNodeDetialsResource extends ResourceBase {
  /**
  * Responds to entity GET requests.
  * @return \Drupal\rest\ResourceResponse
  */
 public function get($site_api,$nid) {
   $jsonresponse = AxCustomNodeDetailsController::nodeDetailAPI($site_api,$nid);
   return new ResourceResponse($jsonresponse);
 }
}
