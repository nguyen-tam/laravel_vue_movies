<template>
    <div>   
        <div class="container">
            <div class="row">
                <div class="card">
                    <img class="card-img-top" v-bind:src="this.film.photo" />
                    <div class="card-body">
                        <h5 class="card-title"><a :href="'films/' + this.film.slug">{{this.film.name}}</a></h5>
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

        <br/>
        <nav aria-label="..." >
            <ul class="pagination pagination-sm">
                <li class="page-item" v-for="(film, index) in films" v-bind:class="getClassForFilmPagination(index)">
                    <a class="page-link" href="#" v-on:click="setCurrentFilm(index)" >{{ index + 1 }}</a>
                </li>
          </ul>
        </nav>

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
                film: {rating:0, genre: ''},
                currentFilmIndex : 0,
                films: []                     
            }
        },        
        mounted() {                
            this.fetchFilms();            
        },        
        methods: {
            fetchFilms() {
                var app = this;                    
                axios.get('/api/films')
                .then(function (resp) {

                    app.films = resp.data;
                    if (app.films.length > 0) {
                        app.film = app.films[0];
                    }
                })
                .catch(function (resp) {
                    alert("Could not load films");
                });
            },
            getClassForFilmPagination(index){
                var ret = this.currentFilmIndex == index ? 'disabled' : '';
                return ret;
                
            },
            setCurrentFilm : function(index) {
                this.film = this.films[index];
                this.currentFilmIndex = index;
            }    
        }
    }
</script>
