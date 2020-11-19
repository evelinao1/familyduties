<header class="container bg-green">
    <div class="row">
                <div class="col-lg-3 col-3 col-md-3">
                    <img class="" src="./pic/images2.png" alt="zaisliukai">    
                </div>
                <div class="col-lg-6 col-6 col-md-6">
                    <h1 class="col-5 title">Kalėdos</h1>
                </div>
                <div class="col-lg-3 col-3 col-md-3">
                <!-- Registration closes in <span id="time">05:00</span> minutes! -->
                <h3 id="countdown"></h3>


                </div>
    </div>
    </header>
<script>
    year = new Date().getFullYear();
BigDay = new Date("December 25," + year);

var x = setInterval(function () {
  var now = new Date().getTime();

  var distance = BigDay - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
 
//   document.getElementById("ball").innerHTML = + days + "<br> days ";
  document.getElementById("countdown").innerHTML =
    "Iki Kalėdų liko tik <br>" +
    days +
    " dienos " +
    hours +
    " val. " +
    minutes +
    " min. " +
    seconds +
    " s. ";
}, 1000);

</script>