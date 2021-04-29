<?php

namespace Database\Seeders;

use App\Models\ProductTypes;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        try{
            $user = new User();
            $user->name = 'Admin';
            $user->email = 'admin@admin.com';
            $user->password = 'admin';
            $user->save();
        }catch (\Exception $e) {
            return $e;
        }
        
        for($i=0; $i<=5; $i++){
            try{
            $productTypes = new ProductTypes();
            $productTypes->description = 'Tipo ' . $i;
            $productTypes->save();
        }catch (\Exception $e) {
            return $e;
        }
        
        }
    }
}
