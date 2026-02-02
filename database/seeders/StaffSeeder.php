<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Staff;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Staff::create([
            'full_name' => 'Michael Turner',
            'email' => 'm.turner@tobesthealthcare.com',
            'phone' => '+44 7700 900123',
            'gender' => 'male',
            'role' => 'Nurse',
            'nursing_level' => 'Registered Nurse (RN)',
            'years_of_experience' => 8,
            'care_specialty' => 'Clinical & Emergency Care',
            'license_number' => 'RN-UK-23984',
            'license_verified' => true,
            'skills' => [
                'Patient Monitoring',
                'IV Therapy',
                'Emergency Response',
            ],
            'photo' => 'fe/assets/img/healthcare/agent-5.webp',
            'availability_type' => 'shift',
            'is_available' => true,
            'is_featured' => true,
            'bio' => 'Experienced registered nurse with strong emergency and hospital care background.',
        ]);
    }
}
