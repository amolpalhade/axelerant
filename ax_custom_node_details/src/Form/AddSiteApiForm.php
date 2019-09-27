<?php

namespace Drupal\ax_custom_node_details\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\system\Form\SiteInformationForm;


class AddSiteApiForm extends SiteInformationForm {

   /**
   * {@inheritdoc}
   */
    // Building or extending the site information form
	  public function buildForm(array $form, FormStateInterface $form_state) {
    // fetching the config details of the site information form
		$site_config = $this->config('system.site');
		$form =  parent::buildForm($form, $form_state);
    // Adding the text field for SiteAPI key in the form
		$form['site_information']['siteapikey'] = [
			'#type' => 'textfield',
			'#title' => t('Site API Key'),
			'#default_value' => $site_config->get('siteapikey') ?: 'No API Key yet',
			'#description' => t("Enter the API Key"),
		];
    // Updating the Value of Save Configuration Button or Submit Button
    $form['actions']['submit']['#value'] = t('Update Configuration');
    //kint($form);
		return $form;
	}

  // Submit Function to save the Value of Site API key starts
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // fetching the config details of the site information form
  	$this->config('system.site')
  	  ->set('siteapikey', $form_state->getValue('siteapikey'))
  	  ->save();
  	parent::submitForm($form, $form_state);
    // Printing Message for User
    dsm("Site API is set with Value : ".$form_state->getValue('siteapikey'));
  }
  // Submit Function to save the Value of Site API key ends
}
