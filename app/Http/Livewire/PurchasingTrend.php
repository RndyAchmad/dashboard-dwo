<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\FactPurchasing;
use Illuminate\Support\Facades\DB;

class PurchasingTrend extends Component
{
    public string $filter = 'year';
    public array $labels = [];
    public array $values = [];

    public function mount()
    {
        $this->loadData();
    }

    public function updatedFilter()
    {
        $this->loadData();
    }

    private function loadData(): void
    {
        $baseQuery = FactPurchasing::join(
            'dimtime',
            'factpurchasing.TimeKey',
            '=',
            'dimtime.TimeKey'
        );

        if ($this->filter === 'month') {
            $data = $baseQuery
                ->select(
                    DB::raw("CONCAT(dimtime.MonthName, ' ', dimtime.Year) AS label"),
                    DB::raw("SUM(factpurchasing.LineTotal) AS total_cost")
                )
                ->groupBy(
                    'dimtime.Year',
                    'dimtime.Month',
                    'dimtime.MonthName'
                )
                ->orderBy('dimtime.Year')
                ->orderBy('dimtime.Month')
                ->get();
        } else {
            $data = $baseQuery
                ->select(
                    'dimtime.Year AS label',
                    DB::raw("SUM(factpurchasing.LineTotal) AS total_cost")
                )
                ->groupBy('dimtime.Year')
                ->orderBy('dimtime.Year')
                ->get();
        }

        $this->labels = $data->pluck('label')->toArray();
        $this->values = $data->pluck('total_cost')->toArray();

        $this->dispatchBrowserEvent('purchasing-trend-updated', [
            'labels' => $this->labels,
            'values' => $this->values,
        ]);
    }

    public function render()
    {
        return view('livewire.purchasing-trend');
    }
}
