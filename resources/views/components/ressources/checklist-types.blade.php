<ul class="px-4 py-2 text-sm leading-5 text-gris-dark transition duration-150 ease-in-out">
    @foreach ($reverse_types as $type)
        <li>
            <input
                type="checkbox"
                name="{{ $type }}"
                class="li-type mr-1"
                onclick="toggleType('{{ $type }}')"
                checked
            >
            {{ __('titles.type.' . $type) }}
        </li>
    @endforeach
</ul>