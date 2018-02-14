<div id="page" class="<?php print $classes; ?>"<?php print $attributes; ?>>
    <section class="section intro" id="intro">
		<div class="container text-center">
			<div class="content col-md-6">
				<?php if ($logo): ?>
                	<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                    	<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
                	</a>
                <?php endif; ?>
				<h2><?php print theme_get_setting('hero_text'); ?></h2>
			</div>
			<div class="scrollbtnwrap">
				<a href="#section1" class="btn btn-scroll"></a>
			</div>
		</div>
	</section>
	
	<?php for($i=1;$i<=3;$i++){ 
		$fid = theme_get_setting('illustration_'.$i.'_image');
        $image_url = file_create_url(file_load($fid)->uri);
	?>
	<section class="section illustration" id="section<?php echo $i; ?>">
		<div class="container text-center">
			<div class="content">
				<img src="<?php print $image_url; ?>" alt="<?php print theme_get_setting('illustration_'.$i.'_text'); ?>" />
				<h3><?php print theme_get_setting('illustration_'.$i.'_text'); ?></h3>
			</div>
			<div class="scrollbtnwrap">
				<a href="#section<?php echo $i+1; ?>" class="btn btn-scroll"></a>
			</div>
		</div>
	</section>
	<?php } ?>
	
	<section class="section services" id="section4">
		<div class="container text-center">
			<div class="content">
				<h2>Services</h2>
				<?php 
				for($i=1;$i<=4;$i++){
					$fid = theme_get_setting('services_'.$i.'_image');
					$image_url = file_create_url(file_load($fid)->uri);
				?>
				<div class="col-md-3">				
					<div class="service-icon">
						<div class="iconwrap">
							<img src="<?php print $image_url; ?>" alt="<?php print theme_get_setting('services_'.$i.'_text'); ?>" />						
						</div>
					</div>
					<h3><?php print theme_get_setting('services_'.$i.'_text'); ?></h3>
				</div>
				<?php } ?>
			</div>
			<div class="scrollbtnwrap">
				<a href="#section5" class="btn btn-scroll"></a>
			</div>
		</div>
	</section>
	
	<section class="section clients" id="section5">
		<div class="container text-center">
			<div class="content">
				<h2><?php print theme_get_setting('clients_section_title'); ?></h2>
				<div class="owl-carousel" id="clients">
					<?php print render($page['clients']); ?>					
				</div>
			</div>
			<div class="scrollbtnwrap">
				<a href="#section6" class="btn btn-scroll"></a>
			</div>
		</div>
	</section>
	
	<section class="section mapsection" id="section6">
		<div class="text-center">
			<h2><?php print theme_get_setting('map_section_title'); ?></h2>
			<div class="map-container">
				<div id="map"></div>
			</div>
			<div class="scrollbtnwrap">
				<a href="#section7" class="btn btn-scroll"></a>
			</div>
		</div>		
	</section>
	
	<section class="section contact" id="section7">
		<div class="container text-center">
			<div class="content">
				<h2><?php print theme_get_setting('contact_section_title'); ?></h2>
				<div class="col-md-4 col-md-offset-4 contactform">	
				<?php print render($page['contact']); ?>	
				</div>
				<div class="clearfix"></div>
				<p><?php print theme_get_setting('contact_section_text'); ?></p>
			</div>
		</div>
	</section>
</div> <!-- /page -->

<script>

// Google Maps initialization function
function initMap() {
	var myCenter=new google.maps.LatLng(<?php print theme_get_setting('map_section_latitude'); ?>, <?php print theme_get_setting('map_section_longitude'); ?>);
	var mapDiv = document.getElementById('map');
	var map = new google.maps.Map(mapDiv, {
		center: myCenter,
		zoom: 16
	});
	map.set("styles",[
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#bdbdbd"
      }
    ]
  },
  {
    "featureType": "administrative.province",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "landscape",
    "stylers": [
      {
        "saturation": -100
      },
      {
        "lightness": 65
      },
      {
        "visibility": "on"
      }
    ]
  },
  {
    "featureType": "poi",
    "stylers": [
      {
        "saturation": -100
      },
      {
        "lightness": 51
      },
      {
        "visibility": "simplified"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#ffffff"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "stylers": [
      {
        "saturation": -100
      },
      {
        "lightness": 30
      },
      {
        "visibility": "on"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "stylers": [
      {
        "saturation": -100
      },
      {
        "visibility": "simplified"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dadada"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "road.local",
    "stylers": [
      {
        "saturation": -100
      },
      {
        "lightness": 40
      },
      {
        "visibility": "on"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "transit",
    "stylers": [
      {
        "saturation": -100
      },
      {
        "visibility": "simplified"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#c9c9c9"
      },
      {
        "hue": "#ffff00"
      },
      {
        "saturation": -97
      },
      {
        "lightness": -25
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels",
    "stylers": [
      {
        "saturation": -100
      },
      {
        "lightness": -25
      },
      {
        "visibility": "on"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  }
]);

	var marker=new google.maps.Marker({
		position:myCenter,
		icon:'<?php $fid = theme_get_setting('map_section_marker'); $image_url = file_create_url(file_load($fid)->uri); print $image_url; ?>'
	});
	marker.setMap(map);
	var infowindow = new google.maps.InfoWindow({
		content:"<?php print theme_get_setting('map_section_address'); ?>",
		anchorPoint : myCenter
	});
	infowindow.open(map,marker);
}
</script>
