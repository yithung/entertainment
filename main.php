<!DOCTYPE html>
<html>
<title>Group 1 - Grooob</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="preconnect" href="https://fonts.gstatic.com"> 
<link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: 'Paytone One', sans-serif;}
.w3-bar-block .w3-bar-item {padding:20px}

.container {
  position: relative;
  width: 100%;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container:hover .image {
  opacity: 0.2;
}

.container:hover .middle {
  opacity: 1;
}

.imgtext{
  color: black;
  font-size: 160%;
}

</style>
<body>

<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:30%;min-width:300px" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button">Close Menu</a>
  <a class="w3-bar-item">Group Members:<br>Ing Sam Yin<br>Gan Yi Thung<br>Ooi Zhen Hao<br>Seow Yong Tao<br>Wong Khai Hin<br>Michael Thong Wei Wen</a>
</nav>

<!-- Top menu -->
<div class="w3-top">
  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
    <div class="w3-right w3-padding-16">COMP1044</div>
    <div class="w3-center w3-padding-16">Group 1 - Grooob</div>
  </div>
</div>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

  <!-- First Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center">
    <div class="w3-quarter">
      <div class="container">
        <a href="http://hcyyg1.mercury.nottingham.edu.my/cw2/files/actor_front.php">
          <img src="images/actor.png" class="w3-round-large image" alt="actor" style="width:100%">
          <div class="middle">
            <div class="imgtext">actor</div>
          </div>
      </div>
      <p style="margin-bottom:2px"></p>
    </div>

    <div class="w3-quarter">
      <div class="container">
        <a href="http://hcyyg1.mercury.nottingham.edu.my/cw2/files/address_front.php">
          <img src="images/address.png" class="w3-round-large image" alt="address" style="width:100%">
          <div class="middle">
            <div class="imgtext">address</div>
          </div>
      </div>
      <p style="margin-bottom:2px"></p>
    </div>

    <div class="w3-quarter">
      <div class="container">
        <a href="http://hcyyg1.mercury.nottingham.edu.my/cw2/files/category_front.php">
        <img src="images/category.png" class="w3-round-large image" alt="category" style="width:100%">
          <div class="middle">
            <div class="imgtext">category</div>
          </div>
      </div>
      <p style="margin-bottom:2px"></p>
    </div>

    <div class="w3-quarter">
      <div class="container">
        <a href="http://hcyyg1.mercury.nottingham.edu.my/cw2/files/city_front.php">
        <img src="images/city.png" class="w3-round-large image" alt="city" style="width:100%">
          <div class="middle">
            <div class="imgtext">city</div>
          </div>
      </div>
    </div>
  </div>
  
  <!-- Second Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center">
    <div class="w3-quarter">
      <div class="container">
        <a href="http://hcyyg1.mercury.nottingham.edu.my/cw2/files/country_front.php">
        <img src="images/country.png" class="w3-round-large image" alt="country" style="width:100%">
          <div class="middle">
            <div class="imgtext">country</div>
          </div>
      </div>
      <p style="margin-bottom:2px"></p>
    </div>

    <div class="w3-quarter">
      <div class="container">
        <a href="http://hcyyg1.mercury.nottingham.edu.my/cw2/files/customer_front.php">
        <img src="images/customer.png" class="w3-round-large image" alt="customer" style="width:100%">
          <div class="middle">
            <div class="imgtext">customer</div>
          </div>
      </div>
      <p style="margin-bottom:2px"></p>
    </div>

    <div class="w3-quarter">
      <div class="container">
        <a href="http://hcyyg1.mercury.nottingham.edu.my/cw2/files/film_front.php">
        <img src="images/film.png" class="w3-round-large image" alt="film" style="width:100%">
          <div class="middle">
            <div class="imgtext">film</div>
          </div>
      </div>
      <p style="margin-bottom:2px"></p>
    </div>

    <div class="w3-quarter">
      <div class="container">
        <a href="http://hcyyg1.mercury.nottingham.edu.my/cw2/files/film_actor_front.php">
        <img src="images/film_actor.png" class="w3-round-large image" alt="film_actor" style="width:100%">
          <div class="middle">
            <div class="imgtext">film_actor</div>
          </div>
      </div>
    </div>
  </div>

   <!-- Third Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center">
    <div class="w3-quarter">
      <div class="container">
        <a href="http://hcyyg1.mercury.nottingham.edu.my/cw2/files/film_category_front.php">
        <img src="images/film_category.png" class="w3-round-large image" alt="film_category" style="width:100%">
          <div class="middle">
            <div class="imgtext">film_category</div>
          </div>
      </div>
      <p style="margin-bottom:2px"></p>
    </div>

    <div class="w3-quarter">
      <div class="container">
        <a href="http://hcyyg1.mercury.nottingham.edu.my/cw2/files/film_features_front.php">
        <img src="images/film_features.png" class="w3-round-large image" alt="film_features" style="width:100%">
          <div class="middle">
            <div class="imgtext">film_features</div>
          </div>
      </div>
      <p style="margin-bottom:2px"></p>
    </div>

    <div class="w3-quarter">
      <div class="container">
        <a href="http://hcyyg1.mercury.nottingham.edu.my/cw2/files/film_release_front.php">
        <img src="images/film_release.png" class="w3-round-large image" alt="film_release" style="width:100%">
          <div class="middle">
            <div class="imgtext">film_release</div>
          </div>
      </div>
      <p style="margin-bottom:2px"></p>
    </div>

    <div class="w3-quarter">
      <div class="container">
        <a href="http://hcyyg1.mercury.nottingham.edu.my/cw2/files/film_text_front.php">
        <img src="images/film_text.png" class="w3-round-large image" alt="film_text" style="width:100%">
          <div class="middle">
            <div class="imgtext">film_text</div>
          </div>
      </div>
    </div>
  </div>

     <!-- Fourth Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center">
    <div class="w3-quarter">
      <div class="container">
        <a href="http://hcyyg1.mercury.nottingham.edu.my/cw2/files/inventory_front.php">
        <img src="images/inventory.png" class="w3-round-large image" alt="inventory" style="width:100%">
          <div class="middle">
            <div class="imgtext">inventory</div>
          </div>
      </div>
      <p style="margin-bottom:2px"></p>
    </div>

    <div class="w3-quarter">
      <div class="container">
        <a href="http://hcyyg1.mercury.nottingham.edu.my/cw2/files/language_front.php">
        <img src="images/language.png" class="w3-round-large image" alt="language" style="width:100%">
          <div class="middle">
            <div class="imgtext">language</div>
          </div>
      </div>
      <p style="margin-bottom:2px"></p>
    </div>

    <div class="w3-quarter">
      <div class="container">
        <a href="http://hcyyg1.mercury.nottingham.edu.my/cw2/files/payment_front.php">
        <img src="images/payment.png" class="w3-round-large image" alt="payment" style="width:100%">
          <div class="middle">
            <div class="imgtext">payment</div>
          </div>
      </div>
      <p style="margin-bottom:2px"></p>
    </div>

    <div class="w3-quarter">
      <div class="container">
        <a href="http://hcyyg1.mercury.nottingham.edu.my/cw2/files/rental_front.php">
        <img src="images/rental.png" class="w3-round-large image" alt="rental" style="width:100%">
          <div class="middle">
            <div class="imgtext">rental</div>
          </div>
      </div>
    </div>
  </div>

     <!-- Fifth Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center">
    <div class="w3-quarter">
      <div class="container">
        <a href="http://hcyyg1.mercury.nottingham.edu.my/cw2/files/special_features_front.php">
        <img src="images/special_features.png" class="w3-round-large image" alt="special_features" style="width:100%">
          <div class="middle">
            <div class="imgtext">special_features</div>
          </div>
      </div>
      <p style="margin-bottom:2px"></p>
   </div>

    <div class="w3-quarter">
      <div class="container">
        <a href="http://hcyyg1.mercury.nottingham.edu.my/cw2/files/staff_front.php">
        <img src="images/staff.png" class="w3-round-large image" alt="staff" style="width:100%">
          <div class="middle">
            <div class="imgtext">staff</div>
          </div>
      </div>
      <p style="margin-bottom:2px"></p>
    </div>

    <div class="w3-quarter">
      <div class="container">
        <a href="http://hcyyg1.mercury.nottingham.edu.my/cw2/files/store_front.php">
        <img src="images/store.png" class="w3-round-large image" alt="store" style="width:100%">
          <div class="middle">
            <div class="imgtext">store</div>
          </div>
      </div>
      <p style="margin-bottom:2px"></p>
    </div>

    <div class="w3-quarter einstein">
      <a href="https://github.com/whyteeyt/Entertainment">
      <img src="images/ahh.png" class="w3-round-large" alt="ahh" onmouseover="this.src='images/blek.png'" onmouseout="this.src='images/ahh.png'" style="width:100%">
    </div>
  </div>

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

</body>
</html>

