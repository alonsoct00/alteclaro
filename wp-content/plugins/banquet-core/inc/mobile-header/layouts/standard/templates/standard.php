<?php
// Include mobile logo
banquet_core_get_mobile_header_logo_image();

// Include mobile haeder widget area
dynamic_sidebar( 'qodef-mobile-header-widget-area' );

// Include mobile navigation opener
banquet_core_template_part( 'mobile-header', 'templates/parts/mobile-navigation-opener' );

// Include mobile navigation
banquet_core_template_part( 'mobile-header', 'templates/parts/mobile-navigation' );