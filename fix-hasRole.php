<?php

// Script untuk replace hasRole() dengan role column check di semua Resource files

$files = [
    'app/Filament/Resources/Settings/SettingResource.php' => [
        ['old' => "return auth()->user()->hasRole('Admin');", 'new' => "return auth()->user()->role === 'admin';"]
    ],
    'app/Filament/Resources/Galleries/GalleryResource.php' => [
        ['old' => "return auth()->user()->hasRole('Admin');", 'new' => "return auth()->user()->role === 'admin';"]
    ],
    'app/Filament/Resources/Facilities/FacilityResource.php' => [
        ['old' => "return auth()->user()->hasRole('Admin');", 'new' => "return auth()->user()->role === 'admin';"]
    ],
    'app/Filament/Resources/StatisticResource.php' => [
        ['old' => "return auth()->user()->hasRole(['Admin', 'Redaktur']);", 'new' => "return in_array(auth()->user()->role, ['admin', 'redaktur']);"]
    ],
    'app/Filament/Resources/Jurusans/JurusanResource.php' => [
        ['old' => "return auth()->user()->hasRole(['Admin', 'Redaktur']);", 'new' => "return in_array(auth()->user()->role, ['admin', 'redaktur']);"]
    ],
    'app/Filament/Resources/Partners/PartnerResource.php' => [
        ['old' => "return auth()->user()->hasRole('Admin');", 'new' => "return auth()->user()->role === 'admin';"]
    ],
    'app/Filament/Resources/Menus/MenuResource.php' => [
        ['old' => "return auth()->user()->hasRole('Admin');", 'new' => "return auth()->user()->role === 'admin';"]
    ],
    'app/Filament/Resources/Extracurriculars/ExtracurricularResource.php' => [
        ['old' => "return auth()->user()->hasRole('Admin');", 'new' => "return auth()->user()->role === 'admin';"]
    ],
];

foreach ($files as $file => $replacements) {
    if (!file_exists($file)) {
        echo "❌ File not found: $file\n";
        continue;
    }
    
    $content = file_get_contents($file);
    $modified = false;
    
    foreach ($replacements as $replacement) {
        if (str_contains($content, $replacement['old'])) {
            $content = str_replace($replacement['old'], $replacement['new'], $content);
            $modified = true;
        }
    }
    
    if ($modified) {
        file_put_contents($file, $content);
        echo "✅ Fixed: $file\n";
    } else {
        echo "⏭️  Skipped (already fixed): $file\n";
    }
}

echo "\n✅ All files processed!\n";
