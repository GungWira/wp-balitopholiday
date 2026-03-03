# CHANGELOG
# WP Travel Engine - Personal Voucher System

## Version 1.1.0 (2026-02-02) - FIXED VERSION

### 🐛 **Bug Fixes**

1. **Fixed Broadcast User Selection**
   - SEBELUM: Broadcast hanya mengambil sebagian user (ada filter role yang salah)
   - SESUDAH: Broadcast mengambil SEMUA user terdaftar tanpa kecuali
   - Impact: Semua user sekarang bisa menerima voucher saat broadcast

2. **Fixed Duplicate Check Logic**
   - SEBELUM: Selalu skip user yang sudah punya voucher aktif
   - SESUDAH: Tambah checkbox "Izinkan kirim ulang" untuk kontrol duplicate
   - Impact: Admin punya kontrol penuh untuk kirim voucher berkali-kali ke user yang sama

3. **Fixed Search User Bug**
   - SEBELUM: 
     * Huruf yang diketik tidak muncul di input field
     * Hasil search tidak akurat (tampil meskipun tidak match)
     * Search results di-cache jadi muncul terus
   - SESUDAH:
     * Input field normal, huruf muncul saat diketik
     * Search menggunakan direct SQL query yang lebih akurat
     * Cache disabled, hasil selalu fresh
     * Minimum 2 karakter validasi di server-side
   - Impact: Pencarian user jadi akurat dan responsive

4. **Fixed Error Messages**
   - SEBELUM: "Terjadi kesalahan" tanpa detail
   - SESUDAH: "Terkirim ke X user (skip Y user yang sudah punya)"
   - Impact: Admin tau persis berapa user yang dapat dan berapa yang di-skip

### ✨ **New Features**

1. **Checkbox "Izinkan Kirim Ulang"**
   - Biarkan user menerima voucher yang sama >1x
   - Berguna untuk loyalty program atau campaign recurring

2. **Better Response Messages**
   - Pesan sukses yang informatif dengan detail
   - Error message yang jelas

3. **Improved Search**
   - Cache disabled untuk hasil yang selalu fresh
   - SQL query lebih akurat dengan LIKE pattern
   - Validasi minimum 2 karakter di server

4. **Enhanced History Page**
   - Quick stats di atas (Total/Aktif/Digunakan)
   - Filter yang lebih baik
   - UI yang lebih clean

### 🔧 **Technical Improvements**

1. **AJAX Search Optimization**
   - Delay 300ms untuk mengurangi request
   - Cache disabled
   - Direct SQL query untuk akurasi

2. **Database Query Optimization**
   - Added composite index `user_coupon` untuk faster lookup
   - Better prepared statements

3. **Code Quality**
   - Better error handling
   - More descriptive variable names
   - Improved code comments

### 📝 **Documentation Updates**

1. Updated README.md with bug fix notes
2. Updated INSTALASI.md dengan troubleshooting baru
3. Added CHANGELOG.md (file ini)

---

## Version 1.0.2 (2026-02-01)

### Initial Release Features

- ✅ Voucher personal system
- ✅ Kirim ke user tertentu
- ✅ Broadcast ke semua user
- ✅ Email notifications
- ✅ User dashboard untuk voucher
- ✅ Admin history page
- ✅ Statistik real-time

---

## Upgrade Instructions

### Dari Version 1.0.x ke 1.1.0:

**METHOD 1: Replace File (Recommended)**
1. Backup file lama: `/wp-content/plugins/wte-personal-voucher-system/wte-personal-voucher-system.php`
2. Download ZIP versi 1.1.0
3. Extract dan replace semua file
4. Tidak perlu deactivate/reactivate plugin

**METHOD 2: Full Reinstall**
1. Deactivate plugin lama
2. Delete plugin lama (data di database tidak akan hilang)
3. Upload dan activate plugin versi 1.1.0

**Data Safety:**
- Semua data voucher di database AMAN
- Tidak ada perubahan struktur database
- Upgrade bisa dilakukan tanpa kehilangan data

---

## Breaking Changes

TIDAK ADA breaking changes. Version 1.1.0 100% backward compatible dengan 1.0.x.

---

## Known Issues

TIDAK ADA known issues di version 1.1.0.

Semua bug dari version 1.0.x sudah diperbaiki.

---

## Testing Checklist

Sebelum release, semua item ini sudah di-test:

- [x] Search user dengan berbagai keyword
- [x] Kirim voucher ke user tertentu
- [x] Broadcast ke semua user (>5 users)
- [x] Checkbox "Izinkan kirim ulang" berfungsi
- [x] Duplicate check bekerja dengan benar
- [x] Email notification terkirim
- [x] History page menampilkan data dengan akurat
- [x] Statistik update real-time
- [x] Compatible dengan WP Travel Engine latest version

---

## Support

Jika ada pertanyaan atau menemukan bug:
- Email: support@balitopholiday.com
- Include: WordPress version, PHP version, WP Travel Engine version, screenshot error

---

**Thank you for using WP Travel Engine - Personal Voucher System!** 🎉
