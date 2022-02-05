<div id="jeu" class="ressource-content" style="display: none;">
    <textarea name="jeu_description" cols="30" rows="10" placeholder="{{ __('titles.content.description') }}">{{ $content->description ?? '' }}</textarea>
    
    <label for="jeu_starting_date" class="input-title">{{ __('titles.content.starting') }}</label>
    <input type="datetime-local" id="jeu_starting_date" name="jeu_starting_date" value="{{ isset($content) ? substr(str_replace(' ', 'T', $content->starting_date), 0, strlen($content->starting_date) - 3) : '' }}"></input>
    
    <input type="text" name="jeu_link" placeholder="{{ __('titles.link.link') }}" value="{{ $content->link ?? '' }}"></input>
</div>