# PANDUAN INSTALASI
# WP Travel Engine - Personal Voucher System

## 📦 LANGKAH 1: PERSIAPAN FILE

### 1.1. Ekstrak File Plugin
Anda akan memiliki folder dengan struktur seperti ini:

```
wte-personal-voucher-system/
├── wte-personal-voucher-system.php
├── assets/
│   ├── css/
│   │   └── admin.css
│   └── js/
│       └── admin.js
├── templates/
│   └── user-vouchers.php
├── includes/
│   └── admin-history-page.php
├── README.md
└── INSTALASI.md (file ini)
```

### 1.2. Verifikasi File
Pastikan semua file ada dengan lengkap sesuai struktur di atas.

---

## 🖥️ LANGKAH 2: UPLOAD KE WORDPRESS

### Via FTP/File Manager

1. **Login ke cPanel atau FTP Server Anda**

2. **Navigate ke folder plugins**
   ```
   /public_html/wp-content/plugins/
   ```
   atau
   ```
   /home/username/public_html/wp-content/plugins/
   ```

3. **Upload Folder Plugin**
   - Upload seluruh folder `wte-personal-voucher-system`
   - Pastikan struktur folder tetap sama
   - Tunggu hingga upload selesai

4. **Verifikasi Upload**
   - Pastikan path akhir adalah:
     ```
     /wp-content/plugins/wte-personal-voucher-system/wte-personal-voucher-system.php
     ```

### Via WordPress Admin (ZIP Upload)

1. **Compress Folder ke ZIP**
   - Compress folder `wte-personal-voucher-system` menjadi `wte-personal-voucher-system.zip`
   - Pastikan file plugin utama ada di root ZIP (bukan dalam subfolder lagi)

2. **Upload via WordPress**
   - Login ke WordPress Admin
   - Pergi ke **Plugins → Add New**
   - Klik **Upload Plugin**
   - Pilih file ZIP
   - Klik **Install Now**

---

## ✅ LANGKAH 3: AKTIVASI PLUGIN

### 3.1. Cek Dependensi
Sebelum aktivasi, pastikan:
- ✅ **WP Travel Engine** sudah terinstal dan aktif
- ✅ WordPress versi 5.9 atau lebih tinggi
- ✅ PHP versi 7.4 atau lebih tinggi

### 3.2. Aktifkan Plugin
1. Pergi ke **Plugins → Installed Plugins**
2. Cari **WP Travel Engine - Personal Voucher System**
3. Klik **Activate**

### 3.3. Verifikasi Aktivasi
Setelah aktivasi, cek:
1. ✅ Tidak ada error message
2. ✅ Menu baru muncul: **WP Travel Engine → Coupons → History Voucher**
3. ✅ Di edit coupon, ada meta box baru: **Distribusi Voucher** dan **Penggunaan Voucher**

---

## 🔧 LANGKAH 4: KONFIGURASI AWAL

### 4.1. Cek Database
Plugin otomatis membuat tabel `wp_wte_user_vouchers`.

**Cara Verifikasi:**
- Via phpMyAdmin: Cek apakah tabel sudah ada
- Via WordPress: Plugin akan berfungsi normal jika tabel berhasil dibuat

### 4.2. Test Voucher

#### Test 1: Buat Voucher Personal
1. Pergi ke **WP Travel Engine → Coupons → Add New**
2. Isi:
   - **Title**: Test Voucher
   - **Coupon Code**: TEST123
   - **Discount Type**: Fixed atau Percentage
   - **Discount Value**: 10000 atau 10%
3. Di sidebar **Distribusi Voucher**:
   - ✅ Centang **Voucher Personal**
   - ✅ Centang **Sekali pakai per akun**
4. Klik **Publish**

#### Test 2: Kirim ke User
1. Di halaman edit voucher yang sama
2. Di **Distribusi Voucher**:
   - Ketik nama/email user di search box
   - Pilih satu user
   - Klik **Kirim ke User Terpilih**
3. Cek:
   - ✅ Muncul pesan sukses
   - ✅ Statistik di **Penggunaan Voucher** bertambah
   - ✅ User menerima email

#### Test 3: User Dashboard
1. Login sebagai user yang menerima voucher
2. Pergi ke **Dashboard → My Account**
3. Klik tab **Voucher Saya**
4. Cek:
   - ✅ Voucher muncul di list
   - ✅ Kode bisa dicopy
   - ✅ Detail diskon tampil

#### Test 4: Gunakan Voucher
1. Masih sebagai user, pilih trip
2. Proceed to checkout
3. Masukkan kode voucher
4. Cek:
   - ✅ Diskon diterapkan
   - ✅ Setelah booking, voucher status jadi "Digunakan"

