
# 220302040 Muhammad Hassan Thalib

Playground project dengan menggunakan CodeIgniter 4. Sebagian langkah pengerjaan dijelaskan pada notion [berikut ini](https://silent-sphere-b78.notion.site/Code-Igniter-4-20ea1b48d23b4a84afe903ca261d2667?pvs=4)

## Persyaratan
- PHP ver 8.1.10+
- Composer ver 2.5.5+
- PostgreSQL ver 16.2+

## Instalasi
### Manual
[Download](https://github.com/muhammadhassan3/ci-example/archive/refs/heads/master.zip) project dan extract file unduhan tersebut
### Git Clone
Jalankan perintah berikut pada direktori tempat project akan diletakkan

```shell 
git clone https://github.com/muhammadhassan3/ci-example.git
```

## Menjalankan project
Untuk menjalankan project, buka direktori project pada terminal dan jalankan perintah berikut ini

```shell
php spark serve
```

Untuk menentukan port yang digunakan aplikasi, tambahkan argument `--port`

```shell
php spark serve --port 80
```

## Konfigurasi Dasar
Konfigurasi dasar dilakukan pada file `.env`
### Menentukan Base URL
Base URL akan digunakan pada saat sistem melakukan pengalihan.

### Konfigurasi database
