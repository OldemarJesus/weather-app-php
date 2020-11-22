<?php 
    $apiKey = "8457dac742ed356cdf867503b6b57680";

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

        $ip = $_SERVER['HTTP_CLIENT_IP'];
        
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        
        } else {
        
        $ip = $_SERVER['REMOTE_ADDR'];
        
        }

        if($ip == "::1"){
            $city="Lisbon";
        }else
          {
            $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"),true);
            $city = $details['city'];
          }



    $url = "api.openweathermap.org/data/2.5/weather?q=".$city."&lang=pt&units=metric&appid=".$apiKey;
    // Collection object
    $data = [
    'collection' => 'RapidAPI'
    ];

    // Initializes a new cURL session
    $curl = curl_init($url);

    // 1. Set the CURLOPT_RETURNTRANSFER option to true
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // 2. Set the CURLOPT_POST option to true for POST request
    curl_setopt($curl, CURLOPT_POST, true);
    // 3. Set the request data as JSON using json_encode function
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
    // 4. Set custom headers for RapidAPI Auth and Content-Type header
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
      'X-RapidAPI-Host: kvstore.p.rapidapi.com',
      'X-RapidAPI-Key: [Input your RapidAPI Key Here]',
      'Content-Type: application/json'
    ]);
    
    // Execute cURL request with all previous settings
    $response = curl_exec($curl);
    // Close cURL session
    curl_close($curl);

    $response = json_decode($response, true);

    $timezone = $response["name"];
    $icon = $response['weather'][0]['icon'];
    $degree = $response['main']['temp'];
    $Ddegree = $response['weather'][0]['description'];

?>