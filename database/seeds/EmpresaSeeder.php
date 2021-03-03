<?php

use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Empresa::create([
            'nombre'      => 'Regalos Adriana',
            'email'     => 'regalosAdriana@gmail.com',
            'direccion'     => 'C/Alcalde Cipriano Moreno Montero',
            'logo'     => 'logoPrincipal.png',
            'descripcion'     => 'Empresa familiar con buen ambiente',
        ]);
    }
}
