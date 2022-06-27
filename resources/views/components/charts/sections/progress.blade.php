@props(['total', 'chartSettings'])
<x-charts.container :show="'showProgress'">
    <x-charts.side-by-side>
        <x-charts.countup
            :target="$total['favorites']"
            :title="__('titles.chart.name.total.favorites')"
            :show="'showProgress'"
        />
        <x-charts.countup
            :target="$total['used']"
            :title="__('titles.chart.name.total.used')"
            :show="'showProgress'"
            class="mx-8"
        />
        <x-charts.countup
            :target="$total['saved']"
            :title="__('titles.chart.name.total.saved')"
            :show="'showProgress'"
        />
    </x-charts.side-by-side>
    <div class="h-4 md:hidden"></div>
    <x-charts.side-by-side>
        <x-charts.pie
            :chartSettings="$chartSettings"
            :title="__('titles.chart.name.favorites', ['number' => 10])"
            :route="'favorites_chart'"
            :request="['number' => 10]"
            :export="'exports.favorites'"
            class="h-44 w-full"
        />
        <x-charts.pie
            :chartSettings="$chartSettings"
            :title="__('titles.chart.name.used', ['number' => 10])"
            :route="'used_chart'"
            :request="['number' => 10]"
            :export="'exports.used'"
            class="h-44 w-full"
        />
        <x-charts.pie
            :chartSettings="$chartSettings"
            :title="__('titles.chart.name.saved', ['number' => 10])"
            :route="'saved_chart'"
            :request="['number' => 10]"
            :export="'exports.saved'"
            class="h-44 w-full"
        />
    </x-charts.side-by-side>
</x-charts.container>