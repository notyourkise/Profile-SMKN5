# 🎯 SISTEM NAVBAR DINAMIS - IMPLEMENTATION GUIDE

## 📋 OVERVIEW
Sistem Menu Navbar yang dapat dikelola sepenuhnya dari Filament Admin Panel dengan fitur:
- ✅ Menu Type: Link Biasa atau Dropdown
- ✅ Auto-hide URL field jika type Dropdown
- ✅ Drag & Drop Reordering
- ✅ Parent-Child Relationship (Sub-menu)
- ✅ Frontend rendering dengan Alpine.js

---

## 🗄️ DATABASE STRUCTURE

### Table: `menus`
```sql
- id (primary key)
- title (string) - Nama menu
- url (string, nullable) - URL (null jika dropdown)
- type (enum: 'link', 'dropdown') - Tipe menu
- parent_id (foreign key, nullable) - Parent menu ID
- order (integer) - Urutan menu
- is_active (boolean) - Status aktif
- icon (string, nullable) - Icon heroicon
- open_new_tab (boolean) - Buka di tab baru
- timestamps
```

---

## 📁 FILES CREATED

### 1. Migration
**File:** `database/migrations/2026_01_03_000001_create_menus_table.php`
- Membuat tabel `menus` dengan semua kolom yang diperlukan
- Foreign key constraint untuk parent_id

### 2. Model
**File:** `app/Models/Menu.php`
- Relasi `parent()` - BelongsTo
- Relasi `children()` - HasMany
- Relasi `activeChildren()` - HasMany dengan filter is_active
- Scope `parents()` - Get top-level menus
- Scope `active()` - Get active menus
- Helper methods: `hasChildren()`, `isDropdown()`

### 3. Filament Resource
**Folder:** `app/Filament/Resources/Menus/`

**Files:**
- `MenuResource.php` - Main resource class
- `Schemas/MenuForm.php` - Form schema dengan reactive fields
- `Tables/MenusTable.php` - Table dengan reorderable & badges
- `Pages/ListMenus.php` - List page
- `Pages/CreateMenu.php` - Create page
- `Pages/EditMenu.php` - Edit page

### 4. Frontend View
**File:** `resources/views/components/navbar.blade.php`
- Dynamic menu rendering dari database
- Desktop dropdown dengan Alpine.js
- Mobile responsive menu
- Support untuk nested sub-menu

### 5. Seeder
**File:** `database/seeders/MenuSeeder.php`
- Sample data dengan 2 dropdown parents
- Sub-menu examples
- Ready to use structure

---

## 🚀 INSTALLATION STEPS

### 1. Run Migration
```bash
php artisan migrate
```

### 2. Seed Default Menus (Optional)
```bash
php artisan db:seed --class=MenuSeeder
```

### 3. Access Admin Panel
- URL: `http://localhost:8000/admin`
- Navigate to **Settings > Menu**

---

## 🎨 FITUR FILAMENT ADMIN

### Form Features:
1. **Menu Type Selector**
   - "Link Biasa" - Untuk menu dengan URL
   - "Dropdown (Parent)" - Untuk menu dropdown

2. **Auto-Hide URL Field**
   - URL field otomatis HIDDEN jika type = dropdown
   - Menggunakan `live()` dan `hidden()` di form

3. **Parent Menu Selector**
   - Dropdown untuk memilih parent menu
   - Create sub-menu dengan mudah
   - Searchable & preload

4. **Order Field**
   - Set urutan manual via input number
   - OR drag & drop di table list

5. **Additional Options**
   - Active toggle
   - Open in New Tab toggle
   - Icon field (Heroicon)

### Table Features:
1. **Reorderable** - Drag & drop untuk mengubah urutan
2. **Color Badges** - Visual indicator untuk Type (Link/Dropdown)
3. **Parent Menu Column** - Lihat parent dari sub-menu
4. **Search & Filter** - Cari menu by title/URL
5. **Bulk Actions** - Delete multiple menus

