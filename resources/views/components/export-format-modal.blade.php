<div x-data="{ checkbox: null }">
    <input x-init="checkbox = $el" type="checkbox" id="export-format-modal-{{ $route }}" class="modal-toggle" />
    <label for="export-format-modal-{{ $route }}" class="modal cursor-pointer">
        <label class="modal-box relative bg-blanc dark:bg-gris-normal flex justify-around items-center" for="">
            <a href="{{ route($export, ['format' => 'xlsx']) }}" @click="checkbox.checked = false"><x-icons.xlsx /></a>
            <a href="{{ route($export, ['format' => 'csv']) }}" @click="checkbox.checked = false"><x-icons.csv /></a>
        </label>
    </label>
</div>