---

## 🚨 TROUBLESHOOTING

### Problem 1: Plugin tidak muncul di list plugins
**Penyebab**: File tidak diupload dengan benar
**Solusi**:
1. Cek struktur folder:
   ```
   /wp-content/plugins/wte-personal-voucher-system/
   ```
2. Pastikan file utama ada:
   ```
   /wp-content/plugins/wte-personal-voucher-system/wte-personal-voucher-system.php
   ```
3. Cek file header plugin di baris 2-15

### Problem 2: Error saat aktivasi: "WP Travel Engine diperlukan"
**Penyebab**: WP Travel Engine belum terinstal/aktif
**Solusi**:
1. Install WP Travel Engine terlebih dahulu:
   - **Plugins → Add New**
   - Search "WP Travel Engine"
   - Install & Activate
2. Kemudian aktivasi plugin ini

### Problem 3: Meta box tidak muncul di edit coupon
**Penyebab**: JavaScript/CSS tidak load
**Solusi**:
1. Hard refresh browser (Ctrl+F5)
2. Clear WordPress cache
3. Cek file di `/assets/css/` dan `/assets/js/` sudah terupload

### Problem 4: AJAX error saat kirim voucher
**Penyebab**: Permission atau AJAX issue
**Solusi**:
1. Pastikan Anda login sebagai Administrator
2. Clear browser cache
3. Check browser console untuk error detail
4. Pastikan tidak ada plugin conflict

### Problem 5: Email tidak terkirim
**Penyebab**: WordPress email tidak dikonfigurasi
**Solusi**:
1. Install plugin SMTP (contoh: WP Mail SMTP)
2. Konfigurasi SMTP settings
3. Test email via plugin SMTP
4. Cek spam folder

### Problem 6: Voucher tidak muncul di dashboard user
**Penyebab**: Template file tidak load atau user tidak memiliki voucher
**Solusi**:
1. Pastikan file `/templates/user-vouchers.php` ada
2. Pastikan voucher sudah dikirim ke user (cek database)
3. User harus login untuk melihat voucher
4. Clear WordPress cache

### Problem 7: Database error
**Penyebab**: Tabel tidak dibuat atau permission issue
**Solusi**:
1. Deactivate dan Reactivate plugin
2. Cek database prefix (default: wp_)
3. Manual create table via phpMyAdmin:
   ```sql
   CREATE TABLE IF NOT EXISTS `wp_wte_user_vouchers` (
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
       PRIMARY KEY (id),
       KEY user_id (user_id),
       KEY coupon_id (coupon_id),
       KEY status (status)
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
   ```

---

## 📞 SUPPORT

Jika masih mengalami masalah setelah mengikuti troubleshooting:

1. **Cek System Requirements:**
   - WordPress 5.9+
   - PHP 7.4+
   - WP Travel Engine plugin active

2. **Enable Debug Mode:**
   Edit `wp-config.php`:
   ```php
   define('WP_DEBUG', true);
   define('WP_DEBUG_LOG', true);
   define('WP_DEBUG_DISPLAY', false);
   ```
   Check `/wp-content/debug.log` untuk error details

3. **Disable Other Plugins:**
   Test dengan disable semua plugin lain, lalu enable satu-satu

4. **Check Theme Compatibility:**
   Switch ke default WordPress theme (Twenty Twenty-Four) untuk test

5. **Contact Support:**
   - Email: support@balitopholiday.com
   - Website: https://balitopholiday.com/support
   - Sertakan:
     - WordPress version
     - PHP version
     - WP Travel Engine version
     - Error message
     - Screenshot

---

## ✅ CHECKLIST INSTALASI SUKSES

Gunakan checklist ini untuk memastikan instalasi berhasil:

- [ ] WP Travel Engine sudah aktif
- [ ] Plugin berhasil diupload
- [ ] Plugin berhasil diaktivasi tanpa error
- [ ] Menu "History Voucher" muncul
- [ ] Meta box muncul di edit coupon
- [ ] Bisa membuat voucher personal
- [ ] Bisa mengirim voucher ke user
- [ ] User menerima email notifikasi
- [ ] Voucher muncul di dashboard user
- [ ] User bisa menggunakan voucher saat booking
- [ ] History voucher berfungsi
- [ ] Statistik tampil dengan benar

Jika semua checklist di atas ✅, instalasi Anda **SUKSES**! 🎉

---

**Selamat menggunakan WP Travel Engine - Personal Voucher System!**

Untuk panduan penggunaan lengkap, baca file `README.md`.
