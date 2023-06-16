<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the correction and hospital name from the POST data
  $correction = $_POST['correction'];
  $hospitalName = $_POST['hospitalName'];

  // Load the contents of the "beds.html" file
  $bedsFile = 'beds.html';
  $bedsContent = file_get_contents($bedsFile);

  // Find the position of the hospital name in the file
  $startPos = strpos($bedsContent, $hospitalName);

  if ($startPos !== false) {
    // Find the position of the closing </td> tag after the hospital name
    $endPos = strpos($bedsContent, '</td>', $startPos);

    if ($endPos !== false) {
      // Update the content between the start and end positions with the correction
      $updatedContent = substr_replace($bedsContent, $correction, $startPos, $endPos - $startPos);

      // Write the updated content back to the "beds.html" file
      file_put_contents($bedsFile, $updatedContent);

      // Return a success response
      echo 'success';
    } else {
      // Return an error response if the closing </td> tag is not found
      echo 'error: closing </td> tag not found';
    }
  } else {
    // Return an error response if the hospital name is not found
    echo 'error: hospital name not found';
  }
} else {
  // Return an error response if the request method is not POST
  echo 'error: invalid request method';
}
?>
