"use strict"

let product = document.querySelector("#id_product").value; 
let id_user = document.querySelector("#user").value; 
console.log('id_user: ', id_user);
let user_permit = document.querySelector("#permit").value;
console.log('user_permit: ', user_permit);
let admin = false;
if(user_permit==1){
    admin = true;
};

let comments = new Vue({
    el: "#comments",
    data: {
        loading: true,
        error: false,
        allComments: [], //falta obtener el username a partir del id_user
        permit: admin
    },
    methods: {

        eliminar: function(id){
            deleteComment(id);
        },
    },
});

//OBTENGO TODOS LOS COMENTARIOS PARA EL PRODUCTO ACTUAL
function getComments(){
    comments.loading = true;
    let id_product = product;
    console.log("id_product ",id_product);
    fetch('api/comments/product/' + id_product)
        .then(response => response.json())
        .then(commentsInProduct =>{
            console.log(commentsInProduct);
            if(commentsInProduct == null){
                comments.error = true;
            }
            else{
                comments.allComments = commentsInProduct;
            }
            comments.loading = false;
        })
    
};
getComments();

//EDITAR NOMBRES Y DETALLES
let addComment = new Vue({
    //Vue para añadir nuevo comentario
    el: "#addComment",
    data: {
      form: {
        puntuacion: null,
        comentario: "",
      },
    },
    methods: {

      readScore(starNumber){
        pintar(starNumber);
        this.form.puntuacion = starNumber;
      },

      save() {
        this.form.comentario = this.$refs["comment"].value;
        let comment = this.form.comentario;
        let score = this.form.puntuacion;
        saveComment(score, comment);
      },
    },
  });

  function saveComment(score, comment) {
    let newComment = {
      id_product: product,
      id_user: id_user,
      text: comment,
      score: score,
    };
    console.log('id_product',product);
    fetch("api/comments/product/" + product, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(newComment),
    })
    .then((response) => {
        if (response.ok){
            getComments();
        }
        else{
            alert('No se pudo agregar tu comentario');
        }
    })
      .catch((error) => {
        console.log(error);
      })
  };
//EDITAR NOMBRES Y DETALLES

function deleteComment(id){
    fetch('api/comments/' + id, { method: 'DELETE' })
        .then((response) => { return response.text() })
        .then(response => {
            if (response == 'true') {
                getComments();
            }
            else{
                alert("no se puede eliminar el comentario.");
            }
        })
};

function pintar(star){

  switch (star) {
    case 1:
      document.getElementById("star1").src="img/estrellaRellena.jpg";
    break;
    case 2:
      document.getElementById("star1").src="img/estrellaRellena.jpg";
      document.getElementById("star2").src="img/estrellaRellena.jpg";
    break;
    case 3:
      document.getElementById("star1").src="img/estrellaRellena.jpg";
      document.getElementById("star2").src="img/estrellaRellena.jpg";
      document.getElementById("star3").src="img/estrellaRellena.jpg";
    break;
    case 4:
      document.getElementById("star1").src="img/estrellaRellena.jpg";
      document.getElementById("star2").src="img/estrellaRellena.jpg";
      document.getElementById("star3").src="img/estrellaRellena.jpg";
      document.getElementById("star4").src="img/estrellaRellena.jpg";
    break;
    default:
      document.getElementById("star1").src="img/estrellaRellena.jpg";
      document.getElementById("star2").src="img/estrellaRellena.jpg";
      document.getElementById("star3").src="img/estrellaRellena.jpg";
      document.getElementById("star4").src="img/estrellaRellena.jpg";
      document.getElementById("star5").src="img/estrellaRellena.jpg";
    break;
  }

}

