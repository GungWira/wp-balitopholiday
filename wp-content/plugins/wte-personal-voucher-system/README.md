# WP Travel Engine - Personal Voucher System

Plugin WordPress yang mengubah sistem coupon WP Travel Engine menjadi sistem voucher personal seperti Shopee, di mana admin dapat mengirim voucher ke user tertentu atau broadcast ke semua user.

## 📋 Fitur Utama

### 1. Voucher Personal
- **Voucher Eksklusif**: Admin dapat menandai voucher sebagai "personal" yang tidak bisa digunakan dengan memasukkan kode manual
- **Sekali Pakai**: Opsi untuk membuat voucher yang hanya bisa digunakan sekali per akun
- **Kontrol Penggunaan**: Atur maksimal penggunaan per user

### 2. Distribusi Voucher

#### Kirim ke User Tertentu
- Pilih user secara spesifik menggunakan pencarian dengan Select2
- Cari berdasarkan nama, email, atau username
- Kirim voucher ke beberapa user sekaligus

#### Broadcast ke Semua User
- Kirim voucher ke semua user terdaftar dengan satu klik
- Otomatis mengecualikan administrator
- Konfirmasi sebelum broadcast untuk menghindari kesalahan

### 3. Notifikasi Email
- Email otomatis dikirim ke user saat menerima voucher
- Template email yang informatif dengan detail voucher
- Kustomisasi pesan email sesuai kebutuhan

### 4. Dashboard User
- Tab khusus "Voucher Saya" di dashboard user
- Tampilan voucher yang menarik dengan informasi lengkap:
  - Kode voucher
  - Besar diskon (persentase atau nominal)
  - Tanggal berlaku
  - Status (Aktif/Digunakan/Kadaluarsa)
- Tombol copy kode voucher
- Riwayat penggunaan voucher

### 5. Admin Management
- Meta box di halaman edit coupon untuk distribusi
- Statistik real-time:
  - Total voucher dikirim
  - Voucher aktif
  - Voucher sudah digunakan
- Halaman history lengkap dengan filter dan pencarian
- Tracking siapa yang mengirim voucher

## 🚀 Instalasi

### Persyaratan
- WordPress 5.9 atau lebih tinggi
- PHP 7.4 atau lebih tinggi
- **WP Travel Engine** plugin harus sudah terinstal dan aktif

### Langkah Instalasi

1. **Upload Plugin**
   ```
   wp-content/plugins/wte-personal-voucher-system/
   ```

2. **Struktur File yang Benar**
   ```
   wte-personal-voucher-system/
   ├── wte-personal-voucher-system.php (file utama)
   ├── assets/
   │   ├── css/
   │   │   └── admin.css
   │   └── js/
   │       └── admin.js
   ├── templates/
   │   └── user-vouchers.php
   ├── includes/
   │   └── admin-history-page.php
   └── README.md
   ```

3. **Aktifkan Plugin**
   - Masuk ke WordPress Admin → Plugins
   - Cari "WP Travel Engine - Personal Voucher System"
   - Klik "Activate"

4. **Verifikasi Instalasi**
   - Database table `wp_wte_user_vouchers` akan otomatis dibuat
   - Menu "History Voucher" akan muncul di submenu WP Travel Engine Coupons

## 📖 Cara Menggunakan

### A. Membuat Voucher Personal

1. **Buat/Edit Coupon**
   - Pergi ke WP Travel Engine → Coupons → Add New
   - Isi detail voucher seperti biasa (nama, kode, diskon, dll)

2. **Aktifkan Fitur Personal**
   - Di sidebar kanan, lihat meta box "Distribusi Voucher"
   - Centang "Voucher Personal" untuk mencegah penggunaan dengan kode manual
   - Centang "Sekali pakai per akun" jika voucher hanya bisa digunakan satu kali
   - Atur "Maksimal penggunaan per user" sesuai kebutuhan

3. **Simpan Voucher**
   - Klik "Publish" atau "Update"

### B. Mengirim Voucher ke User Tertentu

1. **Pilih User**
   - Di meta box "Distribusi Voucher"
   - Klik pada dropdown "Cari dan pilih user..."
   - Ketik nama/email user (minimal 2 karakter)
   - Pilih user dari hasil pencarian
   - Bisa pilih multiple users

2. **Kirim Voucher**
   - Klik tombol "Kirim ke User Terpilih"
   - Konfirmasi pengiriman
   - User akan menerima email notifikasi

### C. Broadcast Voucher ke Semua User

1. **Klik Tombol Broadcast**
   - Di meta box "Distribusi Voucher"
   - Klik "Broadcast ke Semua User"

2. **Konfirmasi**
   - Sistem akan menampilkan dialog konfirmasi
   - Pastikan voucher sudah benar sebelum broadcast

3. **Proses Pengiriman**
   - Plugin akan mengirim voucher ke semua user aktif
   - Email notifikasi dikirim ke setiap user
   - Administrator dikecualikan dari broadcast

### D. Melihat History dan Statistik

1. **Statistik di Edit Coupon**
   - Buka halaman edit coupon
   - Lihat meta box "Penggunaan Voucher" untuk statistik singkat

2. **History Detail**
   - Pergi ke WP Travel Engine → Coupons → History Voucher
   - Filter berdasarkan:
     - Status (Aktif/Digunakan)
     - Voucher tertentu
     - Pencarian user atau kode
   - Export data jika diperlukan

