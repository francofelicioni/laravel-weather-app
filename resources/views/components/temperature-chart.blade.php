<div class="p-4 h-full flex flex-col justify-center h-full space-y-8">
    <h1 class="text-lg p-4">Temperature Data for: <span class="font-bold">{{ $city }}</span></h1>
    <canvas id="temperatureChart"></canvas>
</div>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('temperatureChart').getContext('2d');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Temperature (°C)',
                    data: @json($values),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                layout: {
                    padding: 10
                },
                scales: {
                    x: {
                        ticks: {
                            autoSkip: true,
                            maxTicksLimit: 10
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection