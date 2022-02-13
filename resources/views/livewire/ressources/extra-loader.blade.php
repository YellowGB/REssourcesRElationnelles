{{-- S'il reste des ressources à charger, charge les prochaines (10 par défaut) --}}
<div x-data="{
    checkScroll() {
            var isLoadedOnce = false;
            window.onscroll = function(ev) {
                //document.body.scrollHeight semble mieux fonctionner que document.body.offsetHeight
                if ((window.innerHeight + window.scrollY) >= document.body.scrollHeight) {
                    if (! isLoadedOnce) {
                        @this.call('loadMore')
                        isLoadedOnce = true;
                    }
                }
            };
        }
    }"

    x-init="checkScroll"
>
<div class="flex justify-center mb-4">
    <div wire:loading.delay>
        <x-icons.loading class="h-8 w-8" />
    </div>
</div>
</div>