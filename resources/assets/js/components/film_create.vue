<template>
    <div class="card">
        <div class="card-body">
        	<!-- <form class="form-signin"> -->        	

            <div class="form-label-group">
            	<label for="inputName">Name</label>
	        	<input type="text" id="inputName" v-model="film.name" class="form-control" placeholder="Name" required autofocus>	        	
	      	</div>

	      	<br/>
	      	<div class="form-label-group">
	      		<label for="inputDes">Description</label>
	        	<textarea class="form-control" v-model="film.description" id="inputDes" rows="3"></textarea>
	      	</div>
	      	<br/>

	      	<div class="form-label-group">
	      		<label for="inputDes">Release Date</label>
	        	<datepicker placeholder="Select Date"  v-model="film.release_date" format="yyyy-MM-dd"></datepicker>
	      	</div>
	      	<br/>

	      	<div class="form-label-group">
	      		<label for="inputRating">Rating</label>
	        	<select class="form-control" v-model="film.rating" id="exampleFormControlSelect1">
			      	<option>1</option>
			      	<option>2</option>
			      	<option>3</option>
			      	<option>4</option>
			      	<option>5</option>
			    </select>
	      	</div>
	      	<br/>

	      	<div class="form-label-group">
	      		<label for="inputTicketPrice">Ticket Price</label>
	        	<input type="text" id="inputTicketPrice" v-model="film.ticket_price" class="form-control" placeholder="Ticket Price (USD)" required>
	      	</div>
	      	<br/>

	      	<div class="form-label-group">
	      		<label for="inputCountry">Country</label>
	        	<input type="text" id="inputCountry" class="form-control" v-model="film.country" placeholder="Country" required>
	      	</div>
	      	<br/>

	      	<div class="form-label-group">
	      		<label for="inputGenre">Genre</label>
	        	<input type="text" id="inputGenre" class="form-control" v-model="film.genre" placeholder="Genre separate by commas" required>
	      	</div>
	      	<br/>

	      	<div class="custom-file">
	      		<input type="file" class="custom-file-input" accept="image/png, image/jpeg, image/bmp" @change="changeFile" id="customFile">
  				<label class="custom-file-label" for="customFile">{{ currentFile }}</label>
	      	</div>
	      	<br/>
	      	<br/>

	      	<div v-for="(message, index) in error_messages" class="alert alert-danger" role="alert">
			  	{{message}}
			</div>
			<br/>

	      	<button type="submit" class="btn btn-primary" v-on:click="submitFilm()" >Submit</button>
	      	
	      	
	      <!-- </form> -->
        </div>
    </div>
</template>

<style scoped>
    .checked {
        color: orange;
    }
</style>

<script>

	import Datepicker from 'vuejs-datepicker';

    export default {

    	components: {
	    	Datepicker
	  	},
        data: function () {
            return {
            	film: {
            		name : '',
            		description: '',
            		release_date: '',
            		rating: '',
            		ticket_price: '',
            		country: '',
            		genre: '',
            		photo: '',
            	},
            	currentFile : 'Choose photo',
            	error_messages:[],                  
            }
        },        
        mounted() { 

        },        
        methods: {

        	validateFilm(film) {

            	var app = this;

            	this.error_messages = [];

				if ( !film.name ) {
                    this.error_messages.push("Please enter name");
                }
                
                if ( !film.description ) {
                    this.error_messages.push("Please enter description");
                }

                if ( !film.release_date ) {
                    this.error_messages.push("Please select a release date");
                }

                if ( !film.rating ) {
                    this.error_messages.push("Please select at least 1 rating");
                }

                if ( !film.ticket_price ) {
                    this.error_messages.push("Please enter ticket price");
                }

                if ( isNaN(film.ticket_price) ) {
                    this.error_messages.push("Ticket price should be number");
                }                

                if ( !film.country ) {
                    this.error_messages.push("Please enter country");
                }

                if ( !film.genre ) {
                    this.error_messages.push("Please enter genre");
                }

                if ( !film.photo ) {
                    this.error_messages.push("Please select photo");
                }

                return this.error_messages.length == 0;
            },
            submitFilm: function() {
            	
            	event.preventDefault();   
            	var app = this;            	               	 

            	console.log(app.film);

                if (this.validateFilm(app.film)) {
                	axios.post('/api/films', app.film)
	                .then(function (resp) {
	                	console.log(resp);
	                	if (resp.status == 200) {
	                		alert("Film name :" + resp.data.name + " is created");
	                		// window.location.href = '/';
	                	}
	                })
	                .catch(function (resp) {
	                    alert("Could not create the film");
	                });
                }
               	
            },
            changeFile(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);                
            },     
            createImage(file) {
                let reader = new FileReader();
                let app = this;
                reader.onload = (e) => {
                    app.film.photo = e.target.result;
                };
                app.currentFile = file.name;
                reader.readAsDataURL(file);
            },      
        }
    }
</script>
