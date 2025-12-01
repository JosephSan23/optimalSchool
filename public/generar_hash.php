<?php
// Este archivo solo sirve para generar hashes de prueba
for ($i = 1; $i <= 30; $i++) {
    echo "Usuario $i: " . password_hash('123456', PASSWORD_DEFAULT) . "\n";
}