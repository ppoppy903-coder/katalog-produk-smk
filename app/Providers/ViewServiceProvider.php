<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Bagikan variabel ini ke semua view yang menggunakan layout app
        View::share('ikon_bidang', [
            'Teknologi Konstruksi dan Properti' => 'fa-solid fa-building',
            'Teknologi Manufaktur dan Rekayasa' => 'fa-solid fa-industry',
            'Energi dan Pertambangan' => 'fa-solid fa-bolt',
            'Teknologi Informasi' => 'fa-solid fa-laptop-code',
            'Kesehatan dan Pekerjaan Sosial' => 'fa-solid fa-user-nurse',
            'Agribisnis dan Agriteknologi' => 'fa-solid fa-seedling',
            'Kemaritiman' => 'fa-solid fa-anchor',
            'Bisnis dan Manajemen' => 'fa-solid fa-chart-line',
            'Pariwisata' => 'fa-solid fa-umbrella-beach',
            'Seni dan Ekonomi Kreatif' => 'fa-solid fa-palette',
        ]);
    }
}
