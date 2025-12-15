<div class="row">

    <div class="col-12 mb-4">
        <div class="card border-0 shadow">

            {{-- HEADER --}}
            <div class="card-header d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="fw-bold mb-1">Purchasing Cost Trend</h5>
                    <small class="text-muted">
                        Total purchasing cost aggregated by time
                    </small>
                </div>

                {{-- FILTER --}}
                <div class="d-flex align-items-center gap-2">
                    <label class="small text-muted mb-0">View:</label>
                    <select
                        wire:model="filter"
                        class="form-select form-select-sm w-auto"
                    >
                        <option value="year">Year</option>
                        <option value="month">Month</option>
                    </select>
                </div>

            </div>

            {{-- BODY --}}
            <div class="card-body">
                {{-- PENTING --}}
                <div wire:ignore>
                    <canvas id="purchasingTrendChart" height="140"></canvas>
                </div>
            </div>

        </div>
    </div>

</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    let chartInstance = null;
    const ctx = document
        .getElementById('purchasingTrendChart')
        .getContext('2d');

    function renderChart(labels, values) {

        if (chartInstance) {
            chartInstance.destroy();
        }

        chartInstance = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Purchasing Cost',
                    data: values,
                    backgroundColor: '#4e73df',
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Rp ' + context.raw.toLocaleString();
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    }

    window.addEventListener('purchasing-trend-updated', function (event) {
        renderChart(event.detail.labels, event.detail.values);
    });

});
</script>
@endpush
