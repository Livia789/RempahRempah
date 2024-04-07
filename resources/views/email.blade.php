<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{$title}}</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: "Arial";
    }
    .container {
      width: 100%;
      background-color: #F0E8E9;
    }
    #logo {
        width: 100px;
    }
    .header, .footer {
      align: center;
      padding: 20px 0px;
      text-align: center;
    }
    .content {
      margin: 0px 50px;
      padding: 50px;
      background-color: white;
      text-align: justify;
    }
    .text {
      font-weight: bold;
      font-size: 25px;
    }
    .token {
      background-color: #E3E800;
      border: 0.5px solid black;
      border-radius: 15px;
      margin: 20px 0;
      padding: 15px 0;
      text-align: center;
    }

    @media (max-width:595px) {
      .container {
        width: 100% !important;
      }
    }
  </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ $message->embed(public_path('/assets/logo_rempah.png')) }}" alt="RempahRempah" id="logo">
        </div>
        <div class="content">
        <p class="text">{{$greeting}}</p>
        @foreach(explode("\\n", $body) as $line)
            {{ $line }}<br>
        @endforeach
        @if (isset($token))
            <div class="token">
                {{$token}}
            </div>
        @endif
        <p class="warning">{{$warning}}</p>
        </div>
        <div class="footer">
        </div>
    </div>
</body>
</html>
