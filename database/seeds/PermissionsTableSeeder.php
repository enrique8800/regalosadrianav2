<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Permission list
         Permission::create(['name' => 'productos.index']);
         Permission::create(['name' => 'productos.edit']);
         Permission::create(['name' => 'productos.update']);
         Permission::create(['name' => 'productos.show']);
         Permission::create(['name' => 'productos.create']);
         Permission::create(['name' => 'productos.destroy']);

         Permission::create(['name' => 'categorias.index']);
         Permission::create(['name' => 'categorias.edit']);
         Permission::create(['name' => 'categorias.update']);
         Permission::create(['name' => 'categorias.show']);
         Permission::create(['name' => 'categorias.create']);
         Permission::create(['name' => 'categorias.destroy']);

         Permission::create(['name' => 'providers.index']);
         Permission::create(['name' => 'providers.edit']);
         Permission::create(['name' => 'providers.update']);
         Permission::create(['name' => 'providers.show']);
         Permission::create(['name' => 'providers.create']);
         Permission::create(['name' => 'providers.destroy']);

         Permission::create(['name' => 'clientes.index']);
         Permission::create(['name' => 'clientes.edit']);
         Permission::create(['name' => 'clientes.update']);
         Permission::create(['name' => 'clientes.show']);
         Permission::create(['name' => 'clientes.create']);
         Permission::create(['name' => 'clientes.destroy']);

         Permission::create(['name' => 'compras.index']);
         Permission::create(['name' => 'compras.show']);
         Permission::create(['name' => 'compras.create']);

         Permission::create(['name' => 'ventas.index']);
         Permission::create(['name' => 'ventas.show']);
         Permission::create(['name' => 'ventas.create']);

         Permission::create(['name' => 'compras.pdf']);
         Permission::create(['name' => 'ventas.pdf']);
         Permission::create(['name' => 'ventas.print']);

         Permission::create(['name' => 'change.status.productos']);
         Permission::create(['name' => 'change.status.compras']);
         Permission::create(['name' => 'change.status.ventas']);

         Permission::create(['name' => 'get_products_by_barcode']);
         Permission::create(['name' => 'get_products_by_id']);
         Permission::create(['name' => 'imprimir_codigo']);

         Permission::create(['name' => 'home']);

         Permission::create(['name' => 'reportes.dia']);
         Permission::create(['name' => 'reportes.fecha']);
         Permission::create(['name' => 'reporte.res']);

         Permission::create(['name' => 'empresas.index']);
         Permission::create(['name' => 'empresas.update']);

 
         //Admin
         $admin = Role::create(['name' => 'Admin']);
 
         //$admin->givePermissionTo('productos.index');
         
         $admin->givePermissionTo(Permission::all());
        
         //Guest
         $guest = Role::create(['name' => 'Guest']);
 
         $guest->givePermissionTo([
             'productos.index',
             'productos.show',
             'productos.create',

             'categorias.index',
             'categorias.show',
             'categorias.create',

             'providers.index',
             'providers.show',
             'providers.create',

             'clientes.index',
             'clientes.show',
             'clientes.create',

             'compras.index',
             'compras.show',
             'compras.create',

             'ventas.index',
             'ventas.show',
             'ventas.create',

             'ventas.pdf',
             'compras.pdf',
             'ventas.print',

             'get_products_by_barcode',
             'get_products_by_id',
             'home',
             'reportes.dia',
             'reportes.fecha',
             'reporte.res',

             'empresas.index'

         ]);
 
         //User Admin
         $user = User::find(1); //Italo Morales
         $user->assignRole('Admin');
        //User Guest
         $user = User::find(2);
         $user->assignRole('Guest');
         $user = User::find(3);
         $user->assignRole('Guest');
    }
}
