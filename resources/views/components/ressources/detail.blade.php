<ul>
    <li class="mb-2"><x-ressources.card-type :title="__('titles.category.' . $ressource->categorie->name)" /></li>
    <li class="mb-2"><x-ressources.card-type :title="__('titles.relation.' . $ressource->relation)" /></li>
    <li class="text-sm">{{ format_horodatage($ressource, 'created', \App\Enums\LocGenderNumber::FeminineSingular) }}</li>
    <li class="text-sm">{{ format_horodatage($ressource, 'updated', \App\Enums\LocGenderNumber::FeminineSingular) }}</li>
    <li class="text-sm">{{ __('titles.by') }} {{ get_user_display_name($ressource->user) }}</li>

    <x-sep-horizontal />

    <li>
        <div class="flex justify-between">
            <x-ressources.actions :favorite="$progress['is_favorite']" :used="$progress['is_used']" :saved="$progress['is_saved']" class="resource-interactions-side" />
        </div>
    </li>
</ul>