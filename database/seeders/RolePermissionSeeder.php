<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        Permission::firstOrCreate(['name'=>'role:viewAny']);
        Permission::firstOrCreate(['name'=>'role:view']);
        Permission::firstOrCreate(['name'=>'role:assign']);
        Permission::firstOrCreate(['name'=>'role:create']);
        Permission::firstOrCreate(['name'=>'role:update']);
        Permission::firstOrCreate(['name'=>'role:delete']);
        Permission::firstOrCreate(['name'=>'role:restore']);
        Permission::firstOrCreate(['name'=>'permission:viewAny']);
        Permission::firstOrCreate(['name'=>'permission:view']);
        Permission::firstOrCreate(['name'=>'permission:assign']);
        Permission::firstOrCreate(['name'=>'permission:create']);
        Permission::firstOrCreate(['name'=>'permission:update']);
        Permission::firstOrCreate(['name'=>'permission:delete']);
        Permission::firstOrCreate(['name'=>'permission:restore']);
        Permission::firstOrCreate(['name'=>'user:viewAny']);
        Permission::firstOrCreate(['name'=>'user:view']);
        Permission::firstOrCreate(['name'=>'user:create']);
        Permission::firstOrCreate(['name'=>'user:update']);
        Permission::firstOrCreate(['name'=>'user:delete']);
        Permission::firstOrCreate(['name'=>'user:restore']);

        $statsPermission = Permission::firstOrCreate(['name'=>'stats:view']);
        
        $role = Role::create(['name'=>'editor']);
        $permissions = [
            Permission::firstOrCreate(['name'=>'post:viewAny']),
            Permission::firstOrCreate(['name'=>'post:view']),
            Permission::firstOrCreate(['name'=>'post:create']),
            Permission::firstOrCreate(['name'=>'post:update']),
            Permission::firstOrCreate(['name'=>'post:delete']),
            Permission::firstOrCreate(['name'=>'post:restore']),
            Permission::firstOrCreate(['name'=>'news:viewAny']),
            Permission::firstOrCreate(['name'=>'news:view']),
            Permission::firstOrCreate(['name'=>'news:create']),
            Permission::firstOrCreate(['name'=>'news:update']),
            Permission::firstOrCreate(['name'=>'news:delete']),
            Permission::firstOrCreate(['name'=>'news:restore']),
        ];
        $role->syncPermissions($permissions);

        $role = Role::create(['name'=>'customer']);

        $role = Role::create(['name'=>'helpdesk-support']);
        $helpDeskPermissions = [
            Permission::firstOrCreate(['name'=>'chat:viewAny']),
            Permission::firstOrCreate(['name'=>'chat:view']),
            Permission::firstOrCreate(['name'=>'chat:create']),
            Permission::firstOrCreate(['name'=>'chat:update']),
            Permission::firstOrCreate(['name'=>'chat:delete']),
            Permission::firstOrCreate(['name'=>'chat:restore']),
            Permission::firstOrCreate(['name'=>'email:viewAny']),
            Permission::firstOrCreate(['name'=>'email:view']),
            Permission::firstOrCreate(['name'=>'email:create']),
            Permission::firstOrCreate(['name'=>'email:update']),
            Permission::firstOrCreate(['name'=>'email:delete']),
            Permission::firstOrCreate(['name'=>'email:restore']),
        ];
        $role->syncPermissions($helpDeskPermissions);

        $role = Role::create(['name'=>'shop-manager']);
        $permissions = [
            Permission::firstOrCreate(['name'=>'order:viewAny']),
            Permission::firstOrCreate(['name'=>'order:view']),
            Permission::firstOrCreate(['name'=>'order:create']),
            Permission::firstOrCreate(['name'=>'order:update']),
            Permission::firstOrCreate(['name'=>'order:delete']),
            Permission::firstOrCreate(['name'=>'order:restore']),
            Permission::firstOrCreate(['name'=>'post:viewAny']),
            Permission::firstOrCreate(['name'=>'post:view']),
            Permission::firstOrCreate(['name'=>'post:create']),
            Permission::firstOrCreate(['name'=>'post:update']),
            Permission::firstOrCreate(['name'=>'post:delete']),
            Permission::firstOrCreate(['name'=>'post:restore']),
            Permission::firstOrCreate(['name'=>'product:viewAny']),
            Permission::firstOrCreate(['name'=>'product:view']),
            Permission::firstOrCreate(['name'=>'product:create']),
            Permission::firstOrCreate(['name'=>'product:update']),
            Permission::firstOrCreate(['name'=>'product:delete']),
            Permission::firstOrCreate(['name'=>'product:restore']),
            Permission::firstOrCreate(['name'=>'stock:viewAny']),
            Permission::firstOrCreate(['name'=>'stock:view']),
            Permission::firstOrCreate(['name'=>'stock:create']),
            Permission::firstOrCreate(['name'=>'stock:update']),
            Permission::firstOrCreate(['name'=>'stock:delete']),
            Permission::firstOrCreate(['name'=>'stock:restore']),
            Permission::firstOrCreate(['name'=>'category:viewAny']),
            Permission::firstOrCreate(['name'=>'category:view']),
            Permission::firstOrCreate(['name'=>'category:create']),
            Permission::firstOrCreate(['name'=>'category:update']),
            Permission::firstOrCreate(['name'=>'category:delete']),
            Permission::firstOrCreate(['name'=>'category:restore']),
            Permission::firstOrCreate(['name'=>'review:viewAny']),
            Permission::firstOrCreate(['name'=>'review:view']),
            Permission::firstOrCreate(['name'=>'review:create']),
            Permission::firstOrCreate(['name'=>'review:update']),
            Permission::firstOrCreate(['name'=>'review:delete']),
            Permission::firstOrCreate(['name'=>'review:restore']),
            Permission::firstOrCreate(['name'=>'attribute:viewAny']),
            Permission::firstOrCreate(['name'=>'attribute:view']),
            Permission::firstOrCreate(['name'=>'attribute:create']),
            Permission::firstOrCreate(['name'=>'attribute:update']),
            Permission::firstOrCreate(['name'=>'attribute:delete']),
            Permission::firstOrCreate(['name'=>'attribute:restore']),
            Permission::firstOrCreate(['name'=>'value:viewAny']),
            Permission::firstOrCreate(['name'=>'value:view']),
            Permission::firstOrCreate(['name'=>'value:create']),
            Permission::firstOrCreate(['name'=>'value:update']),
            Permission::firstOrCreate(['name'=>'value:delete']),
            Permission::firstOrCreate(['name'=>'value:restore']),
            Permission::firstOrCreate(['name'=>'delivery-method:viewAny']),
            Permission::firstOrCreate(['name'=>'delivery-method:view']),
            Permission::firstOrCreate(['name'=>'delivery-method:switch']),
            Permission::firstOrCreate(['name'=>'delivery-method:create']),
            Permission::firstOrCreate(['name'=>'delivery-method:update']),
            Permission::firstOrCreate(['name'=>'delivery-method:delete']),
            Permission::firstOrCreate(['name'=>'delivery-method:restore']),
            Permission::firstOrCreate(['name'=>'payment-type:viewAny']),
            Permission::firstOrCreate(['name'=>'payment-type:view']),
            Permission::firstOrCreate(['name'=>'payment-type:switch']),
            Permission::firstOrCreate(['name'=>'payment-type:create']),
            Permission::firstOrCreate(['name'=>'payment-type:update']),
            Permission::firstOrCreate(['name'=>'payment-type:delete']),
            Permission::firstOrCreate(['name'=>'payment-type:restore']),
            Permission::firstOrCreate(['name'=>'discount:create']),
        ];
        $role->syncPermissions(array_merge($permissions,$helpDeskPermissions));
        $role->givePermissionTo($statsPermission);
    }
}
