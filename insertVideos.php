<?php
require_once __DIR__ . '/vendor/autoload.php';

$apiKey = 'AIzaSyDvcVMjXpVnR55euaLVvfwl8m6sJXVvvmA';
$playlistId = 'PLq71IJk8mCV4-DqsZ7W6zRS7uzKOmmT8j';

// Create a new Google_Client instance
$client = new Google_Client();
$client->setDeveloperKey($apiKey);

// Create a new YouTube service
$youtube = new Google_Service_YouTube($client);

// Set the initial nextPageToken to an empty string
$nextPageToken = '';

$videoLinks = array();

// Fetch the videos in the playlist
do {
    $response = $youtube->playlistItems->listPlaylistItems('snippet', array(
        'playlistId' => $playlistId,
        'maxResults' => 50,
        'pageToken' => $nextPageToken
    ));
   // Loop through the videos and add their links to the $videoLinks array
   foreach ($response['items'] as $video) {
    $title = $video['snippet']['title'];
    //$link = "https://youtube.com/watch?v=" . $video['snippet']['resourceId']['videoId'];
    $vid = $video['snippet']['resourceId']['videoId'];
    $videoLinks[$title] = $vid;
    //$videoLinks[$title] = $link;
    //array_push($videoLinks, $link);
}

// Update the nextPageToken variable
$nextPageToken = $response['nextPageToken'] ?? '';
} while ($nextPageToken);
//print_r($videoLinks);
// Connect to the database
$mysqli = new mysqli('localhost', 'root', '', 'sunday_suspense');

// Loop through the $videoLinks array
foreach ($videoLinks as $title => $vid) {
    // Prepare the INSERT query
    $escapedTitle = mysqli_real_escape_string($mysqli, $title);
    $query = "INSERT INTO `videos`(`id`, `title`, `videolink`) VALUES ('', '$escapedTitle', '$vid')";
    $stmt = $mysqli->prepare($query);
    // Execute the query
    $stmt->execute();
}

// Close the database connection
$mysqli->close();

?>
