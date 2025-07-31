# Management Inventory System

## 🎯 Studi Kasus

Sebuah perusahaan retail memiliki kebutuhan untuk mengelola data inventaris barang (item), kategori barang (category), dan transaksi masuk/keluar (transaction). Proses manual mulai tidak efisien karena meningkatnya volume data dan kebutuhan laporan cepat. Maka dibutuhkan sebuah sistem **Inventory Management** berbasis web menggunakan **Laravel 12 + Filament** untuk menyederhanakan proses pencatatan, pelacakan, dan analisis stok.

### 🧾 Fitur yang Dibangun
- CRUD untuk **Kategori Barang** (`categories`)
- CRUD untuk **Item / Produk** (`items`)
- CRUD untuk **Transaksi** masuk/keluar (`transactions`)
- Widget chart: status transaksi dan stok barang
- Analisis stok vs harga barang dalam **Bubble Chart**
- Riwayat aktivitas pengguna dengan **LatestAccessLogs**

---

## 📊 Struktur Data & Implementasi Konsep Struktur Data

| Konsep Struktur Data | Implementasi dalam Sistem                                    |
|----------------------|--------------------------------------------------------------|
| **Array**            | Data ditampilkan dalam bentuk tabel dan chart (JSON array)  |
| **Stack**            | Undo operasi terakhir menggunakan Laravel activity log (opsional) |
| **Queue**            | Antrian notifikasi transaksi (bisa dikembangkan dengan job queue) |
| **Tree**             | Kategori barang bisa dipecah menjadi struktur kategori–subkategori (extendable) |
| **Graph**            | Relasi antar item dan transaksi membentuk jaringan keterkaitan |
| **Search**           | Fitur pencarian data item/transaksi di dashboard Filament    |
| **MVC**              | Laravel menjalankan Model–View–Controller secara eksplisit   |

---

## 🧱 Struktur Tabel

### `categories`
- `id`
- `name`
- `created_at`, `updated_at`

### `items`
- `id`
- `name`
- `price`
- `stock`
- `category_id` (foreign key → `categories.id`)
- `created_at`, `updated_at`

### `transactions`
- `id`
- `item_id` (foreign key → `items.id`)
- `type` (enum: `in`, `out`)
- `quantity`
- `description`
- `created_at`, `updated_at`

---

## 🖼️ Contoh Widget

### 📈 Item Bubble Chart
Menampilkan hubungan antara harga dan stok barang, ukuran gelembung mencerminkan jumlah stok.

### 📊 Transaction Status Chart
Statistik jumlah transaksi masuk dan keluar dalam bentuk bar chart.

---

## 🧠 Analisis

Sistem ini menunjukkan bagaimana **struktur data dasar** digunakan secara praktis dalam manajemen inventaris. Array dan search digunakan dalam hampir semua tampilan. Stack dapat diterapkan dalam fitur undo log. Queue cocok untuk pengiriman notifikasi. Tree dan graph dapat dimanfaatkan untuk struktur kategori dan analisis hubungan antar entitas. MVC dipakai penuh oleh Laravel, dan pencarian efisien mendemonstrasikan konsep dasar algoritma search.

---

## 🚀 Tools & Framework
- Laravel 12
- Filament Admin Panel
- Laravel Eloquent ORM
- Filament Shield (hak akses)
- Chart.js via Filament Widgets
- Activitylog (Spatie)

---

## ✅ Kesimpulan

Proyek ini membuktikan bahwa konsep struktur data tidak hanya bersifat teoritis, tapi juga memiliki peran besar dalam sistem informasi nyata. Dengan hanya tiga tabel, kita dapat membangun sistem yang fleksibel, efisien, dan siap dikembangkan lebih lanjut.

