<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Hash;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Intalls all the basic functions for the site to work.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // creates a user
        $user = User::create([
            'username' => 'demouser1',
            'name' => 'Site Admin',
            'password' => Hash::make('password'),
        ]);

        // creates a superadmin role
        $role = new Role();
        $role->name = 'superadmin';
        $role->display_name = 'SuperAdmin';
        $role->guard_name = 'web';
        $role->save();

        // creates all the required permissions
        $permission_list = \Config::get('constants.site_permissions');
        foreach($permission_list as $permission) {
            Permission::create(
                ['name' => $permission],
            );
        }

        // assigns all the permissions to the rank
        $role->syncPermissions([$permission_list]);

        // assigns the user the superadmin role
        $user->syncRoles('superadmin');

        $this->info("Application fully installed and setup!");
    }
}
