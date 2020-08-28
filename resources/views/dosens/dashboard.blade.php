
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h2>Dosen Page {{ Auth::guard('pengguna')->user()->nama }}</h2>
  <br>
  <a href="/logout/pengguna">Logout</a>
</body>
</html>