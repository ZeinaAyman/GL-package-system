



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
  <title>Package Form</title>
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

<form action="" method="post">
    @csrf

    <div class="wrapper">
  
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li style="color: red;">{{ $error }}</li>
        @endforeach
    </ul>
@endif
        <input class="inp" type="text" name="member_name" id="member_name" placeholder="Full Name" required> <br>

        <input class="inp" type="text" name="member_id" id="member_id" placeholder="Student ID Ex: 2018/12345" required> <br>

        <input class="inp" type="text" name="email" id="email" placeholder="Email" required> <br>

        <input class="inp" type="text" name="phone" id="phone" placeholder="Phone Number" required> 

    
        <h2>PICK UP YOUR PACKAGE</h2>
        <div>
        <div class="items_wrapper">
        
        <img class="item_img" style="border-radius: 50%; border: 3px solid #642d64;" src="{{ asset('img/download.jfif') }}" width="7%" height="7%" alt="">
        <div id="checkboxes"> 
          <input class="cbox" type="checkbox" name="package_items[tshirt]" value='tshirt' data-price="150" id="r1" onclick="ShowDiv()">
          <label  class="whatever" for="r1">GL TSHIRT</label> <br>

        </div>
        
      </div>
      <div class="check_wrap">
      <div id="length"> 
        <input  type="radio" name="tshirt_length"  value='Short Sleeve' id="short" checked >
        <label for="short">Short sleeve</label> <br>
        <input type="radio" name="tshirt_length"   id="long" value='Long Sleeve'>
        <label for="long">Long Sleeve</label> <br>
      </div>
      <div id="radios"> 
        <input  type="radio" name="tshirt_size"  value='Medium' id="M" checked >
        <label for="M">Medium</label> <br>
        <input type="radio" name="tshirt_size" value='Large'   id="L">
        <label for="L">Large</label> <br>
        <input  type="radio" name="tshirt_size"  value='XLarge' id="XL">
        <label  for="XL">XLarge</label> <br>
        <input  type="radio" name="tshirt_size"  value='2XLarge' id="2XL">
        <label  for="2XL">2XLarge</label> <br>
        <input  type="radio" name="tshirt_size"  value='3XLarge' id="3XL">
        <label  for="3XL">3XLarge</label> <br>
      </div>
      </div>
      
      <div class="items_wrapper">
      <img class="item_img" style="border-radius: 50%; border: 3px solid #642d64;" src="{{ asset('img/download.jfif') }}" width="7%" height="7%" alt="">
      
      <div id="checkboxes"> 
        <input class="cbox" type="checkbox" name="package_items[hoodie]" value='hoodie' data-price="250" id="r2" onclick="showhoodie()">
        <label  class="whatever" for="r2">GL HOODIE</label> <br>
      </div>
      </div>
      <div id="hoodie_radios"> 
        <input  type="radio" name="hoodie_size"  value='Medium' id="H_M" checked >
        <label for="H_M">Medium</label> <br>
        <input type="radio" name="hoodie_size" value='Large'   id="H_L">
        <label for="H_L">Large</label> <br>
        <input  type="radio" name="hoodie_size"  value='XLarge' id="H_XL">
        <label  for="H_XL">XLarge</label> <br>
        <input  type="radio" name="hoodie_size"  value='2XLarge' id="H_2XL">
        <label  for="H_2XL">2XLarge</label> <br>
      </div>  
      <div class="items_wrapper">
      <img class="item_img" style="border-radius: 50%; border: 3px solid #642d64;" src="{{ asset('img/download.jfif') }}" width="7%" height="7%" alt="">
      
      <div id="checkboxes"> 
        <input class="cbox" type="checkbox" name="nametag" value='1' data-price="50" id="r3" onclick="shownametag()">
        <label  class="whatever" for="r3">GL NAMETAG</label> <br>
      </div>
      <br>

      </div>
      <input class="inp" type="text" style="display: none; margin:auto;" name="nametag_name" id="nmtag" placeholder="Nametag Name"> <br>
      <div class="items_wrapper">
      <img class="item_img" style="border-radius: 50%; border: 3px solid #642d64;" src="{{ asset('img/download.jfif') }}" width="7%" height="7%" alt="">
      
      <div id="checkboxes"> 
        <input class="cbox" type="checkbox" name="extra_items[bracelet]" value='bracelet' data-price="10" id="r4">
        <label  class="whatever" for="r4">GL BRACELET</label> <br>
      </div>
      <br><br>
      </div>
      <div class="items_wrapper">
      <img class="item_img" style="border-radius: 50%; border: 3px solid #642d64;" src="{{ asset('img/download.jfif') }}" width="7%" height="7%" alt="">
      
      <div id="checkboxes"> 
        <input class="cbox" type="checkbox" name="extra_items[pin]" value='pin' data-price="15" id="r5">
        <label  class="whatever" for="r5">GL PIN</label> <br>
      </div>
      </div>
  </div> <br>
        </div>
        
    
    <footer id="footer">
      <div class="foot">
      <label for="">YOU WILL PAY:</label>
    <span id='amount' style="color: #a6f17a;">EGP</span>
    <div class="butn-wrap">
      <button class="butn-check " type="submit">CHECKOUT</button>
    </div>
    
      </div>
  
</footer>
</form>
</body>

<script>
  function ShowDiv() {
    var x = document.getElementById("radios");
    var y = document.getElementById("length");
  if (x.style.display === "") {
    x.style.display = "inline-block";
    y.style.display = "inline-block";
  } else if (x.style.display === "inline-block") {
    x.style.display = "";
    y.style.display = "";
  }
}

function showhoodie() {
    var x = document.getElementById("hoodie_radios");
  if (x.style.display === "") {
    x.style.display = "inline-block";
  } else if (x.style.display === "inline-block") {
    x.style.display = "";
  }
}

function shownametag() {
    var x = document.getElementById("nmtag");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else if (x.style.display === "block") {
    x.style.display = "none";
  }
}
    $(function() {
      $(".cbox").on("change",function(){
    const vals = $(".cbox:checked")
    .map(function(){
      return + this.dataset.price
    })
    .get();

   
    // test we have an array of values
    const sum = vals.length>0 ? vals.reduce((a,b) => a+b) : 0; // if no, zero sum
    document.getElementById('amount').innerHTML = sum + ' EGP';
  })
})

</script>

</html>
