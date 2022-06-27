@props(['total', 'chartSettings'])
<x-charts.container :show="'showSearches'" class="mt-4">
    <x-charts.bar
        :chartSettings="$chartSettings"
        :title="__('titles.chart.name.searchers', ['number' => 10])"
        :route="'top_searchers_chart'"
        :request="['number' => 10]"
        :export="'exports.searchers'"
        class="h-80 w-full md:w-3/5"
    />

    <x-charts.side-by-side>

        <x-charts.countup
            :target="$total['searches']"
            :title="__('titles.chart.name.total.searches')"
            :show="'showSearches'"
            class="w-full md:w-1/2"
        />

        <x-charts.pie
            :chartSettings="$chartSettings"
            :title="__('titles.chart.name.terms', ['number' => 10])"
            :route="'search_terms_chart'"
            :request="['number' => 10]"
            :export="'exports.terms'"
            class="h-60 w-full md:w-1/2"
        />

    </x-charts.side-by-side>
</x-charts.container>