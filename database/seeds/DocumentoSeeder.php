<?php

use Illuminate\Database\Seeder;

class DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_documentos')->insert([
        	[ 'id' => 1, 'nombre' => 'LICENCIA DE CONDUCIR'], 
        	[ 'id' => 2, 'nombre' => 'IFE'], 
        	[ 'id' => 3, 'nombre' => 'CARTILLA MILITAR'],
    	]);
    }
}
