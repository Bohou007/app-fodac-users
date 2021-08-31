<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as PermissionSpatie;


class Permission extends PermissionSpatie
{
    public static function defaultPermissions()
    {
        return [
            'voir_users',
            'ajouter_users',
            'editer_users',
            'supprimer_users',

            'voir_roles',
            'ajouter_roles',
            'editer_roles',
            'supprimer_roles',

            'voir_logs',
            'ajouter_logs',
            'editer_logs',
            'supprimer_logs',

            'voir_dossiers',
            'ajouter_dossiers',
            'editer_dossiers',
            'supprimer_dossiers',

            'voir_planning',
            'ajouter_planning',
            'editer_planning',
            'supprimer_planning',

            'traiter_dossiers',
            'valider_dossiers',
            'approuver_dossiers',
            'desapprouve_dossiers',
            'ajouter_fonds_dossiers',

            'fodac_agent',
        ];
    }
}
