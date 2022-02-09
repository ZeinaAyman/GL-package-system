<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
  <title>Form Success</title>
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>
<body>
<section>
  <div class="wrap">
      <img class="object-center mx-auto" src="{{ asset('img/default.png') }}" width="10%" height="10%" alt="">

  </div>
    </section>
    <div class="wrapper">
        <h3>Form Submitted!</h2>
        <h3>Your Serial number is  {{$serial_number}}<br>An Email has been sent with a receipt of your purchase details</h3>
    </div>




</body>
</html>
<footer id="footer" style="position:fixed; bottom: 0;">
      
  
      </footer>