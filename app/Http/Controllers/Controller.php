<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\ExpensesLog;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function save_expenses(Request $request)
    {
        $log = new ExpensesLog;
        $log->description = $request->description;
        $log->amount = $request->amount;
        $res = $log->save();

        // dd($log);

        return $res;
    }
    
    public function show_table(Request $request)
    {
        $logs = ExpensesLog::all();
        $total = ExpensesLog::sum('amount');
        
        return view('table', compact('logs', 'total'));
    }
}
