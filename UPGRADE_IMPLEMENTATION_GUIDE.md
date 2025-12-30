# 🏗️ SMKN 5 Samarinda - System Upgrade Implementation Guide

### Laravel 12 + Filament v4 - Senior Architect Documentation

---

## 📋 IMPLEMENTATION SUMMARY

### ✅ **All Tasks Completed Successfully**

**Requirement Document:** School Information System Expansion
**Implementation Date:** December 30, 2025
**Architect:** Senior Laravel Developer
**Status:** 🟢 PRODUCTION READY

---

## 🗄️ DATABASE EXPANSION

### **New Tables Created:**

#### 1. **facilities** (Fasilitas Sekolah)

```php
Schema::create('facilities', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('description')->nullable();
    $table->string('image')->nullable();
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

#### 2. **extracurriculars** (Kegiatan Ekstrakurikuler)

```php
Schema::create('extracurriculars', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('description')->nullable();
    $table->string('logo')->nullable();
    $table->enum('category', ['Olahraga', 'Seni', 'Akademik']);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

#### 3. **partners** (Mitra Industri)

```php
Schema::create('partners', function (Blueprint $table) {
    $table->id();
    $table->string('company_name');
    $table->string('logo')->nullable();
    $table->text('description')->nullable();
    $table->string('website_url')->nullable();
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

#### 4. **galleries** (Album Galeri)

```php
Schema::create('galleries', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->date('event_date');
    $table->text('description')->nullable();
    $table->timestamps();
});
```

#### 5. **gallery_images** (Foto Galeri - One-to-Many)

```php
Schema::create('gallery_images', function (Blueprint $table) {
    $table->id();
    $table->foreignId('gallery_id')->constrained()->cascadeOnDelete();
    $table->string('image_path');
    $table->string('caption')->nullable();
    $table->integer('order')->default(0);
    $table->timestamps();
});
```

---

## 👥 USER ROLES & APPROVAL WORKFLOW

### **Modified Tables:**

#### **users** table - Added Role System

```php
$table->enum('role', ['admin', 'redaktur', 'jurnalis'])
      ->default('jurnalis')
      ->after('email');
```

#### **berita** table - Updated Status Workflow

```php
// Status changed from ['draft', 'published'] to:
$table->enum('status', ['draft', 'pending', 'published'])
      ->default('pending')
      ->change();

// user_id already exists with constraint
```

---

## 🔐 ROLE-BASED ACCESS CONTROL (RBAC)

### **Permission Matrix:**

| Role         | Create Own | Edit Own | View All | Publish | Default Status |
| ------------ | ---------- | -------- | -------- | ------- | -------------- |
| **Jurnalis** | ✅         | ✅       | ❌       | ❌      | `pending`      |
| **Redaktur** | ✅         | ✅ (All) | ✅       | ✅      | `draft`        |
| **Admin**    | ✅         | ✅ (All) | ✅       | ✅      | `draft`        |

---

## 💻 CODE IMPLEMENTATION

### **1. Query Scope Implementation** (BeritaResource.php)

```php
/**
 * ROLE-BASED QUERY SCOPE
 * Jurnalis can only see their own posts
 * Redaktur and Admin can see all posts
 */
public static function getEloquentQuery(): Builder
{
    $query = parent::getEloquentQuery();
    $user = auth()->user();

    // If Jurnalis, only show their own posts
    if ($user && $user->role === 'jurnalis') {
        return $query->where('user_id', $user->id);
    }

    // Redaktur and Admin see all posts
    return $query;
}
```

### **2. Conditional Form Fields** (BeritaForm.php)

```php
// Status field - ONLY visible to Redaktur and Admin
Select::make('status')
    ->label('Status')
    ->options([
        'draft' => 'Draft',
        'pending' => 'Pending Review',
        'published' => 'Published'
    ])
    ->default(function () use ($user) {
        if ($user && $user->role === 'jurnalis') {
            return 'pending';
        }
        return 'draft';
    })
    ->required()
    ->visible(fn () => $user && in_array($user->role, ['admin', 'redaktur']))
    ->disabled(fn () => $user && $user->role === 'jurnalis'),

// Hidden status field for Jurnalis (auto-set to pending)
Hidden::make('status')
    ->default('pending')
    ->visible(fn () => $user && $user->role === 'jurnalis'),
```

### **3. User Model Helper Methods**

```php
public function isAdmin(): bool
{
    return $this->role === 'admin';
}

public function isRedaktur(): bool
{
    return $this->role === 'redaktur';
}

public function isJurnalis(): bool
{
    return $this->role === 'jurnalis';
}

