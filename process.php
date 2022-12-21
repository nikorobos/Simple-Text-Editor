<?php
// Start a session
session_start();

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate the CSRF token

    // Connect to the database
    $link = mysqli_connect('127.0.0.1', 'root', '', 'text_editor');

    // Check for an error
    if (mysqli_connect_errno()) {
        die('Failed to connect to the database: ' . mysqli_connect_error());
    }

    // Escape the text and image data to prevent SQL injection
    $text = mysqli_real_escape_string($link, $_POST['text']);
    $image = mysqli_real_escape_string($link, file_get_contents($_FILES['image']['tmp_name']));

    // Build the INSERT query
    $query = "INSERT INTO entries (text, image) VALUES ('$text', '$image')";

    // Execute the query
    $result = mysqli_query($link, $query);

    // Check for an error
    if (!$result) {
        die('Error inserting text: ' . mysqli_error($link));
    }

    // Redirect to the texts page
    header('Location: results.php');
    exit;
}

?>