<?php

namespace App\Helpers;

use Request;
use App\Models\LogActivitie as LogActivitieModel;

class LogActivity
{
    public static function addToLog($subject)
    {
    	$log = [];
    	$log['subject'] = $subject;
    	$log['url'] = Request::fullUrl();
    	$log['method'] = Request::method();
		$log['ip'] = Request::ip();
		$log['secure'] = Request::secure() ? 'HTTPS' : 'HTTP';
    	$log['agent'] = Request::header('user-agent');
    	$log['user_id'] = auth()->check() ? auth()->user()->id : null;
    	LogActivitieModel::create($log);
    }

    public static function logActivityLists()
    {
    	return LogActivitieModel::latest()->paginate(10);
    }
}
