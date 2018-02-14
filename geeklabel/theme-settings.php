<?php

// Form override of theme settings
function geeklabel_form_system_theme_settings_alter(&$form, $form_state) {
	
	$form['options_homepage_hero'] = array(
		'#type' => 'fieldset',
		'#title' => t('Home Page Hero Section'),
		'#collapsible' => true,
		'#collapsed' => true
	);
			
	$form['options_homepage_hero']['hero_text'] = array(
		'#type' => 'textarea',
		'#title' => t('Hero Text'),
		'#default_value' => theme_get_setting('hero_text'),
	);
	
	$form['options_homepage_illustration'] = array(
		'#type' => 'fieldset',
		'#title' => t('Home Page Illustration Section'),
		'#collapsible' => true,
		'#collapsed' => true
	);
	
	for($i=1;$i<=3;$i++){
		$form['options_homepage_illustration']['options_homepage_illustration_section'.$i]= array(
			'#type' => 'fieldset',
			'#title' => t('Illustration Section '.$i),
			'#collapsible' => true,
			'#collapsed' => true
		);
		$form['options_homepage_illustration']['options_homepage_illustration_section'.$i]['illustration_'.$i.'_image'] = array(
			'#type' => 'managed_file',
			'#title' => t('Illustration Section Column '.$i.' Image'),
			'#default_value' => theme_get_setting('illustration_'.$i.'_image'),
			'#upload_location' => 'public://home_page/',
		);

		$form['options_homepage_illustration']['options_homepage_illustration_section'.$i]['illustration_'.$i.'_text'] = array(
			'#type' => 'textarea',
			'#title' => t('Illustration Section Column '.$i.' Text'),
			'#default_value' => theme_get_setting('illustration_'.$i.'_text'),
		);		
	}
	
	$form['options_homepage_services'] = array(
		'#type' => 'fieldset',
		'#title' => t('Home Page Services Section'),
		'#collapsible' => true,
		'#collapsed' => true
	);
	
	$form['options_homepage_services']['services_title'] = array(
		'#type' => 'textarea',
		'#title' => t('Services Section Title'),
		'#default_value' => theme_get_setting('services_title'),
	);
	
	for($i=1;$i<=4;$i++){
		$form['options_homepage_services']['options_homepage_services_section'.$i]= array(
			'#type' => 'fieldset',
			'#title' => t('Services Section '.$i),
			'#collapsible' => true,
			'#collapsed' => true
		);
		$form['options_homepage_services']['options_homepage_services_section'.$i]['services_'.$i.'_image'] = array(
			'#type' => 'managed_file',
			'#title' => t('Services Section Column '.$i.' Image'),
			'#default_value' => theme_get_setting('services_'.$i.'_image'),
			'#upload_location' => 'public://home_page/',
		);

		$form['options_homepage_services']['options_homepage_services_section'.$i]['services_'.$i.'_text'] = array(
			'#type' => 'textfield',
			'#title' => t('Services Section Column '.$i.' Text'),
			'#default_value' => theme_get_setting('services_'.$i.'_text'),
		);		
	}
		
	$form['options_homepage_clients'] = array(
		'#type' => 'fieldset',
		'#title' => t('Home Page Clients Section'),
		'#collapsible' => true,
		'#collapsed' => true
	);
	
	$form['options_homepage_clients']['clients_section_title'] = array(
		'#type' => 'textfield',
		'#title' => t('Clients Section Title'),
		'#default_value' => theme_get_setting('clients_section_title'),
	);
	
	$form['options_homepage_map'] = array(
		'#type' => 'fieldset',
		'#title' => t('Home Page Map Section'),
		'#collapsible' => true,
		'#collapsed' => true
	);
	
	$form['options_homepage_map']['map_section_title'] = array(
		'#type' => 'textfield',
		'#title' => t('Map Section Title'),
		'#default_value' => theme_get_setting('map_section_title'),
	);
	
	$form['options_homepage_map']['map_section_latitude'] = array(
		'#type' => 'textfield',
		'#title' => t('Map Latitude'),
		'#default_value' => theme_get_setting('map_section_latitude'),
	);
	
	$form['options_homepage_map']['map_section_longitude'] = array(
		'#type' => 'textfield',
		'#title' => t('Map Longitude'),
		'#default_value' => theme_get_setting('map_section_longitude'),
	);
	
	$form['options_homepage_map']['map_section_address'] = array(
		'#type' => 'textarea',
		'#title' => t('Map Address'),
		'#default_value' => theme_get_setting('map_section_address'),
	);
	
	$form['options_homepage_map']['map_section_marker'] = array(
		'#type' => 'managed_file',
		'#title' => t('Map marker'),
		'#default_value' => theme_get_setting('map_section_marker'),
		'#upload_location' => 'public://home_page/',
	);
	
	$form['options_homepage_contact'] = array(
		'#type' => 'fieldset',
		'#title' => t('Home Page Contact Section'),
		'#collapsible' => true,
		'#collapsed' => true
	);
	
	$form['options_homepage_contact']['contact_section_title'] = array(
		'#type' => 'textfield',
		'#title' => t('Contact Section Title'),
		'#default_value' => theme_get_setting('contact_section_title'),
	);
	
	$form['options_homepage_contact']['contact_section_text'] = array(
		'#type' => 'textfield',
		'#title' => t('Contact Section Text'),
		'#default_value' => theme_get_setting('contact_section_text'),
	);
	
	
}

$mf_keys = array();
$mf_keys[] = 'illustration_1_image';
$mf_keys[] = 'illustration_2_image';
$mf_keys[] = 'illustration_3_image';
$mf_keys[] = 'services_1_image';
$mf_keys[] = 'services_2_image';
$mf_keys[] = 'services_3_image';
$mf_keys[] = 'services_4_image';
$mf_keys[] = 'map_section_marker';
foreach($mf_keys as $mfkey){
	$image_fid = isset($form_state['values'][$mfkey])?$form_state['values'][$mfkey]:'';
	$image = file_load($image_fid);
	if (is_object($image)) {
	// Check to make sure that the file is set to be permanent.
		if ($image->status == 0) {
			// Update the status.
			$image->status = FILE_STATUS_PERMANENT;
			// Save the update.
			file_save($image);
			// Add a reference to prevent warnings.
			file_usage_add($image, 'opencharity', 'theme', 1);
		}
	}
}
