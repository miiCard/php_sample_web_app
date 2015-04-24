<?php

include 'examples/oAuthExample.php';
include 'examples/apiManagerExample.php';
include 'examples/userSessionExample.php';

//Generate OAuth Token
$oAuthToken = new OAuthToken();
$oAuthToken = returnOAuthToken();

//Generate User Token
$userToken = new UserToken();
if(isset($oAuthToken) && $oAuthToken->token != null){    
    $userToken = returnUserToken($oAuthToken->token);
}

include 'view-partials/header.php';
include 'view-partials/main-widget.php';
include 'view-partials/footer.php';

?>