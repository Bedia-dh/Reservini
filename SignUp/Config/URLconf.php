<?php
// Make sure session is started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Define BASE_URL only if it's not already set
if (!defined('BASE_URL')) {
    define('BASE_URL', 'http://localhost/reservini_pfa');
}
?>
