<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::ordered()->get();
        return view('admin.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.plans.form', ['plan' => new Plan(['features' => []])]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);
        $data['features'] = array_values(array_filter(explode("\n", $request->input('features_text', ''))));
        Plan::create($data);
        return redirect(url('/admin/plans'))->with('status', 'Plan created successfully.');
    }

    public function edit(Plan $plan)
    {
        return view('admin.plans.form', compact('plan'));
    }

    public function update(Request $request, Plan $plan)
    {
        $data = $this->validated($request, $plan);
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);
        $data['features'] = array_values(array_filter(explode("\n", $request->input('features_text', ''))));
        $plan->update($data);
        return redirect(url('/admin/plans'))->with('status', 'Plan updated successfully.');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect(url('/admin/plans'))->with('status', 'Plan deleted.');
    }

    private function validated(Request $request, ?Plan $plan = null): array
    {
        return $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'nullable|string|max:100|unique:plans,slug' . ($plan ? ',' . $plan->id : ''),
            'tagline' => 'nullable|string|max:200',
            'price' => 'required|numeric|min:0',
            'billing_period' => 'required|string|max:20',
            'is_popular' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);
    }
}
