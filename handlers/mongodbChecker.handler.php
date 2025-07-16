<?php
require_once BASE_PATH . '/../utils/envSetter.util.php';

$mongoUri = $typeConfig['mongoUri'];
$mongoDb  = $typeConfig['mongoDb'];

function checkMongoDB() {
    try {
        $mongo = new MongoDB\Driver\Manager("mongodb://host.docker.internal:23567");

        $command = new MongoDB\Driver\Command(["ping" => 1]);
        $mongo->executeCommand("admin", $command);

        echo "✅ Connected to MongoDB successfully.  <br>";
    } catch (MongoDB\Driver\Exception\Exception $e) {
        echo "❌ MongoDB connection failed: " . $e->getMessage() . "  <br>";
    }
}