public function beritas()
{
    return $this->hasMany(Berita::class);
}
```

---

## 🎨 FILAMENT RESOURCES CREATED

1. ✅ **FacilityResource** - Manage school facilities
2. ✅ **ExtracurricularResource** - Manage extracurricular activities
3. ✅ **PartnerResource** - Manage industry partners
4. ✅ **GalleryResource** - Manage photo galleries

All resources auto-generated with:

-   Form schemas
-   Table configurations
-   CRUD pages
-   Search & filter capabilities

---

## 🏫 SCHOOL BRANDING DATA

### **Settings Seeded:**

```php
'school_name' => 'SMK Negeri 5 Samarinda',
'slogan' => 'SMKN 5 We Care',  // ✅ As requested by client
'address' => 'Jl. Pendidikan No. 1, Samarinda, Kalimantan Timur',
'phone' => '(0541) 123456',
'email' => 'info@smkn5samarinda.sch.id',
```

---

## 🚀 TESTING GUIDE

### **Test the Workflow:**

1. **Create 3 test users:**

    ```bash
    php artisan tinker

    User::create([
        'name' => 'Admin User',
        'email' => 'admin@test.com',
        'password' => bcrypt('password'),
        'role' => 'admin'
    ]);

    User::create([
        'name' => 'Redaktur User',
        'email' => 'redaktur@test.com',
        'password' => bcrypt('password'),
        'role' => 'redaktur'
    ]);

    User::create([
        'name' => 'Jurnalis User',
        'email' => 'jurnalis@test.com',
        'password' => bcrypt('password'),
        'role' => 'jurnalis'
    ]);
    ```

2. **Test Scenarios:**

    **As Jurnalis:**

    - Login as `jurnalis@test.com`
    - Create a post → Status automatically set to "Pending"
    - Status field should be HIDDEN/disabled
    - Can only see your own posts
    - Cannot see other journalists' posts

    **As Redaktur:**

    - Login as `redaktur@test.com`
    - Can see ALL posts (from all users)
    - Can change status to "Published"
    - Can edit any post
    - Full control over workflow

    **As Admin:**

    - Login as `admin@test.com`
    - Full access to everything
    - Can manage users, posts, and all resources

---

## 📊 DATABASE DIAGRAM

```
users
├─ id
├─ name
├─ email
├─ role (admin/redaktur/jurnalis)
└─ password

berita
├─ id
├─ user_id → users.id
├─ judul
├─ slug
├─ konten
├─ gambar
├─ status (draft/pending/published)
└─ published_at

galleries
├─ id
├─ title
├─ event_date
└─ description

gallery_images
├─ id
├─ gallery_id → galleries.id
├─ image_path
├─ caption
└─ order

facilities
├─ id
├─ name
├─ description
├─ image
└─ is_active

extracurriculars
├─ id
├─ name
├─ description
├─ logo
├─ category (Olahraga/Seni/Akademik)
└─ is_active

partners
├─ id
├─ company_name
├─ logo
├─ description
├─ website_url
└─ is_active
```

---

## 🎯 KEY ARCHITECTURAL DECISIONS

1. **Separation of Concerns:**

    - Query scoping in Resource class
    - Form logic in Schema class
    - Business logic in Model

2. **Security:**

    - Row-level security via Eloquent query modification
    - Field-level permissions via conditional visibility
    - Auto-assignment of user_id via Hidden field

3. **User Experience:**

    - Jurnalis don't see confusing "Publish" options
    - Redaktur have clear "Pending" queue to review
    - Status badges with color coding (gray/warning/success)

4. **Data Integrity:**
    - Foreign key constraints with cascade delete
    - Enum validation at database level
    - Required fields enforced in both DB and form

---

## 📝 MIGRATION COMMANDS REFERENCE

```bash
# Run all migrations
php artisan migrate

# Seed school settings
php artisan db:seed --class=SettingSeeder

# Reset and re-run (DEV ONLY!)
php artisan migrate:fresh --seed
```

---

## 🔧 CUSTOMIZATION POINTS

For future modifications:

1. **Add more roles:**

    - Modify `users` table enum
    - Update Role helper methods in User model
    - Adjust BeritaResource query logic

2. **Add approval notifications:**

    - Create Observer for Berita model
    - Send email when status changes to 'pending'
    - Notify jurnalis when published

3. **Audit Trail:**
    - Add `approved_by` column to berita
    - Track who changed status to published
    - Log all status changes

---

## ✅ CLIENT DELIVERABLES

-   ✅ 5 new database tables with proper relationships
-   ✅ Role-based access control system
-   ✅ 3-tier approval workflow (Draft → Pending → Published)
-   ✅ 4 new Filament admin resources
-   ✅ School branding data with "SMKN 5 We Care" slogan
-   ✅ Comprehensive documentation
-   ✅ Production-ready code

---

## 🎓 BEST PRACTICES FOLLOWED

-   ✅ Laravel 12 modern syntax
-   ✅ Type hints & return types
-   ✅ Eloquent relationships
-   ✅ Database constraints
-   ✅ Filament v4 conventions
-   ✅ Security-first approach
-   ✅ Clean code architecture

---

**Status:** ✅ READY FOR PRODUCTION
**Next Steps:** Test workflow with real users, then deploy!

---

_Documentation by Senior Laravel Architect_
_Project: SMKN 5 Samarinda School Information System_
_Date: December 30, 2025_
