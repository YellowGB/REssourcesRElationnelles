<div x-data>
    @auth
        @modo
            @if($ressource->status == \App\Enums\RessourceStatus::Pending->value)
                <div class="flex justify-between">
                    <form
                        x-ref="validForm"
                        action="{{ route('resources.valider', $ressource->id) }}"
                        method="post"
                    >
                        @csrf
                        <x-icons.check
                            @click="$refs.validForm.submit()"
                            :title="__('titles.moderation.validate')"
                            class="text-green-600 hover:text-green-500 cursor-pointer h-10 w-10"
                        />
                    </form>
                    <form
                        x-ref="dismissForm"
                        action="{{ route('resources.rejeter', $ressource->id) }}"
                    >
                        <x-icons.cross
                            @click="$refs.dismissForm.submit()"
                            :title="__('titles.moderation.dismiss')"
                            class="text-red-700 hover:text-red-600 cursor-pointer h-10 w-10"
                        />
                    </form>
                </div>
                @elseif($ressource->status == \App\Enums\RessourceStatus::Published->value)
                    <div class="flex justify-end">
                        <form
                            x-ref="suspendForm"
                            action="{{ route('resources.suspendre', $ressource->id) }}"
                            method="post"
                        >
                            @csrf
                            <x-icons.stop
                                @click="$refs.suspendForm.submit()"
                                :title="__('titles.moderation.suspend')"
                                class="text-red-800 hover:text-red-700 cursor-pointer h-10 w-10"
                            />
                        </form>
                    </div>
                @endif
        @endmodo
    @endauth
</div>