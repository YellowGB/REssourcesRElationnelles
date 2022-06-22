@props([
    'chartSettings' => '',
    'title'         => '',
    'route'         => '',
    'request'       => [],
])
<label>{{ $title }}</label>
<div
    {{ $attributes->merge(['class' => '']) }}
    x-data="{
        chart: null,
        setChart() {
            new Chartisan({
                el: $el,
                url: &quot;@chart($route, $request)&quot;, {{-- &quot; car il n'est pas possible d'échaper le " dans ce contexte --}}
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