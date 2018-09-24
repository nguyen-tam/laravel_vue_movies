<template>
    <div class="container">
        <div class="row">
            <div class="card" v-if="this.film !== null ">
                <img class="card-img-top mx-auto" v-bind:src="'/images/' + this.film.photo" style="width: 508px;height: auto" />
                <div class="card-body">
                    <h5 class="card-title">{{this.film.name}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                        <span class="fa fa-star checked" v-for="i in this.film.rating" ></span>
                        <span class="fa fa-star" v-for="i in 5 - this.film.rating" ></span>
                    </h6>
                    <p class="card-text">{{this.film.description}}</p>
                    <p class="card-text">Country : {{this.film.country}}</p>
                    <p class="card-text">Release Date : {{this.film.release_date}}</p>
                    <p class="card-text">Ticket Price : {{this.film.ticket_price}} $</p>
                    <p class="card-text">Genre : 
                        <span v-for="genre in this.film.genre.split(',')">{{genre}} &nbsp;</span>                            
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .checked {
        color: orange;
    }
</style>

<script>

    export default {

        data: function () {
            return {
                film: null                  
            }
        },        
        mounted() {                
            this.fetchFilm();            
        },        
        methods: {
            fetchFilm() {
                var app = this;                    
                axios.get('/api/films/' + this.slug)
                .then(function (resp) {
                    app.film = resp.data;
                })
                .catch(function (resp) {
                    alert("Could not load film");
                });
            },                
        },
        props: ['slug']
    }
</script>
