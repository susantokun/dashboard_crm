<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Q_sord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Q_sorbBestSellerResource;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // // $qSord = Q_sord::where('kd_prsh', 'ALSN')
        // //     ->where('tx_tahn', '2021')
        // //     ->with('m_matr', fn ($query) => $query->select('kd_matr', 'tx_matr'))
        // //     ->groupBy('kd_matr')
        // //     ->orderBy('score', 'desc')
        // //     ->limit(5)
        // //     ->get(['kd_matr', DB::raw('sum(jl_kuan) as score')]);

        // // return Q_sorbBestSellerResource::collection($qSord);

        // $period = '005';
        // $day = '7';

        // $qSord = Q_sord::query();
        // $qSord->where('kd_prsh', 'ALSN');

        // if ($period == '004' || $period == '005') {
        //     $qSord->whereYear('tg_sord', '2021');
        // } else {
        //     $qSord->whereDateBetween(
        //         'tg_sord',
        //         (new Carbon())->subDays($day)->startOfDay()->toDateString(),
        //         (new Carbon)->now()->endOfDay()->toDateString()
        //     );
        // }

        // dd($qSord->get());

        return view('frontend.pages.home');
    }
}
