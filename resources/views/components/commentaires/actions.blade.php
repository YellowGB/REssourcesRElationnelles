@auth
    <div class="my-2 flex gap-2 items-center">
        <x-icons.reply
            :title="__('Reply')"
            @click="replyComment({{ $commentaire->id }})"
            class="h-5 w-5 hover:text-primaire"
        />
        <form x-ref="reportForm" action="{{ route('comment.report', ['id' => $commentaire->id]) }}">
            <x-icons.exclamation
                :title="__('titles.btn.report')"
                @click="$refs.reportForm.submit()"
                class="hover:text-yellow-600"
            />
        </form>
    </div>
@endauth