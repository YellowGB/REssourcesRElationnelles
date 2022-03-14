<x-app-layout>
    <x-page-header heading="{{ __('titles.section.dashboard') }}" />
    <x-triptyque>
        <div class="pt-2 pb-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @modo
                    <div class="bg-blanc dark:bg-noir mb-4 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-blanc dark:bg-noir dark:text-blanc border-b border-gray-200 dark:border-gris-darkest">
                            @lang('titles.auth.state')
                            @lang('titles.role.' . auth()->user()->role->name ).
                        </div>
                    </div>
                @else
                    {{-- Dashboard citoyen --}}
                    <h2 class="ml-4">@lang('titles.section.mypublish')</h2>
                    @forelse ($ressources as $ressource)
                        @if ($ressource->status == App\Enums\RessourceStatus::Published->value)
                            <x-ressource-preview :ressource="$ressource" /> 
                        @endif
                    @empty
                        <p class="ml-12">@lang('None.')</p>
                    @endforelse

                    <div class="flex justify-center">
                        <x-sep-horizontal class="w-40" />
                    </div>

                    <h2 class="ml-4">@lang('titles.section.mypending')</h2>
                    @forelse ($ressources as $ressource)
                        @if ($ressource->status == App\Enums\RessourceStatus::Pending->value)
                            <x-ressource-preview :ressource="$ressource" /> 
                        @endif
                    @empty
                        <p class="ml-12">@lang('None.')</p>
                    @endforelse

                    <div class="flex justify-center">
                        <x-sep-horizontal class="w-40" />
                    </div>

                    <h2 class="ml-4">@lang('titles.section.myfav')</h2>
                    <p class="ml-12">@lang('None.')</p>

                    <div class="flex justify-center">
                        <x-sep-horizontal class="w-40" />
                    </div>

                    <h2 class="ml-4">@lang('titles.section.myexploit')</h2>
                    <p class="ml-12">@lang('None.')</p>

                    <div class="flex justify-center">
                        <x-sep-horizontal class="w-40" />
                    </div>

                    <h2 class="ml-4">@lang('titles.section.mybookmark')</h2>
                    <p class="ml-12">@lang('None.')</p>
                @endmodo
    
                @superadmin
                    {{-- Rôles --}}
                    <x-admin.section
                        :route="route('roles.index')"
                        :title="__('titles.administration.roles')"
                        :desc="__('titles.administration.desc.roles')"
                    />
                @endsuperadmin
    
                @admin
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
                @endadmin
    
                @modo
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
                @endmodo
    
            </div>
        </div>
    </x-triptyque>
</x-app-layout>
