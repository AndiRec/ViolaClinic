<?php
// database/seeders/RolesAndAdminSeeder.php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RolesAndAdminSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Client','Employee','Admin'] as $r) {
            Role::findOrCreate($r);
        }

        $admin = User::firstOrCreate(
            ['email' => 'admin@clinic.test'],
            [
                'name' => 'Admin',
                'phone' => '070000000',
                'preferred_language' => 'en',
                'password' => Hash::make('password'), // change later
            ]
        );
        $admin->assignRole('Admin');
    }
}
