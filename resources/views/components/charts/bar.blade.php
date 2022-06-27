@props([
    'chartSettings' => '',
    'title'         => '',
    'route'         => '',
    'request'       => [],
    'export'        => false,
])
<div class="w-full flex flex-col items-center">
    <div class="flex gap-1 items-center">
        <label>{{ $title }}</label>
        @if ($export)
            <label for="export-format-modal-{{ $route }}" class="cursor-pointer text-primaire dark:text-secondaire">
                <x-icons.document-download />
            </label>
        @endif
    </div>
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
                        .datasets('bar'),
                    {{ $chartSettings }}
                });
            }
        }"
        x-init="chart = setChart()"
    ></div>
</div>
{{-- La modale pour l'export des données --}}
@if ($export)
    <x-export-format-modal :route="$route" :export="$export" />
@endif