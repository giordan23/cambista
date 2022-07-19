<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Price;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create(['name' => 'admin', 'email' => 'admin@cambista.com', 'password' => Hash::make('Aumbbel123**')]);
        Price::create(['origin_price' => 3, 'user_id' => 1,'actual_price_compra' => 3.4, 'actual_price_venta' => 3.7, 'modificador_compra' => 0.98, 'modificador_venta'=> 1.02, 'created_at' => '2022-07-20 18:54:34', 'updated_at' => '2022-07-20 18:54:34' ]);

    }
}
