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
                        .tooltip()
                        .axis(false)
                        .datasets([
                            { type: 'pie', radius: ['40%', '60%'] },
                            { type: 'pie', radius: ['10%', '30%'] },
                        ]),
                    {{ $chartSettings }}
                });
            }
        }"
        x-init="chart = setChart()"
    ></div>
</div>