<?php

namespace App\Http\Controllers;

use App\Models\Q_sorb;
use Illuminate\Http\Request;

class Q_sorbController extends Controller
{
    public function table(Request $request)
    {
        $search = $request->search;
        $per_page = $request->per_page ?? 10;
        $field = $request->field;
        $direction = $request->direction;

        $request->validate([
            'direction' => ['in:asc,desc'],
            'field' => ['in:kd_bill'],
        ]);

        $query = Q_sorb::query()->whereKdPrsh();

        $query->when($search, function ($query) use ($search) {
            $query->where('kd_bill', "%{$search}%");
        });

        if ($request->has(['field', 'direction'])) {
            $query->orderBy($field, $direction);
        } else {
            $query->orderBy('tg_bill', 'desc');
        }

        $query
            ->with('m_mtra', fn ($query) => $query->where('kd_prsh', auth()->user()->kd_prsh)->select('kd_mtra', 'tx_mtra'))
            ->select(
                'kd_prsh',
                'kd_bill',
                'tp_bill',
                'kd_cust',
                'tx_bill',
                'tg_bill',
                'nl_bill',
                'tx_kurs',
            );

        $billings = $query->paginate($per_page)->withQueryString();
        return view('backend.pages.billings.table', [
            'billings' => $billings,
        ]);
    }
}
