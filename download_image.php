<?php
session_start();

// Start the session
// Check if the user is not logged in
if (!isset($_SESSION['id'])) {
    http_response_code(403); // Forbidden
    echo json_encode(['error' => 'User is not logged in. Please log in to download images.']);
    exit();
}

// Get the image URL from the client
$data = json_decode(file_get_contents("php://input"), true);
$image_url = $data['image_url'];

// Connect to the SQLite database
$db = new SQLite3('database.db');

// Prepare and execute the SQL statement to insert the downloaded image URL
$stmt = $db->prepare('INSERT INTO downloaded_images (user_id, image_url) VALUES (:user_id, :image_url)');
$stmt->bindValue(':user_id', $_SESSION['id'], SQLITE3_INTEGER);
$stmt->bindValue(':image_url', $image_url, SQLITE3_TEXT);
$result = $stmt->execute();

// Close the database connection
$db->close();


if ($result) {
    echo json_encode(['success' => true]);
} else {
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Failed to save the image URL.']);
    
}
?>
