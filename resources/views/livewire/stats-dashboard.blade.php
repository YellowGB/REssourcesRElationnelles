<div
    x-data="{
        showSearches: false,
        showProgress: false,
        showUsers: false,
        showResources: true,
        hideAll() {
            this.showSearches   =
            this.showProgress   =
            this.showUsers      =
            this.showResources  = false;
        },
    }"
    id="stats-dashboard"
    class="w-full"
>
    {{-- Menu --}}
    <div x-data="{ showSections: false }" @click.away="showSections = false" class="w-full select-none">
        <div @click="showSections = ! showSections" class="bg-primaire text-blanc border-y-2 border-y-primaire hover:border-y-slate-700 flex flex-col items-center justify-center">
            <div class="flex flex-col justify-center items-center">
                <span class="text-blanc font-medium">@lang('titles.chart.section.menu')</span>
                <x-icons.chevron-down class="w-6 h-6" />
            </div>
        </div>
        <div x-show="showSections" class="bg-blanc flex flex-col items-center justify-center border border-primaire">
            <x-charts.section :section="'showSearches'">@lang('titles.chart.section.searches')</x-charts.section>
            <x-charts.section :section="'showProgress'">@lang('titles.chart.section.progress')</x-charts.section>
            <x-charts.section :section="'showUsers'">@lang('titles.chart.section.users')</x-charts.section>
            <x-charts.section :section="'showResources'">@lang('titles.chart.section.resources')</x-charts.section>
        </div>
    </div>

    {{-- Charts --}}
    <x-charts.container :show="'showProgress'">Progress</x-charts.container>
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

            <x-charts.pie
                :chartSettings="$chartSettings"
                :title="__('titles.chart.name.contrib', ['number' => 10])"
                :route="'user_resources_chart'"
                :request="['number' => 10]"
                class="h-44 w-full"
            />
        </x-charts.side-by-side>
    </x-charts.container>
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
    <x-charts.container :show="'showSearches'" class="mt-4">
        <x-charts.bar
            :chartSettings="$chartSettings"
            :title="__('titles.chart.name.searchers', ['number' => 10])"
            :route="'top_searchers_chart'"
            :request="['number' => 10]"
            class="h-80 w-full md:w-3/5"
        />

        <x-charts.side-by-side>

            <x-charts.countup
                :target="$total['searches']"
                :title="__('titles.chart.name.total.searches')"
                :show="'showSearches'"
                class="w-1/2"
            />

            <x-charts.pie
                :chartSettings="$chartSettings"
                :title="__('titles.chart.name.terms', ['number' => 10])"
                :route="'search_terms_chart'"
                :request="['number' => 10]"
                class="h-60 w-1/2"
            />

        </x-charts.side-by-side>
    </x-charts.container>

    {{-- Charting + Chartisan --}}
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
</div>
