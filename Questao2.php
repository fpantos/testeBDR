<?php
if ((isset($_SESSION['loggedin']) && 
    filter_input(INPUT_SESSION, 'loggedin', FILTER_SANITIZE_STRING) == true) ||
    (isset($_COOKIE['Loggedin']) &&
    filter_input(INPUT_COOKIE, 'Loggedin', FILTER_SANITIZE_STRING) == true)
) {
    header("Location: http://www.google.com");
} 
