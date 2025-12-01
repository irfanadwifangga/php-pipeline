<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Calculator;

/**
 * Class CalculatorTest
 * Unit test untuk class Calculator
 */
class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    /**
     * Setup yang dijalankan sebelum setiap test
     */
    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    /**
     * Test penjumlahan
     */
    public function testAdd(): void
    {
        $this->assertEquals(15, $this->calculator->add(10, 5));
        $this->assertEquals(0, $this->calculator->add(-5, 5));
        $this->assertEquals(-10, $this->calculator->add(-5, -5));
        $this->assertEquals(7.5, $this->calculator->add(5, 2.5));
    }

    /**
     * Test pengurangan
     */
    public function testSubtract(): void
    {
        $this->assertEquals(5, $this->calculator->subtract(10, 5));
        $this->assertEquals(-10, $this->calculator->subtract(-5, 5));
        $this->assertEquals(0, $this->calculator->subtract(5, 5));
        $this->assertEquals(2.5, $this->calculator->subtract(5, 2.5));
    }

    /**
     * Test perkalian
     */
    public function testMultiply(): void
    {
        $this->assertEquals(50, $this->calculator->multiply(10, 5));
        $this->assertEquals(-25, $this->calculator->multiply(-5, 5));
        $this->assertEquals(0, $this->calculator->multiply(0, 5));
        $this->assertEquals(12.5, $this->calculator->multiply(5, 2.5));
    }

    /**
     * Test pembagian
     */
    public function testDivide(): void
    {
        $this->assertEquals(2, $this->calculator->divide(10, 5));
        $this->assertEquals(-1, $this->calculator->divide(-5, 5));
        $this->assertEquals(2.5, $this->calculator->divide(5, 2));
    }

    /**
     * Test pembagian dengan nol harus throw exception
     */
    public function testDivideByZeroThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Tidak bisa membagi dengan nol");
        $this->calculator->divide(10, 0);
    }

    /**
     * Test modulus
     */
    public function testModulus(): void
    {
        $this->assertEquals(1, $this->calculator->modulus(10, 3));
        $this->assertEquals(0, $this->calculator->modulus(10, 5));
        $this->assertEquals(2, $this->calculator->modulus(17, 5));
    }

    /**
     * Test modulus dengan nol harus throw exception
     */
    public function testModulusByZeroThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Tidak bisa modulus dengan nol");
        $this->calculator->modulus(10, 0);
    }

    /**
     * Test pangkat
     */
    public function testPower(): void
    {
        $this->assertEquals(8, $this->calculator->power(2, 3));
        $this->assertEquals(1, $this->calculator->power(5, 0));
        $this->assertEquals(0.5, $this->calculator->power(2, -1));
        $this->assertEquals(25, $this->calculator->power(5, 2));
    }
}
