@props(['total', 'chartSettings'])
<x-charts.container :show="'showUsers'">
    <x-charts.line
        :chartSettings="$chartSettings"
        :title="__('titles.chart.name.accounts', ['number' => 3])"
        :route="'account_creation_chart'"
        :request="['number' => 3]"
        class="h-80 w-full md:w-3/5"
    />

    <x-charts.side-by-side>
        <x-charts.pie
            :chartSettings="$chartSettings"
            :title="__('titles.chart.name.postcodes', ['number' => 10])"
            :route="'users_geo_chart'"
            :request="['number' => 10]"
            class="h-44 w-full"
        />

        <div class="flex flex-col gap-4">
            <x-charts.countup
                :target="$total['users']"
                :title="__('titles.chart.name.total.users')"
                :show="'showUsers'"
            />
            <x-charts.countup
                :target="$total['connexions']"
                :title="__('titles.chart.name.total.connexions')"
                :show="'showUsers'"
            />
        </div>

        <x-charts.pie
            :chartSettings="$chartSettings"
            :title="__('titles.chart.name.contrib', ['number' => 10])"
            :route="'user_resources_chart'"
            :request="['number' => 10]"
            class="h-44 w-full"
        />
    </x-charts.side-by-side>
</x-charts.container>