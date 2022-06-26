<div
    x-data="{
        showSearches: true,
        showProgress: false,
        showUsers: false,
        showResources: false,
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
    <div
        x-data="{ showSections: false }"
        @click.away="showSections = false"
        class="w-full select-none md:absolute md:w-[5vw] md:flex"
    >
        <div
            @click="showSections = ! showSections"
            class="
                relative z-50 bg-primaire text-blanc border-y-2 border-y-primaire hover:border-y-slate-700 flex flex-col items-center justify-center
                md:-top-4 md:h-[82vh]
            "
        >
            <div class="flex flex-col justify-center items-center md:-rotate-90">
                <span class="text-blanc font-medium">@lang('titles.chart.section.menu')</span>
                <x-icons.chevron-down class="w-6 h-6" />
            </div>
        </div>
        <div
            x-show="showSections"

            {{-- Slide animation vers le bas/haut ou droite/gauche au delà de medium --}}
            x-transition:enter="ease-out duration-200"
            x-transition:enter-start="h-16 md:h-[82vh] md:min-w-0 border-none"
            x-transition:enter-end="h-40 md:h-[82vh] md:w-40 border-none"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="h-40 md:h-[82vh] md:w-40 border-none"
            x-transition:leave-end="h-16 md:h-[82vh] md:min-w-0 border-none"

            class="
                absolute z-40 w-full bg-blanc flex flex-col items-center justify-center border border-primaire
                md:relative md:-top-4 md:min-w-[10vw] md:overflow-hidden
            "
        >
            <x-charts.section :section="'showSearches'">@lang('titles.chart.section.searches')</x-charts.section>
            <x-charts.section :section="'showProgress'">@lang('titles.chart.section.progress')</x-charts.section>
            <x-charts.section :section="'showUsers'">@lang('titles.chart.section.users')</x-charts.section>
            <x-charts.section :section="'showResources'">@lang('titles.chart.section.resources')</x-charts.section>
        </div>
    </div>

    {{-- Charts --}}
    <x-charts.sections.progress :total="$total" :chartSettings="$chartSettings" />
    <x-charts.sections.users :total="$total" :chartSettings="$chartSettings" />
    <x-charts.sections.resources :total="$total" :chartSettings="$chartSettings" />
    <x-charts.sections.searches :total="$total" :chartSettings="$chartSettings" />

    {{-- Charting + Chartisan --}}
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
</div>
