@props([
    'chartSettings' => '',
    'title'         => '',
    'route'         => '',
    'request'       => [],
])
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
                    .datasets('pie'),
                {{ $chartSettings }}
            });
        }
    }"
    x-init="chart = setChart()"
></div>