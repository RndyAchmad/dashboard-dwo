<div class="row">
    <div class="col-12 mb-4">
        <div class="card border shadow-sm">
            <div class="card-header d-sm-flex flex-row align-items-center flex-0">
                <div class="d-block mb-3 mb-sm-0">
                    <div class="fs-5 fw-normal mb-2">Cost vs Sales</div>
                </div>
            </div>
            <div class="card-body p-2">
                <div id="comboChart"></div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function() {
            const data = @json($chartData);

            const years = data.map(i => i.year);
            const costs = data.map(i => Number(i.cost));
            const sales = data.map(i => Number(i.sales));
            const margin = data.map(i => Number(i.profit_margin));

            const options = {
                chart: {
                    type: 'line',
                    height: 400,
                    stacked: false
                },
                series: [{
                        name: 'Purchase Cost',
                        type: 'column',
                        data: costs,
                        yAxisIndex: 0
                    },
                    {
                        name: 'Sales Revenue',
                        type: 'column',
                        data: sales,
                        yAxisIndex: 1
                    },
                    {
                        name: 'Profit Margin (%)',
                        type: 'line',
                        data: margin,
                        yAxisIndex: 1
                    }
                ],
                stroke: {
                    width: [0, 0, 4]
                },
                xaxis: {
                    categories: years
                },
                yaxis: [{
                        title: {
                            text: 'Cost ($)'
                        },
                        labels: {
                            formatter: val => val.toLocaleString()
                        }
                    },
                    {
                        opposite: true,
                        title: {
                            text: 'Revenue ($) / Profit (%)'
                        },
                        labels: {
                            formatter: val => val.toLocaleString()
                        }
                    }
                ],
                tooltip: {
                    shared: true,
                    intersect: false,
                    y: [{
                            formatter: val => val.toLocaleString()
                        },
                        {
                            formatter: val => val.toLocaleString()
                        },
                        {
                            formatter: val => val.toFixed(1) + '%'
                        }
                    ]
                },
                dataLabels: {
                    enabled: true,
                    enabledOnSeries: [0, 1, 2],
                    formatter: function(val, {
                        seriesIndex
                    }) {
                        if (seriesIndex === 2) return val.toFixed(1) + '%';
                        return val.toLocaleString(undefined, {
                            maximumFractionDigits: 0
                        });
                    }
                },
                title: {
                    text: 'Cost vs Sales by Year',
                    align: 'center'
                },
                legend: {
                    position: 'bottom'
                }
            };

            new ApexCharts(document.querySelector("#comboChart"), options).render();
        });
    </script>
</div>
