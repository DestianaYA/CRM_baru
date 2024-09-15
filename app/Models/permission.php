<?php
namespace App\Models;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

// Create roles
$role = Role::create(['name' => 'agent']);

// Assign role to user
$user = Auth::user();
$user->assignRole('agent');
