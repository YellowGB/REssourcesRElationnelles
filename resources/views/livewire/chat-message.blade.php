<div id="text-right">
    {{-- @php
        dd($user)
    @endphp --}}
    @auth
        <div class="container">
            <h2>Chat Message</h1>
            <div class="scrolling-auto overflow-auto place-self-start m-2 border-2 pt-2 w-50">
                @foreach ($messages as $messages)
                    <p class="bg-slate-200 mb-3 ml-2 mr-2 p-3 rounded-2xl rounded-tl-none">
                        {{$messages->content}}
                    </p>
                    <p class="bg-slate-200 mb-3 ml-2 mr-2 p-3 rounded-2xl rounded-tl-none">
                        {{-- {{$messages->user_id}} --}}
                        {{$user->name}}
                    </p>

                @endforeach
            </div>
            <div class="message-send">
                @csrf
                <form>
                    <input type="text" class="w-40">
                    <button type="button" class="favorite styled" id="submitMessage"> Send </button>
                </form>
            </div>
        </div>
    @endauth
</div>