@props(['show', 'target', 'title'])
<div
    {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center text-center gap-4']) }}
    x-data="{
        current: 0,
        target: {{ $target }},
        time: 3000,
        // Animation de défilement des chiffres jusqu'à atteindre le chiffre demandé
        countUp() {
            $nextTick(() => {
                start = this.current; 
                const interval = Math.max(this.time / (this.target - start), 5); 
                const step = (this.target - start) /  (this.time / interval);  
                const handle = setInterval(() => {
                    if (this.current < this.target) this.current += step;
                    else {
                        clearInterval(handle);
                        this.current = this.target;
                    }   
                }, interval);
            })
        }
    }"
    {{-- On n'active l'animation que si le composant est affiché --}}
    x-init="
        if ({{ $show }}) countUp();
        $watch('{{ $show }}', (show) => {
            if (show) countUp();
            // else current = 0; // si l'on souhaite relancer l'animation à chaque fois que l'on réaffiche le composant
        });
    "
>
    <label>{{ $title }}</label>
    <div class="font-bold text-xl" x-text="Math.round(current)"></div>
</div>