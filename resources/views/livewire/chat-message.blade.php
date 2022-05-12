<div id="text-right">
    {{-- @php
        dd($user)
    @endphp --}}
    @auth
        <div class="container">
            <h2>Chat Message</h1>
            </br>
            <div class="h-20 scrollbar scrollbar-thumb-gray-900 scrollbar-track-gray-100">
                <div class="message-list border-2 p-2 m-2">
                    @foreach ($messages as $messages)
                        <p class="bg-slate-200 mb-3 ml-2 mr-2 p-3 rounded-2xl rounded-tl-none place-self-end">
                            {{$messages->content}}
                        </p>
                        <p class="bg-slate-200 mb-3 ml-2 mr-2 p-3 rounded-2xl rounded-tl-none place-self-end">
                            {{$messages->user->name}}
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
        </div>
    @endauth
</div>