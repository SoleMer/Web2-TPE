"use strict"

//ONTENGO LOS VALORES DESDE EL TPL
let product = document.querySelector("#id_product").value; 
let username = document.querySelector("#username").value; 
let user_permit = document.querySelector("#permit").value;
let admin = false;
//DOY ACCESO A LOS PERMISOS DE ADMINISTRADOR
if(user_permit==1){
    admin = true;
};

//VUE PARA MOSTRAR LOS COMENTARIOS
let comments = new Vue({
    el: "#comments",
    data: {
        loading: true, //MIENTRAS CARGAN LOS COMENTARIOS MUESTRA QUE ESTA CARGANDO
        error: false, //SI NO SE OBTIENEN COMENTARIOS SE MOSTRARA EL ERROR
        allComments: [], 
        permit: admin //PERMISOS DE ADMINISTRADOR
    },
    methods: {

        eliminar: function(id){ 
            deleteComment(id);
        },

        ordenar: function(orden){
          getCommentsOrder(orden);
        },
    },
});

//OBTENGO TODOS LOS COMENTARIOS PARA EL PRODUCTO ACTUAL
function getComments(){
    comments.loading = true;
    let id_product = product;
    fetch('api/comments/product/' + id_product)
        .then(response => response.json())
        .then(commentsInProduct =>{
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

//OBTENER LOS COMENTARIOS EN EL ORDEN SELECCIONADO
function getCommentsOrder(orden){
  comments.loading = true;
  let id_product = product;
  fetch('api/comments/product/' + id_product + '/' + orden)
      .then(response => response.json())
      .then(commentsOrder =>{
          console.log(commentsOrder);
          if(commentsOrder == null){
              comments.error = true;
          }
          else{
              comments.allComments = commentsOrder;
          }
          comments.loading = false;
      })
};

//VUE PARA EL FORMULARIO PARA AGREGAR UN COMENTARIO
let addComment = new Vue({
    el: "#addComment",
    data: {
      form: {
        puntuacion: null,
        comentario: "",
      },
    },
    methods: {

      //SE LEE EL PUNTAJE SELECCIONADO
      readScore(starNumber){
        pintar(starNumber);
        this.form.puntuacion = starNumber;
      },

      //SE GUARDAN LOS DATOS DE PUNTAJE Y COMENTARIO
      save() {
        this.form.comentario = this.$refs["comment"].value;
        let comment = this.form.comentario;
        let score = this.form.puntuacion;
        saveComment(score, comment);
      },
    },
  });

  //AGREGA EL COMENTARIO A LA API
  function saveComment(score, comment) {
    let newComment = {
      id_product: product,
      user: username,
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
            alert('Comentario agregado.');
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

//ELIMINA EL COMENTARIO 
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

//PINTA LA CANTIDAD DE ESTRELLAS CORRESPONDIENTES AL PUNTAJE SELECCIONADO
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
