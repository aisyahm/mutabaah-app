<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sholat Wajib
        Activity::create(["name" => "Sholat Subuh", "category" => 1]);
        Activity::create(["name" => "Sholat Dzuhur", "category" => 1]);
        Activity::create(["name" => "Sholat Ashar", "category" => 1]);
        Activity::create(["name" => "Sholat Maghrib", "category" => 1]);
        Activity::create(["name" => "Sholat Isya", "category" => 1]);

        // Sholat Rawatib
        Activity::create(["name" => "Sholat Qabliyah Subuh", "category" => 2]);
        Activity::create(["name" => "Sholat Qabliyah Dzuhur", "category" => 2]);
        Activity::create(["name" => "Sholat Ba'diyah Dzuhur", "category" => 2]);
        Activity::create(["name" => "Sholat Qabliyah Ashar", "category" => 2]);
        Activity::create(["name" => "Sholat Ba'diyah Maghrib", "category" => 2]);
        Activity::create(["name" => "Sholat Qabliyah Isya", "category" => 2]);
        Activity::create(["name" => "Sholat Ba'diyah Isya", "category" => 2]);

        // Sholat Sunnah
        Activity::create(["name" => "Sholat Dhuha", "category" => 3]);
        Activity::create(["name" => "Sholat Tahajjud", "category" => 3]);

        // Amalan Sunnah Lainnya
        Activity::create(["name" => "Puasa Sunnah", "category" => 4]);
        Activity::create(["name" => "Baca Al-Qur'an", "category" => 4]);
        Activity::create(["name" => "Infaq", "category" => 4, "female_only" => true]);
        Activity::create(["name" => "Kajian", "category" => 4, "female_only" => true]);

        // Dzikir
        Activity::create(["name" => "Dzikir Pagi", "category" => 5, "female_only" => true]);
        Activity::create(["name" => "Dzikir Petang", "category" => 5, "female_only" => true]);
        Activity::create(["name" => "Istighfar", "category" => 5, "female_only" => true]);
        Activity::create(["name" => "Sholawat", "category" => 5, "female_only" => true]);
    }
}
