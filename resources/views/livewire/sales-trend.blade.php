<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow" style="background-color: #fac0b9">

            {{-- HEADER --}}
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
                            Aggregated from {{ min($years) }} – {{ max($years) }}
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

            {{-- BODY --}}
            <div class="card-body p-2">
                <div wire:ignore id="purchasingTrendChart" data-labels='@json($years)'
                    data-totals='@json($totals)'
                    class="ct-chart-sales-value ct-double-octave ct-series-g">
                </div>
            </div>

        </div>
    </div>

    {{-- CHART SCRIPT --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const el = document.getElementById('purchasingTrendChart');
            if (!el) return;

            const render = (labels, totals) => {
                el.innerHTML = '';

                new Chartist.Line(el, {
                    labels,
                    series: [totals]
                }, {
                    low: 0,
                    fullWidth: true,
                    chartPadding: {
                        right: 20
                    },
                    lineSmooth: Chartist.Interpolation.simple({
                        divisor: 2
                    }),

                    axisY: {
                        labelInterpolationFnc: function(value) {
                            if (value >= 1_000_000) return (value / 1_000_000) + 'M';
                            if (value >= 1_000) return (value / 1_000) + 'k';
                            return value;
                        }
                    },

                    plugins: [
                        Chartist.plugins.tooltip({
                            transformTooltipTextFnc: function(value) {
                                return 'Sales Ammount: ' + Number(value).toLocaleString();
                            }
                        })
                    ]
                });
            };


            // 🔥 INIT: ambil dari data-* (pasti ada)
            render(
                JSON.parse(el.dataset.labels),
                JSON.parse(el.dataset.totals)
            );

            // 🔁 UPDATE: dari Livewire
            window.addEventListener('purchasing-chart-update', e => {
                render(e.detail.labels, e.detail.totals);
            });

        });
    </script>

</div>
