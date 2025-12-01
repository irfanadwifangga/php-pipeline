<?php

namespace App;

/**
 * Class Calculator
 * Kelas sederhana untuk operasi matematika dasar
 */
class Calculator
{
    /**
     * Menjumlahkan dua angka
     *
     * @param float $a Angka pertama
     * @param float $b Angka kedua
     * @return float Hasil penjumlahan
     */
    public function add(float $a, float $b): float
    {
        return $a + $b;
    }

    /**
     * Mengurangkan dua angka
     *
     * @param float $a Angka pertama
     * @param float $b Angka kedua
     * @return float Hasil pengurangan
     */
    public function subtract(float $a, float $b): float
    {
        return $a - $b;
    }

    /**
     * Mengalikan dua angka
     *
     * @param float $a Angka pertama
     * @param float $b Angka kedua
     * @return float Hasil perkalian
     */
    public function multiply(float $a, float $b): float
    {
        return $a * $b;
    }

    /**
     * Membagi dua angka
     *
     * @param float $a Angka pertama
     * @param float $b Angka kedua
     * @return float Hasil pembagian
     * @throws \InvalidArgumentException Jika pembagi adalah nol
     */
    public function divide(float $a, float $b): float
    {
        if ($b == 0) {
            throw new \InvalidArgumentException("Tidak bisa membagi dengan nol");
        }
        return $a / $b;
    }

    /**
     * Menghitung modulus (sisa bagi)
     *
     * @param int $a Angka pertama
     * @param int $b Angka kedua
     * @return int Hasil modulus
     * @throws \InvalidArgumentException Jika pembagi adalah nol
     */
    public function modulus(int $a, int $b): int
    {
        if ($b == 0) {
            throw new \InvalidArgumentException("Tidak bisa modulus dengan nol");
        }
        return $a % $b;
    }

    /**
     * Menghitung pangkat
     *
     * @param float $base Bilangan dasar
     * @param float $exponent Pangkat
     * @return float Hasil pangkat
     */
    public function power(float $base, float $exponent): float
    {
        return pow($base, $exponent);
    }
}
