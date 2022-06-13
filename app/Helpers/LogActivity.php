<?php


namespace App\Helpers;
use App\Models\LogActivity as LogActivityModel;
use Illuminate\Support\Facades\Request as FacadesRequest;

class LogActivity
{
    public static function addToLog($subject)
    {
        $log = [];
        $log['subject'] = $subject;
        $log['url'] = FacadesRequest::fullUrl();
        $log['method'] = FacadesRequest::method();
        $log['ip'] = FacadesRequest::ip();
        $log['agent'] = FacadesRequest::header('user-agent');
        $log['user_id'] = auth()->check() ? auth()->user()->id : 1;
        LogActivityModel::create($log);
    }


    public static function logActivityLists()
    {
        return LogActivityModel::latest()->get();
    }


}
