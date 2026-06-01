<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

$permissions = [
    'pathshala-homework-list', 'pathshala-homework-create', 'pathshala-homework-edit', 'pathshala-homework-delete'
];

foreach ($permissions as $permission) {
    Permission::firstOrCreate(['name' => $permission]);
}

$role = Role::where('name', 'Super Admin')->first();
if ($role) {
    $role->givePermissionTo($permissions);
    echo "Pathshala homework permissions added to Super Admin\n";
}
