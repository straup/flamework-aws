<?php

	include("include/init.php");
	loadlib("s3");

	$bucket = array(
		'id' => $GLOBALS['cfg']['aws']['s3_bucket'],
		'key' => $GLOBALS['cfg']['aws']['access_key'],
		'secret' => $GLOBALS['cfg']['aws']['access_secret'],
	);

	$args = array(
		'redirect' => "{$GLOBALS['cfg']['abs_root_url']}s3_upload_callback.php",
		'acl' => 'public-read',
		'amz_headers' => array(),
	);

	$s3_params = s3_signed_post_params($bucket, $args);

	$GLOBALS['smarty']->assign_by_ref("s3_params", $s3_params);
	$GLOBALS['smarty']->assign("s3_bucket_url", s3_get_bucket_url($bucket));

	$GLOBALS['smarty']->display("page_s3_upload.txt");
	exit;
?>
