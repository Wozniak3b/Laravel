<head>
    <title>Chat App</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div id="app">
                        <h3>Simple Group Chat Room</h3>
                        <br>
                        <article id="messages"></article>
                        <form id="mess-form">
                            <input type="text" id="mess_input" placeholder="Type your message" required>
                            <button type="submit">Send!</button>
                        </form>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function(){
                            fetch_message();

                            function fetch_message(){
                                $.get('/messages',function(data){
                                    //$('#messages').html('');
                                    data.forEach(message=>{
                                        $('#messages').append('<div class="message color="red"><strong>'+message.user.name+':</strong>'+message.message+'</div>'); 
                                    });
                                })
                            }

                            $('#message-form').on('submit',function(a){
                                a.preventDefault();
                                var message=$('#message-input').val();

                                $.ajax({
                                    url:'/messages',
                                    type: 'POST',
                                    data: {message:message},
                                    success: function(data) {
                                        $('#message-input').val('');
                                        $('#messages').append('<div class="message color="red"><strong>'+data.user.name+':</strong>'+data.message+'</div>');
                                        $('#messages').text(data.message);                                    }
                                });
                            });

                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
