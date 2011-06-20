<?php 

// CloudSponge.com PHP Library v0.9 Beta
// http://www.cloudsponge.com
// Copyright (c) 2010 Cloud Copy, Inc.
// Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
//
// Written by Graeme Rouse
// graeme@cloudsponge.com

require_once 'csimport.php';
$response = CSImport::forward_auth($_GET, $_POST);
if (isset($response['redirect'])) {
  // This is our successful case
  // calling header(..) only works if no body 
  // content has been sent yet. If you are integrating this
  // page in a web application framework, 
  // you may need to redirect differently. 
  // E.g. With Kohana: 
  //  url::redirect($response['redirect']);
  header($response['redirect']);
} else {
  // We shouldn't get here
  echo $response['body'];
}

// calling exit here to ensure that the response is sent, event if there is no body content. 
// Thanks to Chris McKeever of GiveForward.com for discovering this issue when integrating with Kohana. 
exit;
?>