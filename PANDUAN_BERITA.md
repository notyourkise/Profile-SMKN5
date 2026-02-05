# 📖 Panduan Lengkap: Mengelola Berita di Admin Panel SMKN 5 Samarinda

---

## 🎯 Untuk Siapa Panduan Ini?

Panduan ini ditujukan untuk **Admin**, **Redaktur**, dan **Jurnalis** yang mengelola konten berita di website SMKN 5 Samarinda.

---

## 🔐 Hak Akses Berdasarkan Role

### 👤 **Jurnalis**
- ✅ Membuat berita baru
- ✅ Mengedit berita sendiri (hanya yang status Draft atau Review)
- ✅ Mengubah status: Draft → Review
- ❌ **TIDAK BISA** langsung publish berita
- 📊 **Melihat:** Hanya berita yang dibuat sendiri

### 👨‍💼 **Redaktur**
- ✅ Membuat berita baru
- ✅ Mengedit semua berita
- ✅ Mereview berita dari Jurnalis
- ✅ Publish berita ke website
- ✅ Menandai berita sebagai Featured
- 📊 **Melihat:** Berita dengan status Review dan Published (TIDAK melihat Draft Jurnalis)

### 👑 **Admin**
- ✅ Full akses ke semua fitur
- ✅ Mengelola semua berita
- ✅ Mengelola user dan role
- 📊 **Melihat:** Semua berita dengan status apapun

---

## 📝 Cara Membuat Berita Baru

### **Langkah 1: Akses Menu Berita**
1. Login ke Admin Panel: `http://yoursite.com/admin`
2. Klik menu **"Berita"** di sidebar kiri
3. Klik tombol **"New Berita"** (hijau, pojok kanan atas)

### **Langkah 2: Isi Informasi Berita**

#### **📌 Judul Berita**
- **Apa yang harus diisi:** Judul yang menarik dan deskriptif
- **Contoh BAIK:** 
  - ✅ "Siswa SMKN 5 Raih Juara 1 Lomba Robotika Tingkat Nasional 2026"
  - ✅ "Kunjungan Industri Jurusan TJKT ke Google Indonesia"
- **Contoh BURUK:**
  - ❌ "Lomba" (terlalu singkat)
  - ❌ "siswa menang lomba" (tidak deskriptif)
- **Tips:**
  - Maksimal 255 karakter
  - Gunakan huruf kapital di awal kata penting
  - Sertakan tahun jika relevan

#### **📄 Konten Berita**
- **Struktur yang baik:**
  1. **Paragraf 1:** Ringkasan singkat (Who, What, When, Where)
  2. **Paragraf 2-3:** Detail kejadian/informasi
  3. **Paragraf akhir:** Kesimpulan atau rencana ke depan
- **Panjang:** Minimal 200 karakter (idealnya 300-500 kata)
- **Format:**
  - Gunakan toolbar untuk **Bold**, *Italic*, atau Underline
  - Bisa insert link dengan tombol 🔗
  - Bisa upload gambar tambahan langsung di konten

---

## 🖼️ Panduan Upload Gambar Utama

### **📐 Rekomendasi Ukuran**

| Tipe Berita | Ukuran Ideal | Rasio | Keterangan |
|-------------|--------------|-------|------------|
| **Card Kecil** (List Berita) | 1200x800px | 3:2 atau 4:3 | Ditampilkan di daftar berita |
| **Card Featured** (Berita Utama) | 1920x1080px | 16:9 | Ditampilkan di slider homepage |
| **Minimum** | 800x600px | - | Ukuran minimal yang diterima |
| **Maksimum** | 1920x1200px | - | Ukuran maksimal recommended |

### **📁 Spesifikasi File**

```
✅ Format Diterima: JPG, PNG, WebP
✅ Ukuran File Maksimal: 2MB (2048KB)
✅ Resolusi Minimum: 800x600px
✅ Resolusi Recommended: 1200x800px (normal) atau 1920x1080px (featured)
```

