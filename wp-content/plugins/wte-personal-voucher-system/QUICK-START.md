# 🚀 QUICK START GUIDE
# WP Travel Engine - Personal Voucher System

## 📱 PANDUAN CEPAT 5 MENIT

### STEP 1: Install Plugin (2 menit)

```
┌─────────────────────────────────────────────┐
│  1. Upload ZIP ke WordPress                 │
│     Plugins → Add New → Upload Plugin       │
│                                             │
│  2. Activate Plugin                         │
│     ✅ WP Travel Engine harus sudah aktif   │
└─────────────────────────────────────────────┘
```

### STEP 2: Buat Voucher Personal (1 menit)

```
┌─────────────────────────────────────────────┐
│  WP Travel Engine → Coupons → Add New       │
│                                             │
│  📝 Title: "Voucher Selamat Datang"        │
│  🎫 Code: WELCOME2024                       │
│  💰 Discount: Rp 50.000                     │
│                                             │
│  ✅ Voucher Personal (centang)              │
│  ✅ Sekali pakai per akun (centang)         │
└─────────────────────────────────────────────┘
```

### STEP 3: Kirim Voucher (1 menit)

```
┌─────────────────────────────────────────────┐
│  Di Sidebar → Distribusi Voucher            │
│                                             │
│  OPSI A: Kirim ke User Tertentu             │
│  ┌────────────────────────────────┐        │
│  │ 🔍 Cari user...                │        │
│  │ ✓ John Doe (john@email.com)    │        │
│  └────────────────────────────────┘        │
│  [Kirim ke User Terpilih]                   │
│                                             │
│  OPSI B: Broadcast ke Semua                 │
│  [Broadcast ke Semua User]                  │
│  ⚠️  Konfirmasi diperlukan                  │
└─────────────────────────────────────────────┘
```

### STEP 4: User Menerima & Menggunakan (1 menit)

```
┌─────────────────────────────────────────────┐
│  USER DASHBOARD                             │
│                                             │
│  Dashboard → Voucher Saya                   │
│                                             │
│  ┏━━━━━━━━━━━━━━━━━━━━━━━━━━┓             │
│  ┃ Voucher Selamat Datang   ┃ [Aktif]     │
│  ┃ Diskon: Rp 50.000        ┃             │
│  ┃ Kode: WELCOME2024  [📋]  ┃             │
│  ┃                          ┃             │
│  ┃ [Gunakan Voucher]        ┃             │
│  ┗━━━━━━━━━━━━━━━━━━━━━━━━━━┛             │
│                                             │
│  👇 Saat booking trip:                      │
│  Masukkan kode → Diskon diterapkan! ✅      │
└─────────────────────────────────────────────┘
```

---

## 💡 USE CASES POPULER

### 1️⃣ Welcome Voucher (Voucher Selamat Datang)
```
Kirim otomatis ke new users
- Diskon: Rp 100.000
- Valid: 30 hari
- Sekali pakai
```

### 2️⃣ Birthday Voucher
```
Kirim di hari ulang tahun user
- Diskon: 20%
- Valid: 7 hari
- Personal
```

### 3️⃣ Flash Sale (Broadcast)
```
Promo terbatas untuk semua user
- Diskon: 15%
- Valid: 24 jam
- Broadcast semua user
```

### 4️⃣ Loyalty Reward
```
Untuk frequent bookers
- Diskon: Rp 200.000
- No expiry
- Kirim manual ke VIP users
```

### 5️⃣ Referral Bonus
```
Ketika user refer teman
- Diskon: Rp 50.000
- Valid: 90 hari
- Kirim ke referrer
```

---

## 📊 MONITORING & ANALYTICS

### Dashboard Statistik

```
┌─────────────────────────────────────────────┐
│  OVERVIEW (Real-time)                       │
│                                             │
│  📤 Total Voucher Dikirim:    1,234         │
│  ✅ Voucher Aktif:              856         │
│  ✔️  Voucher Digunakan:         378         │
│  📈 Conversion Rate:           30.6%        │
└─────────────────────────────────────────────┘
```

### Lihat Detail History

```
WP Travel Engine → Coupons → History Voucher

Filter by:
- Status: [Aktif ▼]
- Voucher: [All ▼]
- Search: [🔍 user/kode]

Export data → CSV/Excel
```

---

## 🎯 TIPS PRO

### ✅ DO's

1. **Test sebelum broadcast**
   - Kirim ke test user dulu
   - Verifikasi email terkirim
   - Test voucher bisa digunakan

2. **Timing yang tepat**
   - Weekday pagi (10-11 AM)
   - Weekend sore (3-5 PM)
   - Hindari tengah malam

3. **Segmentasi user**
   - VIP users → Diskon lebih besar
   - New users → Welcome bonus
   - Inactive users → Re-engagement

4. **Monitor performance**
   - Cek conversion rate
   - Track redemption rate
   - Analyze popular vouchers

### ❌ DON'Ts

1. **Jangan spam broadcast**
   - Max 1x per minggu
   - Pastikan value jelas

2. **Jangan buat terlalu complicated**
   - Terms & conditions simpel
   - Syarat penggunaan jelas

3. **Jangan lupa expire date**
   - Buat sense of urgency
   - Encourage immediate use

---

## 🔥 WORKFLOW OTOMATIS

### Setup Email Notification Template

Edit di plugin file atau gunakan hook:

```php
// Customize email template
add_filter('wte_pv_voucher_email_message', function($message, $user_id, $coupon_id) {
    $user = get_userdata($user_id);
    
    $custom_message = "
    Halo {$user->display_name}! 🎉
    
    Selamat! Anda mendapat voucher spesial:
    
    🎫 Kode: {voucher_code}
    💰 Diskon: {discount_amount}
    ⏰ Berlaku hingga: {expiry_date}
    
    Gunakan sekarang dan nikmati petualangan Anda!
    
    [Gunakan Voucher Sekarang]
    
    Terima kasih,
    Tim {site_name}
    ";
    
    return $custom_message;
}, 10, 3);
```

### Integrasi dengan Automation

```php
// Auto-send welcome voucher on registration
add_action('user_register', function($user_id) {
    // Get welcome voucher
    $coupon_id = 123; // Your welcome voucher ID
    
    // Send to new user
    global $wpdb;
    $wpdb->insert(
        $wpdb->prefix . 'wte_user_vouchers',
        array(
            'user_id' => $user_id,
            'coupon_id' => $coupon_id,
            'coupon_code' => 'WELCOME2024',
            'status' => 'active',
            'assigned_date' => current_time('mysql')
        )
    );
});
```

---

## 📞 NEED HELP?

### Dokumentasi Lengkap
📖 Baca `README.md` untuk detail lengkap

### Instalasi Bermasalah?
🔧 Baca `INSTALASI.md` untuk troubleshooting

### Custom Development
💻 Contact: support@balitopholiday.com

---

## ⭐ CHECKLIST SUKSES

Setelah setup, pastikan:

- [ ] ✅ Voucher bisa dikirim ke user tertentu
- [ ] ✅ Broadcast berfungsi normal
- [ ] ✅ Email notifikasi terkirim
- [ ] ✅ User bisa lihat voucher di dashboard
- [ ] ✅ Voucher bisa digunakan saat checkout
- [ ] ✅ History tercatat dengan baik
- [ ] ✅ Statistik update real-time

---

**🎉 SELAMAT! Sistem Voucher Personal Anda Sudah Siap!**

Mulai tingkatkan engagement dan conversion dengan voucher personal yang powerful! 🚀
