<?php
const LIBERTY_SERVICE_GEO = 'global_positioning';

$registerHash = [
	'package_name' => 'geo',
	'package_path' => dirname( __FILE__ ) . '/',
	'service'      => LIBERTY_SERVICE_GEO,
];
define( 'GEO_PKG_NAME', $pRegisterHash['package_name'] );
define( 'GEO_PKG_PATH', BIT_ROOT_PATH . basename( $pRegisterHash['package_path'] ) . '/' );
$gBitSystem->registerPackage( $registerHash );

if( $gBitSystem->isPackageActive( 'geo' ) ) {
	require_once( GEO_PKG_PATH.'LibertyGeo.php' );

	$gLibertySystem->registerService( 
		LIBERTY_SERVICE_GEO, 
		GEO_PKG_NAME,
		[
			'content_load_sql_function' => 'geo_content_load_sql',
			'content_list_sql_function' => 'geo_content_list_sql',
			'content_store_function'    => 'geo_content_store',
			'content_preview_function'  => 'geo_content_preview',
			'content_expunge_function'  => 'geo_content_expunge',
		],
		[
			'description' => 'Enables the addition of geo spacial data to any content.',
		]
	);
}

