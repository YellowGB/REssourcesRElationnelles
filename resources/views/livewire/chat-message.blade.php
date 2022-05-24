<div id="text-right">
    {{-- @php
        dd($user)
    @endphp --}}
    @auth
        <div class="container">
            <h2>Chat Message</h1>
            </br>
            <div class="h-20 scrollbar scrollbar-thumb-gray-900 scrollbar-track-gray-100">
                <div class="border-2 p-2 m-2" id="message-list">
                    @foreach ($messages as $message)
                        <div class="bg-sky-200 mb-3 ml-2 mr-2 p-3 rounded-2xl rounded-tl-none place-self-end">
                            <p>{{$message->content}} <p class="italic text-neutral-400">de {{$message->user->name}}</p></p>
                        </div>
                    @endforeach
                </div>
                <div class="message-send">
                    @csrf
                    <form>
                        <input wire:model="message" type="text" class="w-40">
                        <button wire:click="submit" type="button" class="btn btn-blue"> Send </button>
                    </form>
                </div>
            </div>
            {{-- <script src="{{ asset('js/chat-message.js') }}" defer></script> --}}
        </div>
    @endauth
</div>