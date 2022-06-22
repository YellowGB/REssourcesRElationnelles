<div>
    <x-charts.pie
        :chartSettings="$chartSettings"
        :title="__('titles.chart.name.terms', ['number' => 10])"
        :route="'search_terms_chart'"
        :request="['number' => 10]"
    />

    <x-charts.pie-double
        :chartSettings="$chartSettings"
        :title="__('titles.chart.name.viewed', ['number' => 10])"
        :route="'most_viewed_chart'"
        :request="['number' => 10]"
        class="h-[40vh]"
    />

    {{-- Charting + Chartisan --}}
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
</div>
