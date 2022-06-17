<div class="text-right m-4">
    @auth
        @if($groupes)
            <div class="container">
                <div class="flex flex-row border-2 p-2">
                    @foreach ($groupes as $group)
                        <button wire:click="switchgroup({{$group->id}})" type="button" class="btn btn-blue"> {{$group->name}} </button>
                    @endforeach
                </div>
                <h2>Chat Message</h1>
                </br>
                <div class="h-20 scrollbar scrollbar-thumb-gray-900 scrollbar-track-gray-100">
                    <div class="border-2 p-2 m-2">
                        @foreach ($messages as $message)
                            <div class="bg-sky-200 mb-3 ml-2 mr-2 p-3 rounded-2xl rounded-tl-none place-self-end">
                                <p>{{$message->content}} <p class="italic text-gray-400	">de {{$message->user->name}}</p></p>
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
            </div>
        @endif
    @endauth
</div>
