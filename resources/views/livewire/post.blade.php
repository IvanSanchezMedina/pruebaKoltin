<div>
    <x-slot name="header">
        <h2>Publicaciones</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px lg:px-8">
            @livewire('create-post')
        </div>

        <div class="max-w-7xl mx-auto sm:px lg:px-8">

            @livewire('list-posts')
        </div>

    </div>
</div>
