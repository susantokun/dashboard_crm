<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Q_farh;
use App\Models\Q_fpyh;
use App\Models\Q_sorb;
use App\Models\Q_sord;
use App\Models\Q_sorh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
        // $tanggal = (new Carbon())->subDays(2)->startOfDay()->toDateString();
        $dateNow = Carbon::now();
        // return $tanggal;
        $year = $dateNow->isoFormat('Y');
        $month = $dateNow->isoFormat('MM');
        $day = $dateNow->isoFormat('DD');

        $period = $request->period;
        $kd_prsh = $request->kd_prsh;
        $textLabel = '';

        if ($period == "001") {
            $day = 7;
            $textLabel = '7 hari tearkhir';
        } else if ($period == "002") {
            $day = 30;
            $textLabel = '30 hari terakhir';
        } else if ($period == "003") {
            $month = $month - 1;
            $textLabel = 'Bulan lalu (' . $month . ')';
        } else if ($period == "004") {
            $year = $year;
            $textLabel = 'Tahun ' . $year;
        } else if ($period == "005") {
            $year = $year - 1;
            $textLabel = 'Tahun ' . $year;
        }

        // $qPurh = DB::select("
        //     SELECT a.kd_purd, a.kd_vend, c.tx_mtra as 'supplier',
        //     i.jl_kuan as 'po',

        //     IFNULL(
        //     (SELECT SUM(h.jl_kuan) FROM q_mvth AS g
        //     LEFT JOIN q_mvtd AS h ON h.kd_matv=g.kd_matv AND h.kd_prsh=g.kd_prsh
        //     WHERE g.kd_prsh='$kd_prsh' AND kd_purd=a.kd_purd
        //     )
        //     ,0) AS 'delivered_all',

        //     IFNULL(
        //     (SELECT SUM(k.jl_kuan) FROM q_mvth AS j
        //     LEFT JOIN q_mvtd AS k ON k.kd_matv=j.kd_matv AND k.kd_prsh=j.kd_prsh
        //     WHERE MONTH(j.tg_matv)='$month' AND YEAR(j.tg_matv)='$year' AND j.kd_prsh='$kd_prsh' AND j.kd_purd=a.kd_purd)
        //     ,0) AS 'delivered_this_month',

        //     IFNULL(
        //     (SELECT SUM(l.tx_ref1) FROM q_mvth AS l
        //     LEFT JOIN q_mvtd AS m ON m.kd_matv=l.kd_matv AND m.kd_prsh=l.kd_prsh
        //     WHERE l.tg_matv='$tanggal' AND l.kd_prsh='$kd_prsh' AND l.kd_purd=a.kd_purd
        //     )
        //     ,0) AS 'delivered_today',

        //     IFNULL(
        //     (SELECT (o.jl_kuan - sum(n.jl_kuan)) FROM q_purh AS d
        //     LEFT JOIN q_purd AS o ON o.kd_purd=d.kd_purd AND o.kd_prsh=d.kd_prsh
        //     LEFT JOIN q_mvth AS e ON e.kd_purd = d.kd_purd
        //     LEFT JOIN q_mvtd AS n ON n.kd_matv=e.kd_matv AND n.kd_prsh=e.kd_prsh
        //     WHERE d.kd_prsh='$kd_prsh' AND d.kd_purd=a.kd_purd AND d.fl_dlco = '' AND d.tp_purc = 'PO01' AND e.tp_matv='RPO1'
        //     AND MONTH(e.tg_matv)='$month' AND YEAR(e.tg_matv)='$year'
        //     )
        //     ,0) AS 'outstanding_this_month'

        //     FROM q_purh AS a
        //     LEFT JOIN q_purd AS i ON i.kd_purd=a.kd_purd AND i.kd_prsh=a.kd_prsh
        //     LEFT JOIN q_mvth AS b ON b.kd_purd=a.kd_purd AND b.kd_prsh=a.kd_prsh
        //     LEFT JOIN m_mtra AS c ON c.no_hnpn=a.kd_vend AND b.kd_prsh=a.kd_prsh
        //     LEFT JOIN q_mvtd AS f ON f.kd_matv=b.kd_matv AND b.kd_prsh=a.kd_prsh
        //     WHERE a.kd_prsh='$kd_prsh' AND a.fl_dlco = '' AND a.tp_purc = 'PO01' AND b.tp_matv='RPO1'
        //     GROUP BY a.kd_purd
        // ");

        // $total_delivered_this_month = 0;
        // $total_outstanding_this_month = 0;
        // foreach ($qPurh as $value) {
        //     $total_delivered_this_month += $value->delivered_this_month;
        //     $total_outstanding_this_month += $value->outstanding_this_month;
        // }

        $countLastYearProjectQuery = Q_sorh::query();
        $countLastYearProjectQuery->where('kd_prsh', $kd_prsh)
            // ->where('tx_tahn', $year)
            ->whereHas(
                't_sord',
                fn ($query) => $query
                    ->where('kd_prsh', $kd_prsh)
                    ->where('tp_doku', 'SALES1')
            );
        if ($period == '004' || $period == '005') {
            $countLastYearProjectQuery->whereYear('tg_sord', $year);
        } else if ($period == '003') {
            $countLastYearProjectQuery->whereYear('tg_sord', $year);
            $countLastYearProjectQuery->whereMonth('tg_sord', $month);
        } else {
            $countLastYearProjectQuery->whereBetween(
                'tg_sord',
                [
                    (new Carbon())->subDays($day)->startOfDay()->toDateString(),
                    (new Carbon)->now()->endOfDay()->toDateString()
                ]
            );
        }
        $countLastYearProject = $countLastYearProjectQuery->count();

        $countLastYearSalesQuery = Q_sorh::query();
        $countLastYearSalesQuery->where('kd_prsh', $kd_prsh)
            // ->where('tx_tahn', $year)
            ->where('fl_paid', '')
            ->whereHas(
                't_sord',
                fn ($query) => $query
                    ->where('kd_prsh', $kd_prsh)
                    ->where('tp_doku', 'SALES1')
            );
        if ($period == '004' || $period == '005') {
            $countLastYearSalesQuery->whereYear('tg_sord', $year);
        } else if ($period == '003') {
            $countLastYearSalesQuery->whereYear('tg_sord', $year);
            $countLastYearSalesQuery->whereMonth('tg_sord', $month);
        } else {
            $countLastYearSalesQuery->whereBetween(
                'tg_sord',
                [
                    (new Carbon())->subDays($day)->startOfDay()->toDateString(),
                    (new Carbon)->now()->endOfDay()->toDateString()
                ]
            );
        }

        $countLastYearSales = $countLastYearSalesQuery->sum('nl_sord');

        $countOutstandingBillQuery = Q_sorb::query();
        $countOutstandingBillQuery->where('kd_prsh', $kd_prsh)
            // ->where('tx_tahn', $year)
            ->where('fl_paid', '');
        if ($period == '004' || $period == '005') {
            $countOutstandingBillQuery->whereYear('tg_bill', $year);
        } else if ($period == '003') {
            $countOutstandingBillQuery->whereYear('tg_bill', $year);
            $countOutstandingBillQuery->whereMonth('tg_bill', $month);
        } else {
            $countOutstandingBillQuery->whereBetween(
                'tg_bill',
                [
                    (new Carbon())->subDays($day)->startOfDay()->toDateString(),
                    (new Carbon)->now()->endOfDay()->toDateString()
                ]
            );
        }
        $countOutstandingBill = $countOutstandingBillQuery->sum('nl_bill');

        $countActiveProjectQuery = Q_sorh::query();
        $countActiveProjectQuery->where('kd_prsh', $kd_prsh)
            ->where('fl_paid', '')
            ->where('fl_cncl', '');
        if ($period == '004' || $period == '005') {
            $countActiveProjectQuery->whereYear('tg_sord', $year);
        } else if ($period == '003') {
            $countActiveProjectQuery->whereYear('tg_sord', $year);
            $countActiveProjectQuery->whereMonth('tg_sord', $month);
        } else {
            $countActiveProjectQuery->whereBetween(
                'tg_sord',
                [
                    (new Carbon())->subDays($day)->startOfDay()->toDateString(),
                    (new Carbon)->now()->endOfDay()->toDateString()
                ]
            );
        }
        $countActiveProject = $countActiveProjectQuery->count();

        $qSord = Q_sord::query();
        $qSord->where('kd_prsh', $kd_prsh);
        if ($period == '004' || $period == '005') {
            $qSord->whereYear('tg_sord', $year);
        } else if ($period == '003') {
            $qSord->whereYear('tg_sord', $year);
            $qSord->whereMonth('tg_sord', $month);
        } else {
            $qSord->whereBetween(
                'tg_sord',
                [
                    (new Carbon())->subDays($day)->startOfDay()->toDateString(),
                    (new Carbon)->now()->endOfDay()->toDateString()
                ]
            );
        }
        $qSord->select(DB::raw('count(kd_sord) as `data`'), DB::raw('YEAR(tg_sord) label'), DB::raw('nl_sord as score'))
            ->groupBy('label');

        $qSordBestSeller = Q_sord::query();
        $qSordBestSeller->where('kd_prsh', $kd_prsh);

        if ($period == '004' || $period == '005') {
            $qSordBestSeller->whereYear('tg_sord', $year);
        } else if ($period == '003') {
            $qSordBestSeller->whereYear('tg_sord', $year);
            $qSordBestSeller->whereMonth('tg_sord', $month);
        } else {
            $qSordBestSeller->whereBetween(
                'tg_sord',
                [
                    (new Carbon())->subDays($day)->startOfDay()->toDateString(),
                    (new Carbon)->now()->endOfDay()->toDateString()
                ]
            );
        }

        $qSordBestSeller->with('m_matr', fn ($query) => $query->select('kd_matr', 'tx_matr'))
            ->groupBy('kd_matr')
            ->orderBy('score', 'desc')
            ->limit(5);

        return response()->json([
            'qSord' => $qSord->get(),
            'qSordBestSeller' => Q_sorbBestSellerResource::collection($qSordBestSeller->get(['kd_matr', DB::raw('sum(jl_kuan) as score')])),
            'countLastYearProject' => number_format($countLastYearProject, 0, ',', '.'),
            'countLastYearSales' => number_format($countLastYearSales, 0, ',', '.'),
            'countOutstandingBill' => number_format($countOutstandingBill, 0, ',', '.'),
            'countActiveProject' => number_format($countActiveProject, 0, ',', '.'),
            'textLabel' => $textLabel,
        ]);
    }
}