### E. User Menggunakan Voucher

1. **User Login**
   - User harus login terlebih dahulu
   - Pergi ke Dashboard → Voucher Saya

2. **Lihat Voucher**
   - Semua voucher aktif ditampilkan
   - Klik tombol copy untuk menyalin kode
   - Lihat detail diskon dan masa berlaku

3. **Gunakan saat Booking**
   - Pilih trip yang ingin dibooking
   - Di halaman checkout, masukkan kode voucher
   - Diskon akan otomatis diterapkan
   - Voucher akan ditandai sebagai "Digunakan"

## 🔧 Customization

### 1. Mengubah Template Email

Edit function `send_voucher_email()` di file plugin utama:

```php
private function send_voucher_email($user_id, $coupon_id, $coupon_code) {
    // Customize email content here
}
```

### 2. Menambah Kondisi Filter User

Modifikasi query di function `ajax_broadcast_voucher()`:

```php
$users = get_users(array(
    'role__not_in' => array('administrator'),
    'meta_key' => 'your_custom_meta',
    'meta_value' => 'your_value',
    'fields' => 'ID'
));
```

### 3. Styling Voucher Card

Edit file `/templates/user-vouchers.php` di bagian `<style>` untuk mengubah tampilan voucher.

### 4. Hooks dan Filters

Plugin ini menyediakan beberapa hooks untuk customization:

**Actions:**
```php
// Setelah voucher dikirim
do_action('wte_pv_after_voucher_sent', $user_id, $coupon_id, $voucher_id);

// Setelah voucher digunakan
do_action('wte_pv_after_voucher_used', $user_id, $coupon_id, $booking_id);
```

**Filters:**
```php
// Filter email subject
apply_filters('wte_pv_voucher_email_subject', $subject, $user_id, $coupon_id);

// Filter email message
apply_filters('wte_pv_voucher_email_message', $message, $user_id, $coupon_id);

// Filter broadcast user list
apply_filters('wte_pv_broadcast_users', $users);
```

## 📊 Database Schema

Plugin membuat satu tabel custom: `wp_wte_user_vouchers`

```sql
CREATE TABLE wp_wte_user_vouchers (
    id bigint(20) NOT NULL AUTO_INCREMENT,
    user_id bigint(20) NOT NULL,
    coupon_id bigint(20) NOT NULL,
    coupon_code varchar(100) NOT NULL,
    status varchar(20) NOT NULL DEFAULT 'active',
    assigned_date datetime NOT NULL,
    used_date datetime DEFAULT NULL,
    booking_id bigint(20) DEFAULT NULL,
    sent_by bigint(20) DEFAULT NULL,
    notes text,
    PRIMARY KEY (id)
);
```

## 🔒 Security

- Semua input disanitize dan divalidasi
- AJAX requests menggunakan nonce verification
- Capability checks untuk semua admin functions
- SQL queries menggunakan prepared statements
- XSS protection di semua output

## 🐛 Troubleshooting

### Plugin tidak aktif setelah diupload
**Solusi**: Pastikan WP Travel Engine sudah terinstal dan aktif terlebih dahulu.

### Voucher tidak muncul di dashboard user
**Solusi**: 
1. Pastikan user sudah login
2. Cek apakah voucher sudah dikirim ke user tersebut
3. Verifikasi database table `wp_wte_user_vouchers`

### Email notifikasi tidak terkirim
**Solusi**:
1. Cek konfigurasi email server WordPress
2. Install plugin SMTP seperti WP Mail SMTP
3. Cek spam folder

### Voucher tidak bisa digunakan saat checkout
**Solusi**:
1. Pastikan voucher statusnya "active"
2. Cek masa berlaku voucher
3. Pastikan user sudah login
4. Verifikasi voucher ada di dashboard user

## 💡 Tips dan Best Practices

1. **Gunakan Voucher Personal untuk Campaign Khusus**
   - Birthday vouchers
   - Loyalty rewards
   - Referral bonuses

2. **Broadcast dengan Hati-hati**
   - Double-check detail voucher sebelum broadcast
   - Pilih waktu yang tepat (misalnya saat promo)
   - Jangan terlalu sering agar tidak spam

3. **Monitor Penggunaan**
   - Cek history voucher secara berkala
   - Analisa voucher mana yang paling efektif
   - Adjust strategi diskon berdasarkan data

4. **Email Notification**
   - Customize email template agar menarik
   - Sertakan call-to-action yang jelas
   - Test email sebelum broadcast besar

## 📝 Changelog

### Version 1.0.0
- Initial release
- Fitur voucher personal
- Kirim ke user tertentu
- Broadcast ke semua user
- Dashboard user untuk voucher
- Email notifications
- History dan statistik lengkap

## 👨‍💻 Developer

**Bali Top Holiday**
- Website: https://balitopholiday.com
- Email: support@balitopholiday.com

## 📄 License

GPL v2 or later

## 🤝 Support

Untuk pertanyaan, bug reports, atau feature requests, silakan hubungi:
- Email: support@balitopholiday.com
- Website: https://balitopholiday.com/support

---

**Catatan**: Plugin ini adalah extension untuk WP Travel Engine dan memerlukan WP Travel Engine plugin untuk berfungsi dengan baik.
