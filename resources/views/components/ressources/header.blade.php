<div>
    <h1>{{ $ressource->title }}</h1>
    <p>{{ __('titles.section.type') }} : {{ __('titles.type.' . $ressource->ressourceable_type) }}</p>
    <p>{{ __('titles.section.category') }} : {{ __('titles.category.' . $ressource->categorie->name) }}</p>
    <p>{{ __('titles.section.relation') }} : {{ __('titles.relation.' . $ressource->relation) }}</p>
    <p>{{ format_horodatage($ressource, 'created', \App\Enums\LocGenderNumber::FeminineSingular) }}</p>
    <p>{{ format_horodatage($ressource, 'updated', \App\Enums\LocGenderNumber::FeminineSingular) }}</p>
    <p>{{ __('titles.by') }} {{ get_user_display_name($ressource->user) }}</p>
</div>