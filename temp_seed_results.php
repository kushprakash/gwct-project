<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

$permissions = [
    'pathshala-exam-list', 'pathshala-exam-create', 'pathshala-exam-edit', 'pathshala-exam-delete',
    'pathshala-result-list', 'pathshala-result-create', 'pathshala-result-edit', 'pathshala-result-delete'
];

foreach ($permissions as $permission) {
    Permission::firstOrCreate(['name' => $permission]);
}

$role = Role::where('name', 'Super Admin')->first();
if ($role) {
    $role->givePermissionTo($permissions);
    echo "Pathshala exams and results permissions added to Super Admin\n";
}
