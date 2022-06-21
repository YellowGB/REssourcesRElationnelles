<x-app-layout>
    <x-page-header heading="{{ __('titles.section.stats') }}" />

    <label for="search-terms">@lang('titles.chart.name.terms', ['number' => 10])</label>
    <div
        x-data="{
            chart: null,
            setChart() {
                new Chartisan({
                    el: $el,
                    url: &quot;@chart('search_terms_chart', ['number' => 10])&quot;, {{-- &quot; car il n'est pas possible d'échaper le " dans ce contexte --}}
                    hooks: new ChartisanHooks()
                        .axis(false)
                        .tooltip()
                        .datasets('pie'),
                    loader: {
                        color: '#2E6DAA',
                        size: [30, 30],
                        type: 'bar',
                        textColor: '#2E2E39',
                        text: 'Chargement en cours...',
                    },
                    error: {
                        color: '#2E6DAA',
                        size: [30, 30],
                        text: 'Une erreur est survenue...',
                        textColor: '#2E2E39',
                        type: 'general',
                        debug: true,
                    },
                });
            }
        }"
        x-init="chart = setChart()"
    ></div>

    {{-- Charting + Chartisan --}}
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
</x-app-layout>