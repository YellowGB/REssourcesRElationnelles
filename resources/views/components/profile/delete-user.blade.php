<div>
    @props([
        'user',
        'route' => route('profile.delete'),
        'title' => __('titles.profile.title.delete'),
        'desc'  => __('titles.profile.desc.delete'),
    ])
    <x-action-section
        :title="$title"
        :route="$route"
        :description="$desc"
    >
        <x-slot name="content">
            <div class="max-w-xl text-sm">
                <p>@lang('titles.profile.desc.deldetail')</p>
            </div>

            <x-danger-button class="mt-5" @click="confirmUserDeletion">
                @lang('titles.profile.title.delete')
            </x-danger-button>

            {{-- Modal de confirmation --}}
            <x-dialog-modal />

            <!-- Delete Account Confirmation Modal -->
            {{-- <jet-dialog-modal :show="confirmingUserDeletion" @close="closeModal">
                <template #title>
                    Delete Account
                </template>

                <template #content>
                    Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.

                    <div class="mt-4">
                        <jet-input type="password" class="mt-1 block w-3/4" placeholder="Password"
                                    ref="password"
                                    v-model="form.password"
                                    @keyup.enter="deleteUser" />

                        <jet-input-error :message="form.errors.password" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <jet-secondary-button @click="closeModal">
                        Cancel
                    </jet-secondary-button>

                    <jet-danger-button class="ml-3" @click="deleteUser" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Delete Account
                    </jet-danger-button>
                </template>
            </jet-dialog-modal> --}}
        </x-slot>
    </x-action-section>
</div>