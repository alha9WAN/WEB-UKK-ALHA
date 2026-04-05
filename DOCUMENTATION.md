# DOCUMENTATION

## Deskripsi Sistem
Sistem ini digunakan untuk mengelola peminjaman alat secara online dengan fitur pembayaran dan verifikasi.

---

## Alur Sistem

User → Register → Verifikasi Email → Login  
→ Pilih Alat → Order → Pembayaran (Midtrans)  
→ Menunggu Persetujuan → Digunakan → Pengembalian → Selesai

---

## Fitur Sistem

### 1. Autentikasi
- Register
- Login
- Verifikasi Email

### 2. Peminjaman
- Melihat daftar alat
- Detail alat
- Melakukan peminjaman

### 3. Pembayaran
- Integrasi Midtrans (Sandbox)
- Snap Token
- Callback pembayaran

### 4. Manajemen
- Dashboard User
- Dashboard Petugas
- Dashboard Admin
- Persetujuan peminjaman

---

## Struktur Database

### Tabel:
- users
- kategori
-activity_logs
- tool
- orders
-orders detail
- payments
-rental
-notifikasi
-penaltis


## Penjelasan Tabel

### users
Menyimpan data pengguna (admin, petugas, user)

### kategori
Kategori alat

### tools
Data alat yang bisa dipinjam

### orders
Data peminjaman utama

### order_details
Detail alat yang dipinjam dalam satu order

### payments
Data pembayaran (Midtrans)

### rentals
Status peminjaman (dipinjam / dikembalikan)

### notifications
Notifikasi ke user

### penalties
Denda keterlambatan

### activity_logs
Log aktivitas user


## Relasi

- users → orders
(1 user bisa memiliki banyak order)

- orders → order_details
(1 order memiliki banyak detail alat)

- order_details → tools
(setiap detail mengacu ke 1 alat)

- tools → kategori
(alat memiliki 1 kategori)

- orders → payments
(1 order memiliki 1 pembayaran)

- orders → rentals
(1 order memiliki status peminjaman)

- users → notifications
(user menerima notifikasi)

- rentals → penalties
(jika terlambat → kena denda)

- users → activity_logs
(semua aktivitas dicatat)


---

## Teknologi yang Digunakan
- Laravel (Backend)
- MySQL (Database)
- Midtrans (Payment Gateway)

