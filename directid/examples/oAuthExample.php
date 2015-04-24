<?php

//OAuth Details Provided by DirectID
$clientID = '';
$clientSecret = '';
$oAuthResource = '';
$oAuthPath = '';

//Import OAuth details from post request for purposes of example
if(isset($_POST["clientId"])){
    $clientID = $_POST["clientId"];    
}
if(isset($_POST["clientSecret"])){
    $clientSecret = $_POST["clientSecret"];
    
}
if(isset($_POST["oAuthResource"])){
    $oAuthResource = $_POST["oAuthResource"];    
}
if(isset($_POST["oAuthPath"])){
    $oAuthPath = $_POST["oAuthPath"];     
}

//Example OAuth Token Class
class OAuthToken{
    public $token;
    public $expires;
}

//Get OAuth Token using cURL
function returnOAuthToken(){    
    
    global $clientID, $clientSecret, $oAuthResource, $oAuthPath;   
        
    if($clientID != null && $clientSecret != null && $oAuthResource != null && $oAuthPath != null){         
        
        //Make cURL Request
        $oAuthCurlInstance = buildOAuthCurlRequest(); //The cURL request is constructed using the OAuth Details provided by Direct ID
        $oAuthCurlResponse = curl_exec($oAuthCurlInstance);
        curl_close($oAuthCurlInstance);      
        
        //Handle cURL Response
        if($oAuthCurlResponse != false){         
            
            $jsonResponse = json_decode($oAuthCurlResponse);  //Decode

            if(json_last_error() == JSON_ERROR_NONE) { //Validate       
                if (property_exists($jsonResponse, 'access_token')){                                     

                    //Build and return OAuth token
                    $token = new OAuthToken();                
                    $token->token = $jsonResponse->{'access_token'};
                    $token->expires = calcOAuthExpiryDate($jsonResponse->{'expires_in'});                
                    return $token;                
                    
                }
            }        
        }
    }
    
    return null;    
}

//Build cURL Request
function buildOAuthCurlRequest(){    
    
    global $oAuthPath;
    
    $ch = curl_init();
    
    //Client specific options
    curl_setopt($ch, CURLOPT_URL, $oAuthPath);    
    curl_setopt($ch, CURLOPT_POSTFIELDS, returnOAuthRequestParams());
    
    //Generic options
    curl_setopt($ch, CURLOPT_HTTPHEADER, returnOAuthHeaders());
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 90);
    curl_setopt($ch, CURLOPT_TIMEOUT, 90);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 2);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, TRUE);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    
    //If curl resports "SSL certificate problem: unable to get local issuer certificate" uncomment and configure the next line
    curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . "/cacert.pem"); //Path to local certificate authority
    
    return $ch;
}

//Create Request Headers
function returnOAuthHeaders (){
    $headers = array();
    array_push($headers, 'Accept:');
    array_push($headers, 'Host: login.windows.net');
    array_push($headers, 'User-Agent: DirectID PHP');
    return $headers;
}

//Create Request Paramaters
function returnOAuthRequestParams(){    
    
    global $clientID, $clientSecret, $oAuthResource;
    
    $parameters = array();
    $parameters['grant_type'] = 'client_credentials';
    $parameters['client_id'] = $clientID;
    $parameters['client_secret'] = $clientSecret;
    $parameters['resource'] = $oAuthResource;
    $payload = http_build_query($parameters);
    return $payload;    
}

//Calculate expirey date based on token life
function calcOAuthExpiryDate($expiresIn){         
    $expiryDate = new DateTime('now', new DateTimeZone("UTC"));
    $expiryDate->add(new DateInterval('PT' . $expiresIn . 'S'));
    $readableExpiryDate = $expiryDate->format('d-m-Y H:i:s');     
    return $readableExpiryDate;    
}
?>