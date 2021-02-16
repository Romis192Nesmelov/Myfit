<div class="chart-container">
    <script>
        window.statisticsData.push({
            legend:[],
            dataHorAxis:[],
            chartId:"{{ $chartId }}"
        });

        var xAxis = [],
            xAxisData = [];
    </script>

    @foreach ($xAxis as $item)
        <script>
            xAxis.push("{{ $item }}");
            xAxisData.push(0);
        </script>
    @endforeach

    @foreach($legend as $item)
        <script>
            window.statisticsData[window.statisticsData.length-1].legend.push("{{ $item }}");
            window.statisticsData[window.statisticsData.length-1].dataHorAxis.push({
                name: "{{ $item }}",
                type: 'line',
                data: cloneArrayData(xAxisData)
            });
        </script>
    @endforeach
    <div class="chart has-fixed-height" id="{{ $chartId }}"></div>
</div>