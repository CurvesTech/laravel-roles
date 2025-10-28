<?php

namespace Curvestech\LaravelRoles\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallRolesCommand extends Command
{
    protected $signature = 'roles:install';
    protected $description = 'Install roles and permissions migrations.';

    private function migrationsPath(): string
    {
        return __DIR__ . '/../../database/migrations/';
    }

    public function handle()
    {
        $migrationsPath = $this->migrationsPath();
        $timestamp = date('Y_m_d_His');

        // Roles migration
        
        $rolesMigrationTarget = $migrationsPath . "{$timestamp}_create_roles_table.php";
        $permissionMigrationTarget = $migrationsPath . ($timestamp + 1) . "_create_permissions_table.php";

        $createRolesTableStub = $this->getRolesMigrationStub();
        File::put($rolesMigrationTarget, $createRolesTableStub);
        $this->info("Created Roles migration: " . basename($rolesMigrationTarget));
        // Permissions migration
        $createPermissionsTableStub = $this->getPermissionsMigrationStub();
        File::put($permissionMigrationTarget, $createPermissionsTableStub);
        $this->info("Created Permissions migration: " . basename($permissionMigrationTarget));
    }

    private function getRolesMigrationStub(): string
    {
        return File::get(__DIR__ . '/../../stubs/create_roles_table.stub');
    }

    private function getPermissionsMigrationStub(): string
    {
        return File::get(__DIR__ . '/../../stubs/create_permissions_table.stub');
    }
}