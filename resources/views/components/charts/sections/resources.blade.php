@props(['total', 'chartSettings'])
<x-charts.container :show="'showResources'">
    <x-charts.line
        :chartSettings="$chartSettings"
        :title="__('titles.chart.name.resources', ['number' => 3])"
        :route="'resource_creation_chart'"
        :request="['number' => 3]"
        class="h-80 w-full md:w-3/5"
    />

    <x-charts.side-by-side>
        <x-charts.pie
            :chartSettings="$chartSettings"
            :title="__('titles.chart.name.type')"
            :route="'resource_type_chart'"
            class="h-60 w-full"
        />

        <x-charts.countup
            :target="$total['resources']"
            :title="__('titles.chart.name.total.resources')"
            :show="'showResources'"
        />

        <x-charts.doughnut-double
            :chartSettings="$chartSettings"
            :title="__('titles.chart.name.viewed', ['number' => 10])"
            :route="'most_viewed_chart'"
            :request="['number' => 10]"
            class="h-60 w-full"
        />
    </x-charts.side-by-side>
</x-charts.container>