<?php

use Illuminate\Database\Seeder;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_sexo')->insert([
        	[ 'id' => 1, 'nombre' => 'HOMBRE'], 
        	[ 'id' => 2, 'nombre' => 'MUJER'], 
        	[ 'id' => 3, 'nombre' => 'SIN ESPECIFICAR'],
    	]);
    }
}
