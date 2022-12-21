<!DOCTYPE html>
<html>
<head>
    <title>Texts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Texts</h1>
        <hr>

<?php
// Connect to the database
$link = mysqli_connect('127.0.0.1', 'root', '', 'text_editor');

// Check for an error
if (mysqli_connect_errno()) {
    die('Failed to connect to the database: ' . mysqli_connect_error());
}

// Build the SELECT query
$query = 'SELECT * FROM entries';

// Execute the query
$result = mysqli_query($link, $query);

// Check for an error
if (!$result) {
    die('Error retrieving texts: ' . mysqli_error($link));
}

// Loop through the rows
while ($row = mysqli_fetch_assoc($result)) {
    // Output the text and image
    echo '<div class="mb-3">';
    echo '<p>' . $row['text'] . '</p>';
    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" class="img-fluid">';
    echo '</div>';
}

// Close the connection
mysqli_close($link);
?>
    </div>
</body>
</html>