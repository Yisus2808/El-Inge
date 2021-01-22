<div class="container-portada">
  <div class="container-details">
      <div class="details animated fadeInDown delay-2s">
          <h1>EL INGE</h1>
          <p class="font-weight-normal">Somos una empresa confiable con productos certificados para su confiabilidad.</p>

          <div class="container-flecha  wow slideOutDown infinite delay-3s slower">
            <div class="content-flecha">
              <a href="#principal">
              <svg id="more-arrows">
                <polygon class="arrow-top" points="37.6,27.9 1.8,1.3 3.3,0 37.6,25.3 71.9,0 73.7,1.3 "/>
                <polygon class="arrow-middle" points="37.6,45.8 0.8,18.7 4.4,16.4 37.6,41.2 71.2,16.4 74.5,18.7 "/>
                <polygon class="arrow-bottom" points="37.6,64 0,36.1 5.1,32.8 37.6,56.8 70.4,32.8 75.5,36.1 "/>
              </svg>
              </a>
            </div>
          </div>
      </div>
  </div>
  <!-- <div class="capa-gradient">
  </div> -->
</div>
<style>

/*Portada*/
.container-portada{
  width: 100%;
  height: 650px;
  background-image: url(vista/assets/img/CAMPO_2.jpg);  
  background-size: 200%;
  animation: movimiento 20s infinite linear alternate; 
  position: relative;
}

@keyframes movimiento{
    from{
        background-position: bottom left;
        }to{
        background-position: top right;
    }

}
/* .capa-gradient{
    width: 100%;
    height: 100%;
    position: absolute;
    background: -webkit-linear-gradient(left, #060606, #0672d0);
    opacity: 0.1;
} */

.container-details{
    width: 100%;
    max-width: 1200px;
    position: relative;
    margin: auto;
    color: black;
    text-shadow: 1px 2px #fff;
}
.details{
    /* width: 100%;
    max-width: 500px; */
    position: relative;
    top: 150px;
    text-align: center;
    
}
.details h1{
    font-size: 50px;
    font-weight: 100;
    font-family: 'Anton', sans-serif;
    margin-bottom: 0;
    display: block;
}

.details p{
    margin-top: 40px;
    color: green;
    font-family: 'Anton', sans-serif;
/*     font-size: 1.5rem;
    display: block;
    padding-bottom: 2rem; */
}


/* FLECHA */
/* Arrow & Hover Animation */
#more-arrows {
    width: 75px;
  height: 65px;
  
  &:hover {
    
    polygon {
      fill: white;
      transition: all .2s ease-out;

      &.arrow-bottom {
        transform: translateY(-18px);
      }

      &.arrow-top {
        transform: translateY(18px);
      }
      
    }
  
  }
  
}

polygon {
  fill: #000;
  transition: all .2s ease-out;
    
  &.arrow-middle {
      opacity: 0.75;
    }

    &.arrow-top {
      opacity: 0.5
    }
     
}


@media (max-width: 960px) {
    .container-details {
        padding: 0 3rem 0 3rem;
    }

    .details{
      top: 100px;
    }
}

/* .details p{
    margin-top: 20px;
    font-size: 1.2rem;
    display: block;
    padding-bottom: 2rem;
    font-weight: 100;
    margin-bottom: 0;
} */
</style>