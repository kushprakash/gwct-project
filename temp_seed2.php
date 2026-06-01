<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

$permissions = [
    'child-list', 'child-create', 'child-edit', 'child-delete',
    'renewal-list', 'renewal-create', 'renewal-edit', 'renewal-delete'
];

foreach ($permissions as $permission) {
    Permission::firstOrCreate(['name' => $permission]);
}

$role = Role::where('name', 'Super Admin')->first();
if ($role) {
    $role->givePermissionTo($permissions);
    echo "Permissions added to Super Admin\n";
}
