<div class="row">
    <div class="col-12 mb-4">
        <div class="card border shadow-sm">
            <div class="card-header d-sm-flex flex-row align-items-center flex-0">
                <div class="d-block mb-3 mb-sm-0">
                    <div class="fs-5 fw-normal mb-2">
                        Total Cost by Category
                    </div>

                    <h2 class="fs-3 fw-extrabold">
                        {{ number_format($totalCost, 2) }}
                    </h2>

                    <div class="small mt-2">
                        <span class="fw-normal me-2">
                            {{ $selectedCategory ?: 'All Category' }}
                        </span>
                    </div>
                </div>

                <div class="d-flex ms-auto gap-2">
                    <select wire:model="selectedCategory" class="form-select form-select-sm">
                        <option value="">All Category</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat }}">{{ $cat }}</option>
                        @endforeach
                    </select>

                    @if ($selectedCategory)
                        <select wire:model="selectedSubcategory" class="form-select form-select-sm">
                            <option value="">All Subcategory</option>
                            @foreach ($subcategories as $sub)
                                <option value="{{ $sub }}">{{ $sub }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
            </div>
            <div class="card-body p-2">
                <div wire:ignore id="topCategoryChart" data-labels='@json($labels ?? [])'
                    data-totals='@json($totals ?? [])'>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const el = document.getElementById('topCategoryChart');
            if (!el) return;

            const chart = new ApexCharts(el, {
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        borderRadius: 4
                    }
                },
                series: [{
                    name: 'Total Cost',
                    data: []
                }],
                xaxis: {
                    categories: []
                }
            });

            chart.render();

            // 🔥 INIT (sama kayak PurchasingTrend)
            const initLabels = JSON.parse(el.dataset.labels || '[]');
            const initTotals = JSON.parse(el.dataset.totals || '[]');

            if (initLabels.length && initTotals.length) {
                chart.updateOptions({
                    xaxis: {
                        categories: initLabels
                    }
                });
                chart.updateSeries([{
                    data: initTotals
                }]);
            }

            // 🔁 UPDATE dari Livewire
            window.addEventListener('update-chart', e => {
                chart.updateOptions({
                    xaxis: {
                        categories: e.detail.labels
                    }
                });
                chart.updateSeries([{
                    data: e.detail.totals
                }]);
            });
        });
    </script>

</div>
