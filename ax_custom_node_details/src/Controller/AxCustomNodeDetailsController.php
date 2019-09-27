<?php

namespace Drupal\ax_custom_node_details\Controller;
// Importing the Namespaces for Controller
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;


/**
 * Provides route responses for the ax_custom_node_details module.
 */
class AxCustomNodeDetailsController extends ControllerBase {
   /**
   * Function to fetch the details of Node
   * @param - Site API Key
   * @param - node Id
   */
   public function nodeDetailAPI($requested_site_api,$requested_nid){
     $data = array();
     $response = array();
     //$requested_site_api = "";$requested_nid = "";
     if($requested_site_api!= "" && $requested_nid!= ""){
       $site_config_site_api = \Drupal::config('system.site')->get('siteapikey');
       //echo "THe valus is :-".$site_config_site_api;
       if($requested_site_api != $site_config_site_api){
         $data = "Invalid Site API Key";
       }else{
         $node = Node::load($requested_nid);
         //print_r($node);
         if(!empty($node)){
           $node_type = $node->bundle();
           //$node_type = $node->type->entity->label();
           //echo "The node type is :- ".$node_type;
           if($node_type == "page"){
             $data = $node;
           }else{
             $data = "Access Denied";
           }
         }else{
           //echo "Node Not Found";
           $data  = "Node Not Found";
         }
       }
     }else{
       $data = "No Site API Key or Nid Found in URL";
     }
     $response['data'] = $data;
     //echo "=====";
     //print_r($response);
     //die();
     return $response;
  }
}

?>
