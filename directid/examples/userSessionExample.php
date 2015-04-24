<?php

//API Connection Details
$apiUserSessionEndpoint = '';

//Import OAuth details from post request for purposes of example
if(isset($_POST["apiPath"])){
    $apiUserSessionEndpoint = $_POST["apiPath"];
}

//Example User Token Class
class UserToken{
    public $token;
    public $reference;
}

//Get User Token using cURL, an oAuthToken must be supplied (see returnOAuthToken() in previous example
function returnUserToken($oAuthToken){
    
    global $apiUserSessionEndpoint;
    
    if($apiUserSessionEndpoint != null){
    
        //Make API request
        $apiResponse = makeAPIRequest($apiUserSessionEndpoint, $oAuthToken);   

        //Handle response
        if($apiResponse != false){
            $jsonResponse = json_decode($apiResponse);

            if(json_last_error() == JSON_ERROR_NONE) {                       

                //Build and return user token
                $userToken = new UserToken();            
                $userToken->token = $jsonResponse->{'token'};
                $userToken->reference = $jsonResponse->{'reference'};
                return $userToken;
            }
        }
    }
}
?>