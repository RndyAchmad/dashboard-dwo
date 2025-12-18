<div class="row">
    <div class="col-12 mb-4">
        <div class="card border shadow-sm">
            <div class="card-header d-sm-flex flex-row align-items-center flex-0">
                <div class="d-block mb-3 mb-sm-0">
                    <div class="fs-5 fw-normal mb-2">
                        Total Sales
                        <span class="text-muted">
                            {{ $selectedYear ? '(' . $selectedYear . ')' : '(All Years)' }}
                        </span>
                    </div>


                    <h2 class="fs-3 fw-extrabold">
                        {{ number_format(array_sum($totals), 2) }}
                    </h2>

                    <div class="small mt-2 text-muted">
                        @if ($selectedYear)
                            Sales for {{ $selectedYear }}
                        @else
                            Sales from {{ min($years) }} – {{ max($years) }}
                        @endif
                    </div>

                </div>
                <div class="d-flex ms-auto align-items-center">
                    <select wire:model="selectedYear" class="form-select form-select-sm w-auto">
                        <option value="">All Years</option>
                        @foreach ($availableYears as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-body p-2">
                <div wire:ignore id="pieChart" data-labels='@json($labels ?? [])'
                    data-totals='@json($totals ?? [])'>
                </div>
            </div>
            <div class="card-body p-2">
                <div wire:ignore id="barChart" data-labels='@json($labels ?? [])'
                    data-totals='@json($totals ?? [])'>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function() {

            const pieEl = document.getElementById("pieChart");
            const barEl = document.getElementById("barChart");

            const pie = new ApexCharts(pieEl, {
                chart: {
                    type: 'pie',
                    height: 350
                },
                labels: @json($labels),
                series: @json($values),
                dataLabels: {
                    enabled: true // biarkan original
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            if (value >= 1000000) return (value / 1000000) + "m";
                            if (value >= 1000) return (value / 1000) + "k";
                            return value;
                        }
                    }
                }
            });
            pie.render();

            const bar = new ApexCharts(barEl, {
                chart: {
                    type: 'bar',
                    height: 350
                },
                series: [{
                    name: 'Total',
                    data: @json($topTotals)
                }],
                xaxis: {
                    categories: @json($topProducts)
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            if (value >= 1000000) return (value / 1000000) + "m";
                            if (value >= 1000) return (value / 1000) + "k";
                            return value;
                        }
                    }
                },
                dataLabels: {
                    enabled: true // tampil, tapi tanpa formatter
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            if (value >= 1000000) return (value / 1000000) + "m";
                            if (value >= 1000) return (value / 1000) + "k";
                            return value;
                        }
                    }
                }
            });
            bar.render();

            // Event listener untuk update data
            window.addEventListener('updateCharts', (e) => {
                pie.updateOptions({
                    labels: e.detail.labels,
                    series: e.detail.values
                });

                bar.updateOptions({
                    xaxis: {
                        categories: e.detail.topLabels
                    },
                    series: [{
                        data: e.detail.topTotals
                    }]
                });
            });
        });
    </script>

</div>
