<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::orderByDesc('is_default')->orderBy('code')->get();
        return view('admin.currencies', compact('currencies'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        Currency::create($data);
        return redirect(url('/admin/currencies'))->with('status', 'Currency added.');
    }

    public function update(Request $request, Currency $currency)
    {
        $data = $this->validated($request, $currency);
        if ($request->boolean('is_default')) {
            Currency::where('id', '!=', $currency->id)->update(['is_default' => false]);
        }
        $currency->update($data);
        return redirect(url('/admin/currencies'))->with('status', 'Currency updated.');
    }

    public function destroy(Currency $currency)
    {
        if ($currency->is_default) {
            return back()->withErrors(['currency' => 'Cannot delete the default currency.']);
        }
        $currency->delete();
        return redirect(url('/admin/currencies'))->with('status', 'Currency deleted.');
    }

    private function validated(Request $request, ?Currency $currency = null): array
    {
        return $request->validate([
            'code' => 'required|string|size:3|unique:currencies,code' . ($currency ? ',' . $currency->id : ''),
            'name' => 'required|string|max:50',
            'symbol' => 'required|string|max:5',
            'flag_emoji' => 'nullable|string|max:10',
            'exchange_rate' => 'required|numeric|min:0.000001',
            'is_default' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);
    }
}
