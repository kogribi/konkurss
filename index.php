<?php 
require_once "back-end.php";
require_once "database.php";

$gifts = gifts_to_array(18);
echo "Dāvanu saraksts: " . $gifts;
?>