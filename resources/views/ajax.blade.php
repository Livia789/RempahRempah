<!DOCTYPE html>
<html>
<head>

<body>

  <button id="changeValueBtn">
    this is button
  </button>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>


$(document).ready(function(){
  $("#changeValueBtn").click(function(){
      alert("hello world");
      var cmd = $(this).data('cmd');
      var type = $(this).data('type');
      var value = $(this).data('value');
      $.ajax({
          url: '/updateSelected',
          type: 'POST',
          data: {
              cmd: cmd,
              type: type,
              value: value,
              _token: '{{ csrf_token() }}'
          },
          success: function(result){
              console.log('ok'+result['message']);
          },
          error: function(e) {
              console.log('no'+e);
          }
      });
  });
});

</script>
</head>
<body>

<button>Send an HTTP POST request to a page and get the result back</button>

</body>
</html>