---

## 🌐 FRONTEND IMPLEMENTATION

### Desktop Menu Logic:
```blade
@if($menu->type === 'dropdown' && $menu->activeChildren->count() > 0)
    <!-- Render Dropdown -->
@else
    <!-- Render Regular Link -->
@endif
```

### Mobile Menu Logic:
- Accordion-style dropdown dengan Alpine.js
- Same dynamic rendering
- Touch-friendly

### Alpine.js States:
- `openDropdown` - Track which dropdown is open
- `mobileMenuOpen` - Mobile menu toggle
- `open` - Individual dropdown state

---

## 📊 QUERY OPTIMIZATION

### Eager Loading:
```php
$menus = \App\Models\Menu::parents()
    ->active()
    ->with('activeChildren')
    ->get();
```

Menghindari N+1 query problem dengan `with('activeChildren')`

---

## 🎯 USE CASES

### Example 1: Simple Link Menu
```
Title: Beranda
Type: Link Biasa
URL: /
Order: 1
```

### Example 2: Dropdown Menu with Sub-items
```
Parent Menu:
  Title: Tentang
  Type: Dropdown
  Order: 2

Sub-menu 1:
  Title: Profil Sekolah
  Type: Link Biasa
  URL: /about/profile
  Parent: Tentang
  Order: 1

Sub-menu 2:
  Title: Visi & Misi
  Type: Link Biasa
  URL: /about/vision
  Parent: Tentang
  Order: 2
```

### Example 3: External Link
```
Title: Portal Siswa
Type: Link Biasa
URL: https://portal.smkn5.sch.id
Open New Tab: ✅
Order: 6
```

---

## ⚙️ CUSTOMIZATION

### Add Icon Support:
1. Uncomment icon field usage in navbar.blade.php
2. Add icon rendering logic
3. Use Heroicon names

### Add Multi-level Dropdown:
1. Modify Model to support grandchildren
2. Update navbar rendering logic
3. Add nested loop for 3rd level

### Add URL Validation:
1. Add validation rule in MenuForm
2. Use `url()` or `regex` validation
3. Handle internal vs external URLs

---

## 🔧 TROUBLESHOOTING

### Issue: Menu tidak muncul di frontend
**Solution:**
- Pastikan menu is_active = true
- Check parent menu juga is_active
- Verify database query di navbar.blade.php

### Issue: Dropdown tidak berfungsi
**Solution:**
- Pastikan Alpine.js loaded
- Check browser console untuk error
- Verify x-data dan @click directives

### Issue: Urutan menu tidak berubah
**Solution:**
- Drag & drop di Filament table
- Atau edit manual field `order`
- Clear cache jika perlu

---

## ✅ TESTING CHECKLIST

- [ ] Create menu type "Link" → URL field visible
- [ ] Create menu type "Dropdown" → URL field hidden
- [ ] Create sub-menu dengan parent selector
- [ ] Drag & drop reorder menus
- [ ] Toggle is_active → menu hilang dari frontend
- [ ] Desktop dropdown berfungsi
- [ ] Mobile menu accordion berfungsi
- [ ] External link open new tab berfungsi

---

## 🎓 BEST PRACTICES

1. **Naming Convention:**
   - Use descriptive menu titles
   - Keep URLs clean and SEO-friendly

2. **Order Numbers:**
   - Use increments of 10 (10, 20, 30...)
   - Easier to insert new menus between

3. **Active Status:**
   - Disable menus instead of delete
   - Preserve menu structure

4. **Sub-menu Limit:**
   - Max 1 level deep recommended
   - Better UX and performance

---

**Status:** ✅ READY TO USE
**Compatibility:** Laravel 12 + Filament v4.3
**Frontend:** Alpine.js + TailwindCSS 4

---

_Implementation by GitHub Copilot_
_Date: January 3, 2026_
