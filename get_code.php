<?php
// Set header to plain text so ESP32 doesn't get confused
header('Content-Type: text/plain');

$filename = "main.py";

if (file_exists($filename)) {
    echo file_get_contents($filename);
} else {
    echo "print('No code on server')";
}
?>
