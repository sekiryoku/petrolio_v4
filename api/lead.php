<?php
header("Access-Control-Allow-Origin: *");

function logRequestResponse($request, $response, $error = null) {
    $logFile = 'api_log.txt';
    $logData = date('Y-m-d H:i:s') . "\n";
    $logData .= "Request: " . json_encode($request) . "\n";
    $logData .= "Response: " . json_encode($response) . "\n";

    if ($error) {
        $logData .= "Error: " . $error . "\n";
    }

    $logData .= "\n";

    file_put_contents($logFile, $logData, FILE_APPEND);
}

function customErrorHandler($errno, $errstr, $errfile, $errline) {
    // Log the error using the logRequestResponse function
    logRequestResponse($_POST, [], "Error: $errstr in $errfile on line $errline");
}
set_error_handler("customErrorHandler");

function trimValues($data) {
    if (is_array($data)) {
        foreach ($data as &$value) {
            $value = trimValues($value);
        }
    } else {
        $data = trim($data);
    }
    return $data;
}

function sendLeads1($leads) {
    $setting = array(
        'url' => 'https://stats-ldlt.irev.com/api/affiliates/v2/leads',
        'affiliate_id' => '3',
        'offer_id' => '2',
        'authorization_key' => 'fooip7be6wno4wa17m3dkn3y0a58vn0yp',
    );

    $apiData = array(
        'email' => trim($leads['email']),
        'first_name' => trim($leads['fname']),
        'last_name' => trim($leads['lname']), 
        'phone' => '+' .  trim($leads['phone']), 
        'country_code' => trim($leads['ctry']),
        'affiliate_id' => trim($setting['affiliate_id']),
        'offer_id' => trim($setting['offer_id']),
        'ip' => trim($leads['ip']),
        'password' => trim($leads['password']), 
        'aff_sub2' => 'ITEnelGP_v2',
        'aff_sub3' => 'EnelGreenPower',
        'aff_sub9' => trim($leads['city_region']), 
        'aff_sub13' => 'google',
        'aff_sub14' => 'LV',
    );

    // Optional fields with user-defined "aff_sub" keys
    $optional_fields = array(
        'subid' => 'aff_sub', 
        'gclid' => 'aff_sub5',
        'utm_content' => 'aff_sub6',
        'adgroup' => 'aff_sub7',
        'utm_campaign' => 'aff_sub8', 
        'lpurl' => 'aff_sub10',
        'domain' => 'aff_sub11', 
        'devicemodel' => 'aff_sub12', 
    );

    foreach ($optional_fields as $field => $aff_sub) {
        if (isset($leads[$field]) && $leads[$field] !== '') {
            $apiData[$aff_sub] = trimValues($leads[$field]);
        }
    }

    $curl_url = trim($setting['url']);

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $curl_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($apiData),
        CURLOPT_HTTPHEADER => array(
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Authorization: " . $setting['authorization_key'],
        ),
    ));

    $output1 = curl_exec($curl);
    $data1 = json_decode($output1, TRUE);

    // Log the request and response
    logRequestResponse( $_POST, $data1);


    return $data1; // Return the platform response directly
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $required_fields = array('email', 'fname', 'lname','phone', 'ctry', 'ip', 'password');
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field])) {
            echo json_encode(array('errorMessage' => 'Required field ' . $field . ' is missing.'));
            exit;
        }
    }

    $result_data = sendLeads1($_POST);
    echo json_encode($result_data);
} else {
    echo json_encode(array('errorMessage' => 'Invalid request method.'));
}