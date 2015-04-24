<?php
    //Make a GET request to the API on a given endpoint using a valid OAuth token
    function makeAPIRequest($apiEndpoint, $oAuthToken){    
        $apiCurlInstance = buildApiCurlInstance($apiEndpoint, $oAuthToken);    
        $response = curl_exec($apiCurlInstance);
        curl_close($apiCurlInstance);
        return $response;
    }

    //Build cURL request
    function buildApiCurlInstance($apiPath, $oAuthToken){  

        $ch = curl_init();

        //Request specific options
        curl_setopt($ch, CURLOPT_URL, $apiPath);
        curl_setopt($ch, CURLOPT_HTTPHEADER, returnApiHeaders($oAuthToken));

        //Generic options
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 90);
        curl_setopt($ch, CURLOPT_TIMEOUT, 90);    
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
    function returnApiHeaders($oAuthToken){
        $headers = array();
        array_push($headers, 'Authorization: Bearer ' . $oAuthToken);
        array_push($headers, 'Content-Type: application/json');
        return $headers;
    }
?>