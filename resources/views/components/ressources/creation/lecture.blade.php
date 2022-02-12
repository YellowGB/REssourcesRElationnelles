<div
    id="lecture"
    class="flex-col w-128 lg:w-screen lg:max-w-screen-sm ressource-content"
    style="display: none;"
>
    <input
        type="text"
        name="lecture_title"
        placeholder="{{ __('titles.content.title') }}"
        value="{{ $content->title ?? '' }}"
    />
    
    <div class="flex flex-row gap-1 place-content-around mt-1 mb-2">
            <input
                type="text"
                name="lecture_author"
                placeholder="{{ trans_choice('titles.author', 1) }}"
                value="{{ $content->author ?? '' }}"
            />
            {{-- <label for="lecture_year" class="dark:text-gris-light">{{ __('titles.content.publication') }}</label> --}}
            <input
                type="number"
                id="lecture_year"
                name="lecture_year"
                min="1000"
                max="2099"
                step="1"
                value="{{ $content->year ?? '' }}"
                placeholder="{{ __('titles.content.publication') }}"
                class="w-48"
            />
    </div>

    <x-sep-horizontal />
    <textarea name="lecture_summary" cols="30" rows="10" placeholder="{{ __('titles.content.summary') }}">{{ $content->summary ?? '' }}</textarea>
    <x-sep-horizontal />
    <textarea name="lecture_analysis" cols="30" rows="10" placeholder="{{ __('titles.content.analysis') }}">{{ $content->analysis ?? '' }}</textarea>
    <x-sep-horizontal />
    <textarea name="lecture_review" cols="30" rows="10" placeholder="{{ __('titles.content.review') }}">{{ $content->review ?? '' }}</textarea>
</div>