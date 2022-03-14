<div
    id="activite"
    class="flex-col w-11/12 lg:w-screen lg:max-w-screen-sm ressource-content"
    style="display: none;"
>
    <textarea
        name="activite_description"
        rows="10"
        placeholder="{{ __('titles.content.description') }}"
    >{{ $content->description ?? '' }}</textarea>
    
    <div class="flex flex-col md:flex-row gap-2 self-center mt-1">
        <div class="flex flex-col place-items-center mb-1">
            <label for="activite_starting_date" class="dark:text-gris-light">{{ __('titles.content.starting') }}</label>
            <input type="datetime-local" id="activite_starting_date" name="activite_starting_date" value="{{ isset($content) ? substr(str_replace(' ', 'T', $content->starting_date), 0, strlen($content->starting_date) - 3) : '' }}"></input>
        </div>
        <div class="flex flex-col place-items-center">
            <label for="activite_duration" class="dark:text-gris-light">{{ __('titles.content.duration') }} (min)</label>
            <input type="number" step="1" id="activite_duration" name="activite_duration" value="{{ $content->duration ?? '' }}"></input>
        </div>
    </div>
</div>