{literal}

<section id="addComment"> 
   <div class="col-md-3 fondo-blanco">
     <p class="clasificacion">
    <img src="img/estrellaContorno.jpg" v-on:click="readScore(1)" id="star1">
    <img src="img/estrellaContorno.jpg" v-on:click="readScore(2)" id="star2">
    <img src="img/estrellaContorno.jpg" v-on:click="readScore(3)" id="star3">
    <img src="img/estrellaContorno.jpg" v-on:click="readScore(4)" id="star4">
    <img src="img/estrellaContorno.jpg" v-on:click="readScore(5)" id="star5">
  </p>
      <input type="text" ref="comment" placeholder="comentario"></input>
   <br>
      <button class="btn btn-primary" @click="save">GUARDAR</button>
      </div>
</section>
 
{/literal}