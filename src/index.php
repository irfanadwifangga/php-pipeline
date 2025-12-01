<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Calculator;

// Membuat instance Calculator
$calculator = new Calculator();

echo "=== Demo Kalkulator PHP ===\n\n";

// Contoh penggunaan
echo "Penjumlahan: 10 + 5 = " . $calculator->add(10, 5) . "\n";
echo "Pengurangan: 10 - 5 = " . $calculator->subtract(10, 5) . "\n";
echo "Perkalian: 10 * 5 = " . $calculator->multiply(10, 5) . "\n";
echo "Pembagian: 10 / 5 = " . $calculator->divide(10, 5) . "\n";
echo "Modulus: 10 % 3 = " . $calculator->modulus(10, 3) . "\n";
echo "Pangkat: 2 ^ 3 = " . $calculator->power(2, 3) . "\n";

echo "\n=== Demo Selesai ===\n";
