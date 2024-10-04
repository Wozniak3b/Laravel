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
                        <form id="mess-form">
                            <input type="text" id="mess_input" placeholder="Type your message" required>
                            <button type="submit" id="send">Send!</button>
                        </form>
                        <article id="messages"></article>
                    

                    <script type="text/javascript">
                        $(document).ready(function(){
                            //load();
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            
                            $('#mess-form').submit(function(a){
                                a.preventDefault();
                                var message=$('#mess-input').val();
                                console.log();

                                $.post({
                                    url:'/messages',
                                    type: 'POST',
                                    data: {message},
                                    success: function(data) {
                                        $('#mess-input').val('');
                                        $('#messages').append('<div class="message" color="red"><strong>'+data.user.name+':</strong>'+data.message+'</div>');
                                        $('#messages').text(data.message);                                    
                                    }
                                });
                            });

                            function load(){
                                $.get('/messages',function(data){
                                    if(data.message){
                                        data.message.forEach(message=>{
                                            $('#messages').append(render_mess(message))
                                        })
                                    }
                                    load();
                                });   
                            }

                            function render_mess(n){
                                console.log(n);
                                //return '<div class="msg"><p>$(n.user.name)</p>$(n.message)</div>';
                            }

                        });
                    </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
