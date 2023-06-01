<div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('create-post')
        </div>
    </div>

    @foreach ($posts as $post)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                                {{ $post->title }}</h5>
                        </a>
                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px lg:px-8">
                                {{ $post->content }}</p>

                                @if ($post->id_creator == auth()->user()->id)
                                @else
                                    @livewire('chat.create-chat', ['posts' => $post])
                                @endif
                            </div>
                        </div>
                        <a href="">Publicado por {{ $post->user->name }}</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


</div>
