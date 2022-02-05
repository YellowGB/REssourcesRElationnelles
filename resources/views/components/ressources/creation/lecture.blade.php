<div id="lecture" class="ressource-content" style="display: none;">
    <input type="text" name="lecture_title" placeholder="{{ __('titles.content.title') }}" value="{{ $content->title ?? '' }}"></input>
    <input type="text" name="lecture_author" placeholder="{{ trans_choice('titles.author', 1) }}" value="{{ $content->author ?? '' }}"></input>
    
    <label for="lecture_year" class="input-title">{{ __('titles.content.publication') }}</label>
    <input type="number" id="lecture_year" name="lecture_year" min="1000" max="2099" step="1" value="{{ $content->year ?? '' }}"></input>
    
    <textarea name="lecture_summary" cols="30" rows="10" placeholder="{{ __('titles.content.summary') }}">{{ $content->summary ?? '' }}</textarea>
    <textarea name="lecture_analysis" cols="30" rows="10" placeholder="{{ __('titles.content.analysis') }}">{{ $content->analysis ?? '' }}</textarea>
    <textarea name="lecture_review" cols="30" rows="10" placeholder="{{ __('titles.content.review') }}">{{ $content->review ?? '' }}</textarea>
</div>