<?php

namespace App\Http\Livewire;

use App\Models\FactSales;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SalesTrend extends Component
{
    public array $years = [];
    public array $totals = [];

    public array $availableYears = [];
    public ?string $selectedYear = null;

    public function updatedSelectedYear($value)
    {
        $this->selectedYear = $value !== '' ? $value : null;
        $this->loadData();
    }

    public function mount()
    {
        $this->selectedYear = null;

        $this->availableYears = FactSales::query()
            ->join('DimTime', 'factsales.TimeKey', '=', 'DimTime.TimeKey')
            ->select('DimTime.Year')
            ->distinct()
            ->orderBy('DimTime.Year')
            ->pluck('Year')
            ->toArray();

        $this->loadData();

        // trigger initial render
        $this->dispatchBrowserEvent('purchasing-chart-init', [
            'labels' => $this->years,
            'totals' => $this->totals,
        ]);
    }


    private function loadData()
    {
        if ($this->selectedYear === null) {

            // ===== ALL YEARS =====
            $data = FactSales::query()
                ->join('DimTime', 'factsales.TimeKey', '=', 'DimTime.TimeKey')
                ->selectRaw('
                DimTime.Year AS label,
                SUM(factsales.LineTotal) AS total
            ')
                ->groupBy('DimTime.Year')
                ->orderBy('DimTime.Year')
                ->get();
        } else {

            // ===== PER MONTH (12 BULAN WAJIB MUNCUL) =====
            $data = DB::table('DimTime')
                ->leftJoin('factsales', 'DimTime.TimeKey', '=', 'factsales.TimeKey')
                ->where('DimTime.Year', $this->selectedYear)
                ->selectRaw('
                DimTime.Month AS label,
                COALESCE(SUM(factsales.LineTotal), 0) AS total
            ')
                ->groupBy('DimTime.Month')
                ->orderBy('DimTime.Month')
                ->get();
        }

        $this->years  = $data->pluck('label')->toArray();
        $this->totals = $data->pluck('total')->toArray();

        $this->dispatchBrowserEvent('purchasing-chart-update', [
            'labels' => $this->years,
            'totals' => $this->totals,
        ]);
    }

    public function render()
    {
        return view('livewire.sales-trend');
    }
}
