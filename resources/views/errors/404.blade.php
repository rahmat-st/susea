<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SuSea.com | Halaman tidak ditemukan</title>

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      text-transform: uppercase;
    }

    div#container {
      height: 100vh;
      background-color: white;
      position: relative;
    }

    div#center {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -70%);
      text-align: center;
    }

    h1 {
      color: #3490dc;
      margin-top: 48px;
    }

    b {
      background-color: #3490dc;
      color: white;
      padding: 6px 16px;
      box-sizing: border-box;
    }

    p {
      margin-top: 24px;
      color: #3490dc;
      font-weight: bold;
      letter-spacing: 2px;
    }

    @media (max-width: 544px) {
      h1 {font-size: 24px}
      p {font-size: 12px}
    }
  </style>
</head>
<body>
  <div id="container">
    <div id="center">
      <a href="{{url('/')}}"><img src="{{ asset('image/susea-fill-text.png') }}" alt="" width="240"></a>
      <h1>404 <b>Not Found</b></h1>
      <p class="responsive-font-size">Halaman tidak ditemukan</p>
    </div>
  </div>
</body>
</html>