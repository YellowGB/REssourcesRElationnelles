<div class="flex justify-center mt-2">
    @edit($ressource->ressourceable->file_uri)
        <video controls class="w-full">
            <source src="{{ asset($ressource->ressourceable->file_uri) }}" type="video/mp4">
        </video>
    @endedit
</div>