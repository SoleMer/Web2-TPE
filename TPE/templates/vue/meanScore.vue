{literal}

<section class="rating" id="finalScore">
    </br>

    <div v-if="loading">
        <p>Loading users rating...</p>
    </div>

    <div v-if="!loading">

        <div v-if="!users_rating" >
            <h3>no hay calificaciones para este libro</h3>
        </div>

        <div v-if="users_rating" >
            <div>
                <h1 class="rating-info">{{users_rating}}</h1>
            </div>
        </div>
        
    </div>
</section>
{/literal}