<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::group([
//     'middleware' => 'App\Http\Middleware\Auth_guard',
// ],
// function () {
// });

Auth::routes();

Route::group([
    'middleware' => 'App\Http\Middleware\Auth',
],
function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/notifications', 'NotificationController@index')->name('notification.index');
    Route::get('/dashboard/supports', 'PagesController@supports')->name('supports');
    Route::post('/dashboard/supports', 'PagesController@supportStore')->name('supports.store');
    // ROUTE USERS
    Route::group(['prefix' => 'users', 'middleware' => 'App\Http\Middleware\Authuser'], function () {
        // DASBOARD
        Route::group(['prefix' => 'dashboard'], function () {

            //Dossiers User
            Route::get('/consultation-dossier', 'DossiersUsController@index')->name('dossiers.index');
            Route::get('/demande-soutien', 'DossiersUsController@create')->name('dossiers.create');
            Route::post('/demande-soutien-post', 'DossiersUsController@store')->name('dossiers.store');
            Route::get('/consultation-dossier/{dossiers}', 'DossiersUsController@show')->name('dossiers.show');
            Route::resource('profile', 'ProfileController');
            Route::resource('/documents-administrative', 'DocumentsController');

            Route::resource('/document-complementaires', 'DocComplementaireController');
            /* Comptes utilisateur */
                Route::get('/accueil', 'CompteController@index')->name('compte.home');
            /* Comptes utilisateur */
        });
    });

    // ROUTE ADMIN
    Route::group(['prefix' => 'admin', 'middleware' => 'App\Http\Middleware\Authadmin'], function () {
        // UTILISATEURS
        Route::group(['prefix' => 'compte'], function() {
            /* Admin register */
                Route::get('/inscription', 'UserController@create')->name('admin.register')->middleware(['permission:ajouter_users']);
                Route::post('/inscrire', 'UserController@store')->name('admin.registered')->middleware(['permission:ajouter_users']);
            /* Admin register */

            /* Utilisateurs */
                // Route::get('users', 'UserController@entete')->name('users.entete')->middleware(['permission:voir_users']);

                Route::get('', 'UserController@index')->name('compte.users.index');
                Route::get('/utilisateur/{token}', 'UserController@show')->name('compte.users.show')->middleware(['permission:voir utilisateur']);
                Route::get('/utilisateur/{token}/edit', 'UserController@edit')->name('compte.users.edit')->middleware(['permission:modifier utilisateur']);
                Route::post('/utilisateur/{user}/update', 'UserController@update')->name('compte.users.update')->middleware(['permission:modifier utilisateur']);
                Route::get('/utilisateurs/desactives', 'UserController@trasheds')->name('compte.users.trasheds')->middleware(['permission:voir utilisateur']);
                Route::get('/utilisateur/{token}/supprimer', 'UserController@destroy')->name('compte.users.delete')->middleware(['permission:supprimer utilisateur']);
                Route::get('/utilisateur/{token}/desactive', 'UserController@trashed')->name('compte.users.trashed')->middleware(['permission:voir utilisateur']);
                Route::get('/utilisateur/{token}/reactiver', 'UserController@restore')->name('compte.users.restore')->middleware(['permission:supprimer utilisateur']);
            /* Utilisateurs */
        });
        // DASBOARD
        Route::group(['prefix' => 'dash'], function() {
            /* Comptes Admin */
                Route::get('/compte/accueil', 'CompteController@index')->name('admin.home');
                Route::get('/compte/profil', 'CompteController@show')->name('admin.profile');
                Route::post('/compte/{id}/modifier-profil', 'CompteController@profileUpdate')->name('admin.profile.update');
                Route::post('/compte/modifier-mot-passe', 'CompteController@passwordUpdate')->name('admin.password.update');
                Route::get('/deconnexion', 'CompteController@logout')->name('admin.logout');
            /* Comptes Admin */
        });
        // GESTION DES ROLES

        Route::group(['prefix' => 'roles'], function() {
            /* Roles */
                Route::get('/', 'RoleController@index')->name('admin.roles');
                Route::get('/role/nouveau', 'RoleController@create')->name('admin.role.create');
                Route::post('/role/store', 'RoleController@store')->name('admin.role.store');
                Route::get('/role/{role}/afficher', 'RoleController@show')->name('admin.role.show');
                Route::get('/role/{role}/edition', 'RoleController@edit')->name('admin.role.edit');
                Route::post('/role/{id}/update', 'RoleController@update')->name('admin.role.update');
                Route::get('/role/{id}/delete', 'RoleController@destroy')->name('admin.role.delete');
            /* Roles */
        });
        // LOGS ACTIVITIES
        Route::group(['prefix' => 'logs'], function() {
            /* Log Activity */
                Route::get('/listes', 'LogSystemController@logActivity')->name('admin.logs')->middleware(['permission:voir_logs']);
                Route::get('/log/{id}/afficher', 'LogSystemController@show')->name('admin.log.show')->middleware(['permission:voir_logs']);
                Route::get('/log/{id}/supprimer', 'LogSystemController@destroy')->name('admin.log.delete')->middleware(['permission:supprimer_logs']);
            /* Log Activity */
        });
    });

}
);
