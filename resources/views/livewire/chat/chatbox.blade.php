<div>
    {{-- Stop trying to control. --}}

    @if ($selectedConversation)
        <div class="chatbox_header">

            <div class="return">
                <i class="bi bi-arrow-left"></i>
            </div>

            <div class="img_container">
                <img src="https://ui-avatars.com/api/?name={{ $receiverInstance->name }}" alt="">

            </div>


            <div class="name">
                {{ $receiverInstance->name }}
            </div>

        </div>

        <div class="chatbox_body">

            @foreach ($messages as $message)
                    <div class="msg_body  {{ auth()->id() == $message->sender_id ? 'msg_body_me' : 'msg_body_receiver' }}"
                        style="width:80%;max-width:80%;max-width:max-content">

                        @if ($message->type=='image' )
                        <img src="{{ Storage::url($message->url) }}" alt="" />
                        {{ $message->body }}
                        @else
                        {{ $message->body }}

                        @endif
                        <div class="msg_body_footer">
                            <div class="date">

                                {{ $message->created_at->format('H: i a') }}
                            </div>


                        </div>
                    </div>

            @endforeach

        </div>


        <script>
            $(".chatbox_body").on('scroll', function() {
                var top = $('.chatbox_body').scrollTop();
                if (top == 0) {
                    window.livewire.emit('loadmore');
                }
            });
        </script>


        <script>
            window.addEventListener('updatedHeight', event => {

                let old = event.detail.height;
                let newHeight = $('.chatbox_body')[0].scrollHeight;

                let height = $('.chatbox_body').scrollTop(newHeight - old);
                window.livewire.emit('updateHeight', {
                    height: height,
                });
            });
        </script>
    @else
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden ">
                    <div class="p-6 bg-white  ">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                                Aun no tienes conversaciones seleccionadas
                        </a>
                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px lg:px-8">
                                {{-- Aun no tienes conversaciones --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>




    @endif


    <script>
        window.addEventListener('rowChatToBottom', event => {

            $('.chatbox_body').scrollTop($('.chatbox_body')[0].scrollHeight);

        });
    </script>


    <script>
        $(document).on('click', '.return', function() {


            window.livewire.emit('resetComponent');

        });
    </script>


    {{-- <script>
        window.addEventListener('markMessageAsRead', event => {
            var value = document.querySelectorAll('.status_tick');

            value.array.forEach(element, index => {


                element.classList.remove('bi bi-check2');
                element.classList.add('bi bi-check2-all', 'text-primary');
            });

        });
    </script> --}}
</div>
