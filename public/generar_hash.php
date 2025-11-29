<?php
// Este archivo solo sirve para generar hashes de prueba
for ($i = 1; $i <= 10; $i++) {
    echo "Estudiante $i: " . password_hash('123456', PASSWORD_DEFAULT) . "\n";
}