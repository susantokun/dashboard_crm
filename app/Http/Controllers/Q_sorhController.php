<?php

namespace App\Http\Controllers;

use App\Models\Q_sorh;
use Illuminate\Http\Request;

class Q_sorhController extends Controller
{
    public function table(Request $request)
    {
        $search = $request->search;
        $per_page = $request->per_page ?? 10;
        $field = $request->field;
        $direction = $request->direction;

        $fl_hakh = $request->fl_hakh ?? '';
        $fl_aprv = $request->fl_aprv ?? '';

        $request->validate([
            'direction' => ['in:asc,desc'],
            'field' => ['in:kd_sord'],
        ]);

        $query = Q_sorh::query()
            ->whereKdPrsh()
            ->where('kd_sord', 'like', 'SD%')
            ->where('fl_hakh', $fl_hakh)
            ->where('fl_aprv', $fl_aprv);

        $query->when($search, function ($query) use ($search) {
            $query->where('kd_sord', "%{$search}%");
        });

        if ($request->has(['field', 'direction'])) {
            $query->orderBy($field, $direction);
        } else {
            $query->orderBy('tg_sord', 'desc');
        }

        $query
            ->with('m_mtra', fn ($query) => $query->where('kd_prsh', auth()->user()->kd_prsh)->select('kd_mtra', 'tx_mtra'))
            ->select(
                'kd_prsh',
                'kd_sord',
                'tp_sord',
                'kd_cust',
                'tx_sord',
                'tg_sord',
                'nl_sord',
                'kd_kurs',
            );

        $qSorh = $query->paginate($per_page)->withQueryString();
        return view('backend.pages.sales-orders.table', [
            'qSorh' => $qSorh,
        ]);
    }

    public function salesOrder(Request $request)
    {
        $search = $request->search;
        $per_page = $request->per_page ?? 10;
        $field = $request->field;
        $direction = $request->direction;

        $fl_hakh = $request->fl_hakh ?? '';
        $fl_aprv = $request->fl_aprv ?? '';

        $request->validate([
            'direction' => ['in:asc,desc'],
            'field' => ['in:kd_sord'],
        ]);

        $query = Q_sorh::query()
            ->whereKdPrsh()
            ->where('tp_sord', 'like', 'SD%')
            ->where('fl_hakh', $fl_hakh)
            ->where('fl_aprv', $fl_aprv);

        $query->when($search, function ($query) use ($search) {
            $query->where('kd_sord', "%{$search}%");
        });

        if ($request->has(['field', 'direction'])) {
            $query->orderBy($field, $direction);
        } else {
            $query->orderBy('tg_sord', 'desc');
        }

        $query
            ->with('m_mtra', fn ($query) => $query->where('kd_prsh', auth()->user()->kd_prsh)->select('kd_mtra', 'tx_mtra'))
            ->select(
                'kd_prsh',
                'kd_sord',
                'tp_sord',
                'kd_cust',
                'tx_sord',
                'tg_sord',
                'nl_sord',
                'kd_kurs',
            );

        $salesOrders = $query->paginate($per_page)->withQueryString();
        return view('backend.pages.sales-orders.table', [
            'salesOrders' => $salesOrders,
        ]);
    }

    public function salesContract(Request $request)
    {
        $search = $request->search;
        $per_page = $request->per_page ?? 10;
        $field = $request->field;
        $direction = $request->direction;

        $fl_hakh = $request->fl_hakh ?? '';
        $fl_aprv = $request->fl_aprv ?? '';

        $request->validate([
            'direction' => ['in:asc,desc'],
            'field' => ['in:kd_sord'],
        ]);

        $query = Q_sorh::query()
            ->whereKdPrsh()
            ->where('tp_sord', 'like', 'SP%')
            ->where('fl_hakh', $fl_hakh)
            ->where('fl_aprv', $fl_aprv);

        $query->when($search, function ($query) use ($search) {
            $query->where('kd_sord', "%{$search}%");
        });

        if ($request->has(['field', 'direction'])) {
            $query->orderBy($field, $direction);
        } else {
            $query->orderBy('tg_sord', 'desc');
        }

        $query
            ->with('m_mtra', fn ($query) => $query->where('kd_prsh', auth()->user()->kd_prsh)->select('kd_mtra', 'tx_mtra'))
            ->select(
                'kd_prsh',
                'kd_sord',
                'tp_sord',
                'kd_cust',
                'tx_sord',
                'tg_sord',
                'nl_sord',
                'kd_kurs',
            );

        $salesContracts = $query->paginate($per_page)->withQueryString();
        return view('backend.pages.sales-contracts.table', [
            'salesContracts' => $salesContracts,
        ]);
    }
}
