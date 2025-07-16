<?php

require_once __DIR__ . '/../bootstrap.php';
require_once UTILS_PATH . '/envSetter.util.php';

function checkMongoDB(): void {
    global $typeConfig;

    $mongoUri = $typeConfig['mongoUri'];
    $mongoDb  = $typeConfig['mongoDb'];

    try {
        $mongo = new MongoDB\Driver\Manager($mongoUri);

        $command = new MongoDB\Driver\Command(["ping" => 1]);
        $mongo->executeCommand($mongoDb, $command);

        echo "✅ Connected to MongoDB successfully. <br>";
    } catch (MongoDB\Driver\Exception\Exception $e) {
        echo "❌ MongoDB connection failed: " . $e->getMessage() . "<br>";
    }
}

checkMongoDB();
