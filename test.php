<?php
// Initialize a cURL session
$curl = curl_init();

// Set the URL for the cURL session
$url = "https://jsonplaceholder.typicode.com/posts/1";

// Set cURL options
curl_setopt($curl, CURLOPT_URL, $url); // Set the URL to fetch
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return the response as a string

// Execute the cURL session and store the response in a variable
$response = curl_exec($curl);

// Check for errors
if ($response === false) {
    // Get the error message
    $error = curl_error($curl);
    echo "cURL Error: $error";
} else {
    // Print the response
    echo "Response: $response";
}

// Close the cURL session
curl_close($curl);
?>
