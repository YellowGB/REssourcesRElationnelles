@props([
    'chartSettings' => '',
    'title'         => '',
    'route'         => '',
    'request'       => [],
])
<div class="w-full flex flex-col items-center">
    <label>{{ $title }}</label>
    <div
        {{ $attributes->merge(['class' => '']) }}
        {{-- &quot; car il n'est pas possible d'échaper le " dans ce contexte --}}
        x-data="{
            chart: null,
            setChart() {
                new Chartisan({
                    el: $el,
                    url: &quot;@chart($route, $request)&quot;,
                    hooks: new ChartisanHooks()
                        .axis(false)
                        .tooltip()
                        // S'il y en a, on récupère les couleurs passées en paramètre et on les applique au graphique
                        .custom(({ data, merge, server }) => {
                            if (server.chart.extra !== null && typeof server.chart.extra.colors !== 'undefined') {
                                data.color = server.chart.extra.colors;
                            }
                            return data;
                        })
                        .datasets('pie'),
                    {{ $chartSettings }}
                });
            }
        }"
        x-init="chart = setChart()"
    ></div>
</div>