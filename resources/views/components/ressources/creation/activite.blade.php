<div id="activite" class="ressource-content" style="display: none;">
    <textarea name="activite_description" cols="30" rows="10" placeholder="{{ __('titles.content.description') }}">{{ $content->description ?? '' }}</textarea>
    
    <label for="activite_starting_date" class="input-title">{{ __('titles.content.starting') }}</label>
    <input type="datetime-local" id="activite_starting_date" name="activite_starting_date" value="{{ isset($content) ? substr(str_replace(' ', 'T', $content->starting_date), 0, strlen($content->starting_date) - 3) : '' }}"></input>
    
    <label for="activite_duration" class="input-title">{{ __('titles.content.duration') }}</label>
    <input type="number" step="1" id="activite_duration" name="activite_duration" value="{{ $content->duration ?? '' }}"></input>
</div>