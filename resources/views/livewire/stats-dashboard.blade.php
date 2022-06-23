<div id="stats-dashboard" class="w-full">

    <x-charts.bar
        :chartSettings="$chartSettings"
        :title="__('titles.chart.name.searchers', ['number' => 10])"
        :route="'top_searchers_chart'"
        :request="['number' => 10]"
        class="h-80 w-full md:w-3/5"
    />

    <div class="flex flex-col md:flex-row md:h-60 md:w-3/5">
        <x-charts.pie
            :chartSettings="$chartSettings"
            :title="__('titles.chart.name.terms', ['number' => 10])"
            :route="'search_terms_chart'"
            :request="['number' => 10]"
            class="h-44 w-full"
        />

        <x-charts.doughnut-double
            :chartSettings="$chartSettings"
            :title="__('titles.chart.name.viewed', ['number' => 10])"
            :route="'most_viewed_chart'"
            :request="['number' => 10]"
            class="h-60 w-full"
        />
    </div>

    {{-- Charting + Chartisan --}}
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
</div>
