<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX Example</title>
</head>
<body>

<div id="data-container">
    <h2>User Data</h2>
    <p id="name">Name: </p>
    <p id="age">Age: </p>
    <p id="email">Email: </p>
</div>

<button id="getDataBtn">Get Data</button>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#getDataBtn').click(function(){
        $.ajax({
            url: "/getData",
            type: 'GET',
            success: function(data) {
                $('#name').html('Name: ' + data.name);
                $('#age').html('Age: ' + data.age);
                $('#email').html('Email: ' + data.email);
            },
            error: function(xhr) {
                alert('Error occurred while fetching data.');
            }
        });
    });


</script>

</body>
</html>
