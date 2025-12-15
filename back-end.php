<?php
require_once "database.php";
$database = new Connection();
$conn = $database->get_connection();
function gifts_to_array($sender_id) {
    global $conn; 
    
    if (!$conn instanceof PDO) {
        
        error_log("Attempted to use gifts_to_array without a valid \$conn object.");
        return "";
    }
    $stmt = $conn->prepare("SELECT letter_text FROM letters WHERE sender_id = :id");

    $stmt->bindParam(':id', $sender_id, PDO::PARAM_INT);
    $stmt->execute();
    
    $letter = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($letter && isset($letter['letter_text'])) {
        $full_text = $letter['letter_text'];
        $delimiter = ": ";
        $letter_example = strrchr($full_text, $delimiter);
        
        if ($letter_example !== false) {
            $letter_result = substr($letter_example, strlen($delimiter));
            return trim($letter_result);
        }
        
        return trim($full_text);
    }
    
    return "";
}
?>