<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class ReportController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $report = DB::table('costs')
        ->join('revenues', 'revenues.campaign_id', 'costs.campaign_id')
        ->select(
            'costs.campaign_id AS campaign_id',
            'costs.amount AS cost_amount',
            'costs.date AS date'
        )
        ->selectRaw('SUM(revenues.amount) AS total_revenue')
        ->selectRaw('(SUM(revenues.amount) - costs.amount) AS profit')
        ->groupBy('costs.campaign_id', 'costs.date')
        ->get();
        return response()->json($report, 200);
    }
}
