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
    return redirect()->route('login');
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

    // ROUTE USERS
    Route::group(['prefix' => 'users', 'middleware' => 'App\Http\Middleware\Authuser'], function () {
        // DASBOARD
        Route::group(['prefix' => 'dashboard'], function () {
            Route::get('/dashboard/supports', 'PagesController@supports')->name('supports');
            Route::get('/dashboard/supports/new-message', 'PagesController@supportCreate')->name('supports.create');
            Route::post('/dashboard/supports', 'PagesController@supportStore')->name('supports.store');
            Route::delete('/dashboard/supports/suppression/{id}', 'PagesController@supportDelete')->name('supports.delete');
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

    // ROUTE ADMIN 'middleware' => 'App\Http\Middleware\Authadmin'
    Route::group(['prefix' => 'admin/dashboard'], function () {
        // UTILISATEURS
        Route::group(['prefix' => 'compte'], function() {
            /* Admin register */
                Route::get('/inscription', 'UserController@create')->name('admin.register');
                Route::post('/inscrire', 'UserController@store')->name('admin.registered');
                Route::get('/inscription/{token}/activation', 'Auth\VerificationController@activate')->name('admin.activate');
                Route::get('/activation/{token}/refresh', 'Auth\VerificationController@refreshActivationLink')->name('admin.refresh.activation');

            /* Admin register */

            /* Utilisateurs */
                // Route::get('users', 'UserController@entete')->name('users.entete')->middleware(['permission:voir_users']);

                Route::get('/', 'UserController@index')->name('compte.users.index');
                Route::get('/utilisateur/{token}', 'UserController@show')->name('compte.users.show')->middleware(['permission:voir utilisateur']);
                Route::get('/utilisateur/{token}/edit', 'UserController@edit')->name('compte.users.edit');
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

        Route::group(['prefix' => 'dossiers'], function() {
            /* Comptes Admin */
                Route::get('/', 'DossiersController@index')->name('admin.allDossiers');
                Route::get('/traite-dossier/{id}', 'DossiersController@traiteDossierUpdate')->name('admin.traiteDossieerUpdate');
                Route::get('/show-dossier/{dossier_id}', 'DossiersController@dossierShow')->name('admin.DossierShow');

                Route::get('/add-complement-doc/{dossier_id}', 'DossiersController@addComplementDoc')->name('admin.addComplementDoc');
                Route::post('/add-complement-doc', 'DossiersController@addComplementDocStore')->name('admin.addComplementDoc.store');


                Route::post('/observation', 'ObservationController@store')->name('admin.observations.store');
                Route::put('/observation/{id}', 'ObservationController@update')->name('admin.observations.update');

                Route::get('/assigned-fond', 'FondDossierController@index')->name('assigned-fond.index');
                Route::get('/assigned-fond/approve/{id}', 'FondDossierController@show')->name('assigned-fond.show');


                Route::get('/traite-dossier/test/{id}', 'DossiersController@traiteDossierShow')->name('admin.traiteDossieerShow');
                Route::get('/compte/profil', 'CompteController@show')->name('admin.profile');
                Route::post('/compte/{id}/modifier-profil', 'CompteController@profileUpdate')->name('admin.profile.update');
                Route::post('/compte/modifier-mot-passe', 'CompteController@passwordUpdate')->name('admin.password.update');
                Route::get('/deconnexion', 'CompteController@logout')->name('admin.logout');
            /* Comptes Admin */
        });

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