### **💡 Tips Memilih Gambar**

**DO (Lakukan):**
- ✅ Pilih gambar terang dan berkualitas tinggi
- ✅ Pastikan objek utama berada di tengah
- ✅ Gunakan foto horizontal (landscape)
- ✅ Compress gambar jika ukuran >2MB (gunakan tool seperti TinyPNG)
- ✅ Gunakan foto beresolusi tinggi (jangan blur)

**DON'T (Hindari):**
- ❌ Gambar blur atau pecah
- ❌ Gambar terlalu gelap
- ❌ Gambar dengan watermark besar
- ❌ Screenshot dengan UI/browser bar
- ❌ Gambar portrait (vertikal) untuk berita utama

### **🛠️ Tools Recommended untuk Edit/Compress Gambar**
- **Compress:** [TinyPNG](https://tinypng.com) - Kurangi ukuran file tanpa kehilangan kualitas
- **Resize:** [ILoveIMG](https://www.iloveimg.com/resize-image) - Ubah ukuran gambar
- **Crop:** Gunakan Image Editor bawaan Filament (klik tombol ✂️ setelah upload)

---

## 🚀 Status Berita & Workflow

### **Untuk Jurnalis:**

```
📝 DRAFT
└─> Berita disimpan tapi belum dikirim
    • Hanya Anda yang bisa lihat
    • Bisa diedit kapan saja
    • Tidak terlihat oleh Redaktur

📤 REVIEW
└─> Berita dikirim ke Redaktur untuk ditinjau
    • Redaktur bisa lihat dan review
    • Masih bisa diedit oleh Anda
    • Menunggu persetujuan Redaktur
    
⚠️ Anda TIDAK BISA langsung publish
```

**Workflow Jurnalis:**
```
1. Buat berita → Pilih status "Draft"
2. Lengkapi semua isi → Save
3. Review kembali → Jika sudah OK
4. Edit berita → Ubah status ke "Review"
5. Save → Berita terkirim ke Redaktur
6. Tunggu persetujuan
```

### **Untuk Redaktur:**

```
🔍 REVIEW
└─> Berita dari Jurnalis yang perlu ditinjau
    • Baca dan periksa isinya
    • Edit jika ada yang perlu diperbaiki
    • Ubah ke "Published" jika sudah OK

✅ PUBLISHED
└─> Berita langsung tayang di website
    • Bisa dilihat oleh publik
    • Masih bisa diedit jika perlu
```

**Workflow Redaktur:**
```
1. Cek menu Berita → Filter "Review"
2. Baca berita dari Jurnalis
3. Jika perlu edit → Klik Edit → Perbaiki
4. Jika sudah OK → Ubah status ke "Published"
5. Set tanggal publish (opsional)
6. Centang "Featured" jika berita penting
7. Save → Berita langsung tayang
```

---

## ⭐ Berita Featured (Utama)

### **Apa itu Berita Featured?**
Berita yang ditampilkan di **slider utama homepage** dengan ukuran besar dan posisi prioritas.

### **Karakteristik:**
- 🌟 Hanya **1 berita** yang bisa featured (yang lain otomatis non-featured)
- 📸 Menggunakan gambar ukuran besar (1920x1080px recommended)
- 🎯 Posisi paling menonjol di homepage
- 📊 Hanya Admin dan Redaktur yang bisa set featured

### **Kapan Menggunakan Featured?**
- ✅ Berita paling penting/terbaru (contoh: Kelulusan 100%, Juara Nasional)
- ✅ Pengumuman penting (Pendaftaran Siswa Baru)
- ✅ Event besar sekolah
- ❌ Berita biasa/rutin

### **Cara Set Featured:**
1. Edit berita yang ingin dijadikan featured
2. Scroll ke bawah bagian **"Status & Publikasi"**
3. Aktifkan toggle **"⭐ Berita Utama (Featured)"**
4. Save
5. ⚠️ Berita featured sebelumnya akan otomatis non-featured

---

## 📅 Penjadwalan Berita (Admin & Redaktur)

Anda bisa mengatur tanggal & waktu publish spesifik:

**Cara Menggunakan:**
1. Edit berita
2. Bagian "Tanggal & Waktu Publish" → Pilih tanggal
3. Contoh: Set tanggal 10 Februari 2026, 08:00
4. Save
5. Berita akan menampilkan tanggal tersebut sebagai tanggal publish

**Catatan:**
- Jika dikosongkan → Otomatis pakai waktu saat ini
- Tidak ada auto-scheduling (berita tetap harus status "Published")

---

## ❓ FAQ (Frequently Asked Questions)

### **Q: Kenapa saya tidak bisa publish berita sebagai Jurnalis?**
A: Workflow sistem mengharuskan berita Jurnalis direview oleh Redaktur terlebih dahulu. Ubah status ke "Review", lalu Redaktur yang akan publish.

### **Q: Kenapa gambar saya tidak bisa diupload?**
A: Cek:
- Apakah ukuran file >2MB? → Compress dulu
- Apakah format bukan JPG/PNG/WebP? → Convert dulu
- Pastikan koneksi internet stabil

### **Q: Berita saya tidak muncul di website?**
A: Pastikan status sudah **"Published"**, bukan Draft atau Review. Hanya berita Published yang tampil di website publik.

### **Q: Bagaimana cara mengedit berita yang sudah publish?**
A: Jurnalis tidak bisa edit berita yang sudah published. Hubungi Redaktur atau Admin untuk edit.

### **Q: Berapa lama berita akan tampil di homepage?**
A: Berita terbaru (published) akan tampil di list berita. Untuk featured, akan tampil sampai ada berita lain yang dijadikan featured.

### **Q: Bisa hapus berita tidak?**
A: 
- **Jurnalis:** Bisa hapus berita sendiri yang masih Draft/Review
- **Redaktur & Admin:** Bisa hapus semua berita

### **Q: Kenapa Redaktur tidak bisa lihat draft saya?**
A: Fitur ini disengaja. Redaktur hanya melihat berita yang sudah dikirim untuk review (status "Review") atau yang sudah published. Draft tetap privat untuk Jurnalis.

---

## 🎓 Best Practices (Praktek Terbaik)

### **Untuk Semua User:**
1. ✅ **Tulis judul yang SEO-friendly** (mengandung kata kunci penting)
2. ✅ **Proofread sebelum publish** (cek typo dan grammar)
3. ✅ **Gunakan gambar berkualitas tinggi**
4. ✅ **Isi konten minimal 300 kata** untuk artikel yang baik
5. ✅ **Gunakan formatting** (bold untuk poin penting, italic untuk kutipan)

### **Untuk Jurnalis:**
1. 📝 Save sebagai **Draft** dulu saat mulai menulis
2. 🔍 Review ulang sebelum kirim ke Redaktur
3. 📧 Informasikan Redaktur setelah kirim berita penting

### **Untuk Redaktur:**
1. ⏱️ Review berita Jurnalis maksimal 1x24 jam
2. 💬 Berikan feedback jika ada yang perlu diperbaiki
3. 🌟 Pilih featured dengan bijak (berita paling penting)

---

## 📞 Bantuan & Support

Jika mengalami kesulitan atau ada pertanyaan:

1. **Kontak Admin:** admin@smkn5samarinda.sch.id
2. **WhatsApp Group:** [Link WA Group Tim Redaksi]
3. **Panduan Video:** [Link YouTube Tutorial] _(jika ada)_

---

**Terakhir diupdate:** 5 Februari 2026  
**Versi:** 1.0  
**Dibuat oleh:** Tim IT SMKN 5 Samarinda

---

✅ **Selamat mengelola berita! Semoga panduan ini membantu.**
