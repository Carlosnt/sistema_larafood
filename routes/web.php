<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\DetailPlanController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PermissionRoleController;
use App\Http\Controllers\Admin\ProfilePermissionController;
use App\Http\Controllers\Admin\PlanProfileController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::group(['namespace' => 'Web', 'as' => 'web.'], function () {

    /** Página Inicial */
    Route::get('/', [WebController::class, 'home'])->name('home');
    Route::get('/plan/{urlPlan}', [WebController::class, 'plan'])->name('plan.subscription');
    // Registration Routes...
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    /** Formulário de Login */
    // Authentication Routes..
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.do');


// Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    // Auth::routes();

    /** Planos */
    /** Rotas Protegidas */
    Route::group(['middleware' => ['auth']], function () {
        Route::get('home', [HomeController::class, 'index'])->name('home');
        /** Usuários */
        Route::resource('users', UserController::class);

        /** Usuário x cargos*/
        Route::delete('users/delete/{id}', [UserRoleController::class, 'delete'])->name('users.delete');
        Route::post('users/{id}/roles/{idRole}/detach', [UserRoleController::class, 'detachRoleUser'])->name('users.roles.detach');
        Route::post('users/{id}/roles/store', [UserRoleController::class, 'attachRoleUser'])->name('users.roles.attach');
        Route::get('users/{id}/roles/create/search', [UserRoleController::class, 'filterRolesFilter'])->name('users.roles.search');
        Route::any('users/{id}/roles/create', [UserRoleController::class, 'rolesAvailable'])->name('users.roles.available');
        Route::get('users/{id}/roles', [UserRoleController::class, 'roles'])->name('users.roles');
        Route::get('roles/{id}/role', [UserRoleController::class, 'users'])->name('roles.users');

        /** Tenants */
        Route::resource('tenants', TenantController::class);
        /** Planos */
        Route::resource('plans', PlanController::class);

        /** Detalhes dos planos */
        Route::delete('plans/delete/{plan}', [PlanController::class, 'delete'])->name('plans.delete');
        Route::get('plans/show/{plan}', [PlanController::class, 'show'])->name('plans.show');
        Route::get('plans/{url}/details', [DetailPlanController::class, 'index'])->name('details.plan.index');
        Route::get('plans/{url}/details/create', [DetailPlanController::class, 'create'])->name('details.plan.create');
        Route::post('plans/{url}/details/store', [DetailPlanController::class, 'store'])->name('details.plan.store');
        Route::put('plans/{url}/details/{id}/update', [DetailPlanController::class, 'update'])->name('details.plan.update');
        Route::get('plans/{url}/details/{id}/edit', [DetailPlanController::class, 'edit'])->name('details.plan.edit');
        Route::delete('plans/{url}/details/delete/{id}', [DetailPlanController::class, 'delete'])->name('details.plan.delete');

        /** Perfis */
//      Route::any('admin/profiles/search', [ProfileController::class, 'search'])->name('profiles.search');
        Route::resource('profiles', ProfileController::class);
        /** Cargos */
//      Route::any('admin/profiles/search', [ProfileController::class, 'search'])->name('profiles.search');
        Route::resource('roles', RoleController::class);
        /** Permissões x Roles */
        Route::delete('roles/delete/{id}', [PermissionRoleController::class, 'delete'])->name('roles.delete');
        Route::post('roles/{id}/permission/{idPermission}/detach', [PermissionRoleController::class, 'detachPermissionsRole'])->name('roles.permissions.detach');
        Route::post('roles/{id}/permission/store', [PermissionRoleController::class, 'attachPermissionsRole'])->name('roles.permissions.attach');
        Route::get('roles/{id}/permissions/create/search', [PermissionRoleController::class, 'filterPermissionsAvailable'])->name('roles.permissions.search');
        Route::any('roles/{id}/permissions/create', [PermissionRoleController::class, 'permissionsAvailable'])->name('roles.permissions.available');
        Route::get('roles/{id}/permissions', [PermissionRoleController::class, 'permissions'])->name('roles.permissions');
        Route::get('permissions/{id}/role', [PermissionRoleController::class, 'roles'])->name('permissions.roles');

        /** Permissões x Perfis */
        Route::delete('profiles/delete/{id}', [ProfileController::class, 'delete'])->name('profiles.delete');
        Route::post('profiles/{id}/permission/{idPermission}/detach', [ProfilePermissionController::class, 'detachPermissionsProfile'])->name('profiles.permissions.detach');
        Route::post('profiles/{id}/permission/store', [ProfilePermissionController::class, 'attachPermissionsProfile'])->name('profiles.permissions.attach');
        Route::get('profiles/{id}/permissions/create/search', [ProfilePermissionController::class, 'filterPermissionsAvailable'])->name('profiles.permissions.search');
        Route::any('profiles/{id}/permissions/create', [ProfilePermissionController::class, 'permissionsAvailable'])->name('profiles.permissions.available');
        Route::get('profiles/{id}/permissions', [ProfilePermissionController::class, 'permissions'])->name('profiles.permissions');
        Route::get('permissions/{id}/profile', [ProfilePermissionController::class, 'profiles'])->name('permissions.profiles');

        /** Planos x Perfis */
        Route::delete('plans/delete/{id}', [PlanProfileController::class, 'delete'])->name('profiles.delete');
        Route::post('plans/{id}/profiles/{idPermission}/detach', [PlanProfileController::class, 'detachProfilePlan'])->name('plans.profiles.detach');
        Route::post('plans/{id}/profiles/store', [PlanProfileController::class, 'attachProfilesPlan'])->name('plans.profiles.attach');
        Route::get('plans/{id}/profiles/create/search', [PlanProfileController::class, 'filterProfilesAvailable'])->name('plans.profiles.search');
        Route::any('plans/{id}/profiles/create', [PlanProfileController::class, 'profilesAvailable'])->name('plans.profiles.available');
        Route::get('plans/{id}/profiles', [PlanProfileController::class, 'profiles'])->name('plans.profiles');
        Route::get('profiles/{id}/plans', [PlanProfileController::class, 'plans'])->name('profiles.plans');

        /** Permissions */
        Route::resource('permissions', PermissionController::class);
        Route::delete('permissions/delete/{id}', [PermissionController::class, 'delete'])->name('permissions.delete');

        /** Categorias */
        //Route::delete('categories/delete/{category}', CategoryController::class);
        Route::resource('categories', CategoryController::class);

        /** Produtos */
        Route::resource('products', ProductController::class);

        /** Produtos x Categorias */
        Route::post('products/{id}/category/{idCategory}/detach', [CategoryProductController::class, 'detachCategoriesProduct'])->name('products.categories.detach');
        Route::post('products/{id}/categories/store', [CategoryProductController::class, 'attachCategoriesProduct'])->name('products.categories.attach');
        Route::get('products/{id}/categories/create/search', [CategoryProductController::class, 'filterProfilesAvailable'])->name('products.categories.search');
        Route::any('products/{id}/categories/create', [CategoryProductController::class, 'categoriesAvailable'])->name('products.categories.available');
        Route::get('products/{id}/categories', [CategoryProductController::class, 'categories'])->name('products.categories');
        Route::get('categories/{id}/products', [CategoryProductController::class, 'products'])->name('categories.plans');

        /** Mesas */
        Route::resource('tables', TableController::class);

    });

    /** Logout */
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

