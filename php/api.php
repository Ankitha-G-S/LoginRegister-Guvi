<?php

require_once __DIR__ . "/vendor/autoload.php";

use MongoDB\Client;

// Set your MongoDB connection details
$mongoClient = new Client("mongodb://localhost:27017");
$database = $mongoClient->your_database_name; // Replace 'your_database_name' with your actual database name
$collection = $database->users;

session_start();

$userId = $_SESSION['user_id'];

// Fetch user data based on the user ID
$userData = $collection->findOne(["_id" => new MongoDB\BSON\ObjectID($userId)]);

// Return user data as JSON
header('Content-Type: application/json');
echo json_encode($userData);

?>
