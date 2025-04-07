<?php
require_once 'Database.php';

try {
    $db = Database::getInstance();
    $conn = $db->getConnection();

    // Leer y ejecutar el script SQL
    $sql = file_get_contents(__DIR__ . '/update_tables.sql');
    $conn->exec($sql);

    echo "Base de datos actualizada correctamente.";
} catch (Exception $e) {
    echo "Error al actualizar la base de datos: " . $e->getMessage();
} 