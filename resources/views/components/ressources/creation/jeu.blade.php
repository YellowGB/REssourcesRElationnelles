<div
    id="jeu"
    class="flex-col w-128 lg:w-screen lg:max-w-screen-sm ressource-content"
    style="display: none;"
>
    <textarea
        name="jeu_description"
        rows="10"
        placeholder="{{ __('titles.content.description') }}"
        class="mb-1"
    >{{ $content->description ?? '' }}</textarea>
    
    <input
        type="text"
        name="jeu_link"
        placeholder="{{ __('titles.link.link') }}"
        value="{{ $content->link ?? '' }}"
        class="mb-1"
    />
    
    <label for="jeu_starting_date" class="dark:text-gris-light">{{ __('titles.content.starting') }}</label>
    <input 
        type="datetime-local" 
        id="jeu_starting_date" 
        name="jeu_starting_date" 
        value="{{ isset($content) ? substr(str_replace(' ', 'T', $content->starting_date), 0, strlen($content->starting_date) - 3) : '' }}"
    />
</div>