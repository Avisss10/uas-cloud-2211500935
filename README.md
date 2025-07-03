🐳 UAS Komputasi Awan - Semester Genap 2024/2025

👩‍🎓 Nama: Ayatulloh Fithana Sufi H
🆔 NIM: 2211500935  
📚 Mata Kuliah: Komputasi Awan  
👩‍🏫 Dosen: Riskiana Wulan, S.Kom., M.Kom

---

📄 Deskripsi Proyek

Aplikasi web sederhana berbasis Docker multi-container menggunakan Docker Compose.  
Fungsionalitas utama meliputi:

- Form input data pengguna (NIM, Nama, Email)
- Penyimpanan data ke MySQL
- Menampilkan data tersimpan dalam tabel
- Menggunakan volume untuk persistent storage agar data tetap tersimpan meski container dihentikan

---

🗂️ Struktur Folder Proyek

uas-cloud-2211500935/
├── app/
│ ├── Dockerfile
│ ├── index.php
│ └── dbconn.php
├── db/
│ └── nim-2211500935.sql
├── docker-compose.yml
└── README.md

---

⚙️ Konfigurasi Docker

📄 Dockerfile (`app/Dockerfile`)

```Dockerfile
FROM php:8.1-apache
RUN docker-php-ext-install mysqli
COPY . /var/www/html/
EXPOSE 80

🐳 docker-compose.yml
yaml
Copy
Edit
services:
  app:
    build: ./app
    ports:
      - "8080:80"
    volumes:
      - ./app:/var/www/html
    depends_on:
      - db

  db:
    image: mysql:5.7
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: 2211500935
    volumes:
      - mysql-data:/var/lib/mysql
      - ./db:/docker-entrypoint-initdb.d

volumes:
  mysql-data:

  ---


🚀 Cara Menjalankan Aplikasi

Buka terminal di direktori proyek

Jalankan:
docker compose up --build

Akses aplikasi melalui browser:
http://localhost:8080

---

💾 Fitur Aplikasi

✅ Input data: NIM, Nama, Email

✅ Simpan data ke database MySQL

✅ Tampilkan data tersimpan

✅ Persistent storage dengan Docker volume

---

🔁 Tes Persistent Storage

Untuk menguji bahwa data tetap tersimpan setelah container dihentikan:

docker compose down
docker compose up

✅ Setelah diakses ulang, data masih tetap ada.

---

🔄 Reset Data Total (Opsional)

Jika ingin menghapus semua data dan reset database:

docker compose down --volumes
docker compose up --build

---

🧪 Inisialisasi Database

File SQL otomatis dijalankan saat container database pertama kali dibuat.

📄 db/nim-2211500935.sql

CREATE DATABASE IF NOT EXISTS `2211500935`;
USE `2211500935`;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nim VARCHAR(20),
  nama VARCHAR(100),
  email VARCHAR(100)
);