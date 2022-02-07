<x-app-layout>
    
    @foreach ($roles as $role)
        <h2>{{ $role->name }}</h2>
    @endforeach

</x-app-layout>