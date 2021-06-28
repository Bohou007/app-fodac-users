<?php

use App\Models\Permission;
use Illuminate\Support\Facades\Route;



if (! function_exists('set_active_route')) {

    function set_active_route($route){
         return Route::is($route) ? 'active' : '';
    }
}

if (! function_exists('page_title')) {

    function page_title($title){
         $base_title = 'Fodac';
        if ($title === '') {
            return $base_title;
        } else {
            return $title . ' - '. $base_title;
        }
    }
}

  if (! function_exists('format_date')) {
      function format_date($date){
        return $date->format('d/m/Y H:i');

      }
  }

  if (! function_exists('nombre_permission')) {
      function nombre_permission($role){
        $permission = Permission::role($role)->get();

        return $permission->count();

      }
  }

?>
