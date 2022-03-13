<x-app-layout>
    <x-page-header heading="{{ __('titles.section.map') }}" />
    <x-triptyque>
        <div class="text-clip overflow-hidden max-w-4xl px-10 py-6 ml-4 mr-4 mt-4 bg-violet-lightest dark:bg-violet-light rounded-lg shadow-md">
            <h2>
                <div class="text-bleu-dark dark:text-violet-darkest">Accueil</div>
            <h2>
                <ul class="list-disc">
                    <li class="ml-4">
                        @lang('titles.section.register')
                    </li>
                    <li class="ml-4">
                        @lang('titles.section.login')
                        <ul class="list-disc">
                            <li class="ml-4">
                                @lang('titles.section.dashboard')
                                <ul class="list-disc">
                                    <p class="ml-4">@lang('titles.section.progress')</p>
                                    <p class="ml-4">@lang('titles.section.category')</p>
                                    <p class="ml-4">@lang('titles.section.stats')</p>
                                    <li class="ml-4">
                                        Utilisateurs
                                        <ul class="list-disc">
                                            <p class="ml-4">Création de modérateurs / administrateur</li>
                                            <p class="ml-4">@lang('titles.section.profile')</p>
                                            <p class="ml-4">Modération de ressources</p>
                                            <p class="ml-4">Modération de commentaires</p>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <li class="ml-4">@lang('titles.btn.forgot')</li>
                    </li>
                    <li class="ml-4">
                        @lang('titles.section.catalogue')
                        <ul class="list-disc">
                            <li class="ml-4">
                                @lang('titles.section.resource')
                                <ul class="list-disc">
                                    <p class="ml-4">@lang('titles.create.ressource')</p>
                                    <p class="ml-4">@lang('titles.edit.ressource')</p>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="ml-4">@lang('titles.section.legal')</li>
                    <li class="ml-4">@lang('titles.section.privacy')</li>
                    <li class="ml-4">@lang('titles.section.map')</li>
                </ul>
            <h2>
        </div>
    </x-triptyque>
</x-app-layout>