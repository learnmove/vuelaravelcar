<?php

use Illuminate\Database\Seeder;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\Product::class,300)->create();

        //
    }
}
