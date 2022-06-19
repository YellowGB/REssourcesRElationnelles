<div
    x-data="{ fromSelf: false }"
    x-init="scrollBottom(); fromSelf = {{ $message->user_id === auth()->user()->id ? 'true' : 'false' }};"
    class="flex justify-between items-center"
>
    <template x-if="! fromSelf">
        <p class="italic text-gray-400 text-xs">{{ get_user_display_name($message->user) }}</p>
    </template>
    <p
        class="mb-3 mx-2 p-3 rounded-2xl max-w-[75%] dark:text-noir"
        :class="{
            'bg-sky-200 rounded-tl-none': fromSelf,
            'bg-gray-200 rounded-tr-none text-right': ! fromSelf,
        }"
    >
        {{ $message->content }}
    </p>
</div>