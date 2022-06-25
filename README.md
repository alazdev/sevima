<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Tentang SuperKlas

SuperKlas adalah aplikasi berbasis web yang diperuntukkan untuk menyimpan data berupa modul pembelajaran GRATIS sebanyak-banyaknya. Tujuannya mempermudah siswa perdesaan untuk mendapatkan ilmu dan kurikulum yang sama dengan kurikulum yang ada di kota. Fitur utama :

- Mempermudah Siswa menemukan informasi seputar buku, pembahasan mata pelajaran.
- Modul pembelajaran sudah berupa video dan teks.
- Membantu siswa menemukan modul yang dia minati serta bisa menyimpan modul tersebut.

## Latar Belakang SuperKlas

Latar belakang SuperKlas sendiri adalah perbedaan dalam kurikulum di kota dan di desa, sehingga penyebabkan ketidaksetaraan pemasokan ilmu antara siswa di desa dengan siswa di kota. Selain itu, buku-buku yang dijual diluaran sana terlalu mahal jika dibandingkan dengan ekonomi daerah. Kesulitan atas jangkauan perpustakaan di daerah-daerah apalagi di era Pandemi COVID-19 ini.

## Mengapa Harus Laravel?

Laravel adalah salah satu *framework PHP* yang bersifat *open source*. Laravel memiliki sintaks ekspresif dan elegan yang dirancang untuk memudahkan dan mempercepat dalam membangun sebuah aplikasi. Laravel juga sudah menggunakan Arsitektur MVC dengan dokumentasi lengkap dan resmi serta mementingkan keamanan aplikasi.

## Dibutuhkan

1. PHP ^7.3|^8.0
2. MySQL
3. Composer
4. NodeJS
5. GitBash (opsional)

## Teknologi Utama

1. Laravel 8
2. Bootstrap
3. JQuery
4. Ajax
5. DataTables
6. Sweet Alert
7. ChartJS
8. Laravel Socialite

## Instalasi

Jalankan perintah berikut di terminal :

```bash
git clone https://github.com/alazimdev/sevima.git
cd sevima
composer install
cp .env.example .env
```

Sesuaikan value DB_ yang ada di .env dengan koneksi MySQL serta membuat database yang sesuai dengan DB_DATABASE, setelah itu lakukan migrate seperti berikut :

```bash
php artisan migrate --seed
```

> Disclaimer: beberapa credential sengaja diletakkan di .env.example untuk mempermudah para juri untuk menginstalasi aplikasi.

## Menjalankan Aplikasi

Jalankan perintah berikut di terminal :

```bash
php artisan serve
```

Buka browser dan masukkan url http://127.0.0.1:8000/ lalu `Enter`

Dengan seed yang telah dimasukkan saat instalasi, maka kita bisa login sebagai user berikut :

1. Super Admin

   Email : superadmin@gmail.com

   Password : Secret123

2. Admin

   Email : admin@gmail.com

   Password : Secret123

3. Mentor

   Email : halimah@gmail.com

   Password : Secret123

4. Siswa

   Email : alazim.dev@gmail.com

   Password : Secret123


## Lisensi

Framework Laravel adalah perangkat lunak sumber terbuka berlisensi di bawah [MIT license](https://opensource.org/licenses/MIT).
