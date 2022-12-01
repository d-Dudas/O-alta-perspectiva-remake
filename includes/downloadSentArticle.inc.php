<?php

if (isset($_REQUEST["file"])) {
  // Get parameters
  $file = urldecode($_REQUEST["file"]); // Decode URL-encoded string
  $file = substr($file, 16, strlen($file));
  /* Check if the file name includes illegal characters
   like "../" using the regular expression */
  if (preg_match('/^[^.][-a-z0-9 _.]+[a-z]$/i', $file)) {
    $filepath = "../sentArticles/" . $file;

    // Process download
    if (file_exists($filepath)) {
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . filesize($filepath));
      flush(); // Flush system output buffer
      readfile($filepath);
      die();
    } else {
      http_response_code(404);
      die();
    }
  } else {
    die("Invalid file name!");
  }
}

?>