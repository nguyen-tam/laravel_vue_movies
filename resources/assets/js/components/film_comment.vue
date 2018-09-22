<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card" v-for="comment in this.comments">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">
                            {{comment.name}}
                        </h6>
                        <p class="card-text">{{ comment.content }}</p>
                    </div>
                </div>
            </div>            
        </div> 

        <div class="row" v-if="name != '' ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-label-group">
                            <label for="inputDes">Comment</label>
                            <textarea class="form-control" v-model="comment" id="inputDes" rows="3"></textarea>
                        </div>
                        <br/>
                        <button type="submit" v-if="comment != '' " class="btn btn-primary" v-on:click="submitComment()" >Submit</button>

                    </div>
                </div>
            </div>            
        </div> 

    </div>
</template>

<style scoped>
    .card {
        margin-top: 10px;
    }
</style>

<script>

    export default {

        data: function () {
            return {
                comments: [],
                comment: ''                 
            }
        },        
        mounted() {                
            this.fetchComments();            
        },        
        methods: {
            fetchComments() {
                var app = this;                    
                axios.get('/api/comments/' + this.slug)
                .then(function (resp) {
                    app.comments = resp.data;
                })
                .catch(function (resp) {
                    alert("Could not load comments");
                });
            }, 
            submitComment: function() {
                
                event.preventDefault();   
                var app = this;
                axios.post('/api/comments', {slug:app.slug, content: app.comment,name:app.name})
                .then(function (resp) {
                    if (resp.status == 200) {
                        app.fetchComments();
                    }
                })
                .catch(function (resp) {
                    alert("Could not submit comment");
                });                
            },               
        },
        props: ['slug','name']
    }
</script>
