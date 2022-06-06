<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();

        $tenant->admins()->create([
            'name'      => 'Caubinho Pacheco',
            'email'     => 'caubinho@gmail.com',
            'password'  => bcrypt('cau12345')
        ]);

        // Admin::created([
        //     'tenant_id' => $tenant->id,
        //     'name'      => 'Caubinho Pacheco',
        //     'email'     => 'caubinho@gmail.com',
        //     'password'  => bcrypt('cau12345')
        // ]);
    }
}
