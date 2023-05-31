<div>
    <x-jet-danger-button wire:click="$set('open',true)">Crear post</x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name='title'>
            Crear nueva publicacion.
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Titulo"/>
                    <x-jet-input type="text" class="w-full" wire:model="title"/>
                    {{$title}}
            </div>

            <div class="mb-4">
                <x-jet-label value="Contenido"/>
                    <textarea  type="text" class="w-full form-control" rows="6" wire:model="content"></textarea>

            </div>


        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open',false)">Cancelar</x-jet-secondary-button>
            <x-jet-danger-button  wire:click="save">Crear</x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
