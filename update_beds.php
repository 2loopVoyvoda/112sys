<?php
  // Get the hospital name and number of free beds from the AJAX request
  $hospitalName = $_POST['hospitalName'];
  $freeBeds = $_POST['freeBeds'];

  // Read the "beds.html" file contents
  $bedsContent = file_get_contents('beds.html');

  // Find the specific hospital row and update the number of free beds
  // Here, you can use regular expressions, string manipulation, or HTML parsing libraries to achieve this
  // For simplicity, let's assume the hospital names are unique and already present in the table

  // Example using regular expressions
  $pattern = "/<tr>\s*<td>$hospitalName<\/td>\s*<td>[^<]*<\/td>\s*<td>[^<]*<\/td>\s*<\/tr>/";
  $replacement = "<tr>\n<td>$hospitalName<\/td>\n<td>[location]</td>\n<td>$freeBeds<\/td>\n<\/tr>";
  $updatedContent = preg_replace($pattern, $replacement, $bedsContent);

  // Save the updated content back to the "beds.html" file
  file_put_contents('beds.html', $updatedContent);

  // Send a response to indicate the success of the update
  echo 'success';
?>
