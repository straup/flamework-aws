<?php

	include("include/init.php");
	loadlib("s3");

	$etag = get_str('etag');
	$key = get_str('key');

	if ((! $etag) || (! $key)){
		error_404();
	}

	$bucket = array(
		'id' => $GLOBALS['cfg']['aws']['s3_bucket'],
		'key' => $GLOBALS['cfg']['aws']['access_key'],
		'secret' => $GLOBALS['cfg']['aws']['access_secret'],
	);

	$rsp = s3_verify_etag($bucket, $key, $etag);
	$GLOBALS['smarty']->assign("success", $rsp['ok']);

	$GLOBALS['smarty']->display("page_s3_upload_callback.txt");
	exit();
?>
