{literal}
<section id="comments">

    <div v-if="loading">
        <p>Loading comments...</p>
    </div>

    <div v-if="!loading" >
        <div v-if="!error">
            <div v-for="comment in allComments" class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{comment.user}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Puntuacion: {{comment.score}}</h6>
                    <p class="card-text">{{comment.text}}</p>
                    <button v-if="permit" v-on:click="eliminar(comment.id_comment)" class="btn btn-primary">Eliminar</button>    
                </div>
            </div>
        </div>
    </div>
    <div v-if="error">
        <h3>no hay comentarios para este producto</h3>
    </div>
</section>
{/literal}