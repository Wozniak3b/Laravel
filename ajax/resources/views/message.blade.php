<html>
   <head>
      <title>Ajax Example</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   </head>
   
   <body>
      <div class="container">
         <h1>Laravel AJAX Demo</h1>
         <button id="fetchMessage">Fetch Message</button>
         <p id="message"></p>
     </div>
 
     <script type="text/javascript">
         $(document).ready(function() {
             $('#fetchMessage').click(function() {
                 $.ajax({
                     url: "{{ route('get-message') }}",
                     type: 'GET',
                     success: function(data) {
                         $('#message').text(data.message);
                     },
                     error: function(xhr, status, error) {
                         console.error(error);
                     }
                 });
             });
         });
     </script>
   </body>

</html>