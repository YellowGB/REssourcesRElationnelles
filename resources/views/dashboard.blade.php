<x-app-layout>
    <x-page-header heading="{{ __('titles.section.dashboard') }}" />
    <x-triptyque>
        <div class="pt-2 pb-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-blanc dark:bg-noir mb-4 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-blanc dark:bg-noir dark:text-blanc border-b border-gray-200">
                        @lang('titles.auth.state')
                        @lang('titles.role.' . auth()->user()->role->name ).
                    </div>
                </div>
    
                {{-- Rôles --}}
                <x-admin.section
                    :route="route('roles.index')"
                    :title="__('titles.administration.roles')"
                    :desc="__('titles.administration.desc.roles')"
                />
    
                {{-- Citoyens --}}
                <x-admin.section
                    :route="route('citizens')"
                    :title="__('titles.administration.citizens')"
                    :desc="__('titles.administration.desc.citizens')"
                />
    
                {{-- Création comptes modérateur/administrateur --}}
                <x-admin.section
                    :route="route('admin.create')"
                    :title="__('titles.create.admin')"
                    :desc="__('titles.administration.desc.admin')"
                />
    
                {{-- Catégories --}}
                <x-admin.section
                    :route="route('categories.index')"
                    :title="__('titles.administration.category')"
                    :desc="__('titles.administration.desc.category')"
                />
    
                {{-- Modération des ressources --}}
                <x-admin.section
                    :route="route('catalogue.moderation')"
                    :title="__('titles.moderation.ressource')"
                    :desc="__('titles.moderation.desc.ressource')"
                />
    
                {{-- Modération des commentaires --}}
                <x-admin.section
                    :route="route('comments.moderation')"
                    :title="trans_choice('titles.moderation.comment', 2)"
                    :desc="__('titles.moderation.desc.comment')"
                />
    
            </div>
        </div>
    </x-triptyque>
</x-app-layout>
