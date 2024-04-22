<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Modules;
use App\Models\User;
use App\Models\Groups;
use App\Models\Post;
use App\Policies\GroupsPolicy;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class => PostPolicy::class,
        User::class => UserPolicy::class,
        Groups::class => GroupsPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //

        $moduleList = Modules::all();

        if($moduleList -> count() > 0){
            foreach($moduleList as $module){
                Gate::define($module -> name, function (User $user) use ($module){
                    $roleJson = $user -> group-> permissions;
                    if(!empty($roleJson)){
                        $roleArr = json_decode($roleJson, true);

                        $check = isRole($roleArr, $module->name);
                        return $check;
                    }

                    return false;
                } );

                Gate::define($module -> name.'.add', function (User $user) use ($module){
                    $roleJson = $user -> group-> permissions;
                    if(!empty($roleJson)){
                        $roleArr = json_decode($roleJson, true);

                        $check = isRole($roleArr, $module->name, 'add');
                        return $check;
                    }

                    return false;
                } );

                Gate::define($module -> name.'.edit', function (User $user) use ($module){
                    $roleJson = $user -> group-> permissions;
                    if(!empty($roleJson)){
                        $roleArr = json_decode($roleJson, true);

                        $check = isRole($roleArr, $module->name, 'edit');
                        return $check;
                    }

                    return false;
                } );

                Gate::define($module -> name.'.delete', function (User $user) use ($module){
                    $roleJson = $user -> group-> permissions;
                    if(!empty($roleJson)){
                        $roleArr = json_decode($roleJson, true);

                        $check = isRole($roleArr, $module->name, 'delete');
                        return $check;
                    }

                    return false;
                } );

                Gate::define($module -> name.'.permission', function (User $user) use ($module){
                    $roleJson = $user -> group-> permissions;
                    if(!empty($roleJson)){
                        $roleArr = json_decode($roleJson, true);

                        $check = isRole($roleArr, $module->name, 'permission');
                        return $check;
                    }

                    return false;
                } );
            }
        }
    }
}
