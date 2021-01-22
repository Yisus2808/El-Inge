<!-- JQuery 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<script src="vista/js/jquery-3.3.1.min.js"></script>

<!-- Bootstrap tooltips 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>-->
<script src="vista/js/popper.min.js"></script>

<!-- Bootstrap core JavaScript 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>-->
<script src="vista/js/bootstrap.min.js"></script>

<!-- MDB core JavaScript 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.0/js/mdb.min.js"></script>-->
<script src="vista/js/mdb.min.js"></script>
<!--WOW-->
<script src="vista/js/wow.js"></script>
<!--Requerido para uso de WOW & Animated-->
<script>
  wow = new WOW(
    {
      animateClass: 'animated',
      offset:       100,
      callback:     function(box) {
        console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
      }
    }
  );
  wow.init();
  document.getElementById('moar').onclick = function() {
    var section = document.createElement('section');
    section.className = 'section--purple wow fadeInDown';
    this.parentNode.insertBefore(section, this);
  };
</script>

<!-- sweet alert -->
<script src="vista/js/sweetalert2.min.js"></script>