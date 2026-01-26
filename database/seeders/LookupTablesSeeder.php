<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\ServiceType;
use App\Models\CareSetting;
use Illuminate\Support\Str;

class LookupTablesSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedRoles();
        $this->seedServiceTypes();
        $this->seedCareSettings();
    }

    protected function seedRoles(): void
    {
        $roles = [
            'Care Assistant',
            'Support Worker',
            'Registered Nurse',
            'Doctor',
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['slug' => Str::slug($role)],
                ['name' => $role]
            );
        }
    }

    protected function seedServiceTypes(): void
    {
        $serviceTypes = [
            'Temporary',
            'Permanent',
            'Night Shifts',
            'Day Shifts',
            'Emergency Cover',
        ];

        foreach ($serviceTypes as $type) {
            ServiceType::updateOrCreate(
                ['slug' => Str::slug($type)],
                ['name' => $type]
            );
        }
    }

    protected function seedCareSettings(): void
    {
        $careSettings = [
            'Care Home',
            'Hospital',
            'Residential Home',
            "Client’s Own Home",
        ];

        foreach ($careSettings as $setting) {
            CareSetting::updateOrCreate(
                ['slug' => Str::slug($setting)],
                ['name' => $setting]
            );
        }
    }
}
