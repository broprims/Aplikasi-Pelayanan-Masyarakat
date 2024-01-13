<p align="center">
    <a href="https://github.com/broprims" target="_blank"><img src="https://media.tenor.com/GfSX-u7VGM4AAAAC/coding.gif" width="400"></a>
</p>

## Tentang Aplikasi

Aplikasi <b>Pelayanan masyarakat</b> sederhana yang digunakan untuk masyarakat dalam pengajuan sebuah surat pengajuan kepada desa dalam membuat sebuah Kartu Keluarga, Kartu Tanda Penduduk, dll

## Instalasi
#### Via Git
```bash
git clone https://github.com/broprims/Aplikasi-Pelayanan-Masyarakat.git
```

### Download ZIP

[//]: # ([[Link]&#40;https://github.com/Kantrawibawa10/pelayanan-masyarakat/archive/refs/heads/master.zip&#41;])

### Setup Aplikasi
Jalankan perintah 
```bash
composer update
```
atau:
```bash
composer install
```
Copy file .env dari .env.example
```bash
cp .env.example .env
```
Konfigurasi file .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tbl_informasi
DB_USERNAME=root
DB_PASSWORD=
```
Opsional
```bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:MzM8eIe2f/kz4AhdeBOn3EJoPUPbqANPVVSOuYleMnI=
APP_DEBUG=true
APP_URL=http://pelayanan-masyarakat
```
Generate key
```bash
php artisan key:generate
```
Migrate database
```bash
php artisan migrate
```
Menjalankan aplikasi
```bash
php artisan serve
```

## License

[MIT license](https://opensource.org/licenses/MIT)
