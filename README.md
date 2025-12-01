# PHP Calculator Project

Project PHP sederhana dengan unit testing dan Jenkins CI/CD pipeline.

## Deskripsi

Project ini berisi implementasi class `Calculator` yang menyediakan operasi matematika dasar seperti penjumlahan, pengurangan, perkalian, pembagian, modulus, dan pangkat.

## Struktur Project

```
jenkins-pipeline/
├── src/
│   ├── Calculator.php       # Class Calculator utama
│   └── index.php            # Demo penggunaan Calculator
├── tests/
│   └── CalculatorTest.php   # Unit test untuk Calculator
├── vendor/                  # Dependencies Composer
├── composer.json            # Konfigurasi Composer
├── phpunit.xml              # Konfigurasi PHPUnit
├── Jenkinsfile              # Pipeline script untuk Jenkins
└── README.md                # Dokumentasi project
```

## Requirements

-   PHP 8.0 atau lebih tinggi
-   Composer
-   PHPUnit 12.5

## Instalasi

1. Install dependencies:

```bash
composer install
```

## Cara Menggunakan

### Menjalankan Demo

```bash
php src/index.php
```

### Menjalankan Unit Tests

```bash
vendor/bin/phpunit
```

Atau di Windows:

```bash
vendor\bin\phpunit.bat
```

### Menjalankan Tests dengan Coverage

```bash
vendor/bin/phpunit --coverage-text
```

## Fitur Calculator

-   **add(a, b)**: Penjumlahan dua angka
-   **subtract(a, b)**: Pengurangan dua angka
-   **multiply(a, b)**: Perkalian dua angka
-   **divide(a, b)**: Pembagian dua angka (throw exception jika pembagi nol)
-   **modulus(a, b)**: Modulus/sisa bagi (throw exception jika pembagi nol)
-   **power(base, exponent)**: Perpangkatan

## Unit Testing

Project ini menggunakan PHPUnit untuk testing. Test coverage meliputi:

-   ✅ Test semua operasi matematika dasar
-   ✅ Test edge cases (angka negatif, nol, desimal)
-   ✅ Test exception handling (pembagian/modulus dengan nol)

## Jenkins CI/CD Pipeline

Jenkinsfile menyediakan pipeline dengan stages berikut:

1. **Checkout**: Mengambil kode dari repository
2. **Install Dependencies**: Install dependencies via Composer
3. **Run Tests**: Menjalankan PHPUnit tests
4. **Code Quality Check**: Placeholder untuk code quality tools
5. **Archive Results**: Menyimpan hasil test dalam format JUnit XML

### Cara Setup di Jenkins

1. Buat New Item → Pipeline
2. Pilih "Pipeline script from SCM"
3. Masukkan repository URL
4. Tentukan branch (misalnya: main/master)
5. Script Path: `Jenkinsfile`
6. Save dan jalankan Build

## Contoh Penggunaan

```php
use App\Calculator;

$calc = new Calculator();

echo $calc->add(10, 5);      // Output: 15
echo $calc->subtract(10, 5); // Output: 5
echo $calc->multiply(10, 5); // Output: 50
echo $calc->divide(10, 5);   // Output: 2
echo $calc->modulus(10, 3);  // Output: 1
echo $calc->power(2, 3);     // Output: 8
```

## Testing

Jalankan semua test:

```bash
vendor/bin/phpunit
```

Jalankan test spesifik:

```bash
vendor/bin/phpunit tests/CalculatorTest.php
```

## License

Project ini dibuat untuk keperluan pembelajaran di mata kuliah Keamanan Sistem Informasi.
