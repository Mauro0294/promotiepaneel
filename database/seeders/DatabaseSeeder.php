<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rank;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $ranks = [
            // Employee
            ['role' => 'Employee', 'rank' => 'Newcomer I'],
            ['role' => 'Employee', 'rank' => 'Newcomer II'],
            ['role' => 'Employee', 'rank' => 'Newcomer III'],
            ['role' => 'Employee', 'rank' => 'Newcomer IV'],
            ['role' => 'Employee', 'rank' => 'Newcomer V'],
            ['role' => 'Employee', 'rank' => 'Recruit I'],
            ['role' => 'Employee', 'rank' => 'Recruit II'],
            ['role' => 'Employee', 'rank' => 'Recruit III'],
            ['role' => 'Employee', 'rank' => 'Recruit IV'],
            ['role' => 'Employee', 'rank' => 'Recruit V'],
            ['role' => 'Employee', 'rank' => 'Guard I'],
            ['role' => 'Employee', 'rank' => 'Guard II'],
            ['role' => 'Employee', 'rank' => 'Guard III'],
            ['role' => 'Employee', 'rank' => 'Guard IV'],
            ['role' => 'Employee', 'rank' => 'Guard V'],
            ['role' => 'Employee', 'rank' => 'Supervisor I'],
            ['role' => 'Employee', 'rank' => 'Supervisor II'],
            ['role' => 'Employee', 'rank' => 'Supervisor III'],
            ['role' => 'Employee', 'rank' => 'Supervisor IV'],
            ['role' => 'Employee', 'rank' => 'Supervisor V'],
            ['role' => 'Employee', 'rank' => 'Advisor I'],
            ['role' => 'Employee', 'rank' => 'Advisor II'],
            ['role' => 'Employee', 'rank' => 'Advisor III'],
            ['role' => 'Employee', 'rank' => 'Advisor IV'],
            ['role' => 'Employee', 'rank' => 'Advisor V'],
            ['role' => 'Employee', 'rank' => 'Teamleader I'],
            ['role' => 'Employee', 'rank' => 'Teamleader II'],
            ['role' => 'Employee', 'rank' => 'Teamleader III'],
            ['role' => 'Employee', 'rank' => 'Teamleader IV'],
            ['role' => 'Employee', 'rank' => 'Teamleader V'],

            // Trial
            ['role' => 'Trial', 'rank' => 'Coach'],
            ['role' => 'Trial', 'rank' => 'Head of Newcomers'],
            ['role' => 'Trial', 'rank' => 'Head of Recruits'],
            ['role' => 'Trial', 'rank' => 'Head of Guards'],
            ['role' => 'Trial', 'rank' => 'Head of Supervisors'],
            ['role' => 'Trial', 'rank' => 'Head of Advisors'],
            ['role' => 'Trial', 'rank' => 'Head of Teamleaders'],
            ['role' => 'Trial', 'rank' => 'Runner'],

            // Staff
            ['role' => 'Staff', 'rank' => 'Security'],
            ['role' => 'Staff', 'rank' => 'High Security'],
            ['role' => 'Staff', 'rank' => 'Teacher'],
            ['role' => 'Staff', 'rank' => 'High Teacher'],
            ['role' => 'Staff', 'rank' => 'Trainer'],
            ['role' => 'Staff', 'rank' => 'Inspector'],

            // Executive
            ['role' => 'Executive', 'rank' => 'Coordinator'],
            ['role' => 'Executive', 'rank' => 'Commissioner'],
            ['role' => 'Executive', 'rank' => 'Trial A.M.'],
            ['role' => 'Executive', 'rank' => 'Staff A.M.'],
            ['role' => 'Executive', 'rank' => 'Academy A.M.'],
            ['role' => 'Executive', 'rank' => 'Intelligence A.M.'],
            ['role' => 'Executive', 'rank' => 'Human Resources A.M.'],
            ['role' => 'Executive', 'rank' => 'Employment A.M.'],

            // Management
            ['role' => 'Management', 'rank' => 'Trial Manager'],
            ['role' => 'Management', 'rank' => 'Staff Manager'],
            ['role' => 'Management', 'rank' => 'Academy Manager'],
            ['role' => 'Management', 'rank' => 'Intelligence Manager'],
            ['role' => 'Management', 'rank' => 'Human Resources Manager'],
            ['role' => 'Management', 'rank' => 'Employment Manager'],
            ['role' => 'Management', 'rank' => 'General Manager'],
            
            // Board of Directors
            ['role' => 'Board of Directors', 'rank' => 'Core Director'],
            ['role' => 'Board of Directors', 'rank' => 'General Director'],
            ['role' => 'Board of Directors', 'rank' => 'Special Advisor'],

            // Council
            ['role' => 'Council', 'rank' => 'Chief Financial Officer'],
            ['role' => 'Council', 'rank' => 'Chief Operation Officer'],
            ['role' => 'Council', 'rank' => 'Chief Executive Officer'],
            ['role' => 'Council', 'rank' => 'Owner']
        ];

        foreach ($ranks as $rank) {
            Rank::create([
                'role' => $rank['role'],
                'rank' => $rank['rank']
            ]);
        }
    }
}
