<template>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <span class="col p-3 text-center">Post</span>
                <span @click="newPost=!newPost" class="col p-3 text-center cursor-pointer">Create Post</span>
                <span @click="getPosts()" class="col p-3 text-center cursor-pointer">Refresh</span>
            </div>

            <div v-if="newPost" class="form-row">
                <label class="p-2 w-100 " for="title">
                    Title
                    <input id="title" v-model="title" class="form-control w-100"/>
                </label>

                <label class="p-2 w-100" for="body">
                    Body
                    <textarea id="body" v-model="body" class="form-control w-100" rows="5"></textarea>
                </label>

                <button class="offset-10 col-2 btn btn-primary" id="post" @click="createPost()">Post</button>
            </div>

        </div>

        <div class="card-body">
            <ul >
                <li v-for="post in posts">
                    {{ post }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import store from '../../store/store'

export default {

    name: "PostIndex",
    // props: ['posts'],
    data() {

        return {
            posts: [],
            title: '',
            body: '',
            newPost: true,

        }
    },
    created() {
        store.dispatch('getPosts');
    },

    methods: {
        createPost() {
            let data = {
                title: this.title,
                body: this.body,

            }


            axios.post('/api/createPost', data)
                .then(response => {
                    console.log(response);
                })
                .catch(err => {
                    console.log(data);

                }).finally(() => {

            })
        },
        // getPosts() {
        //     axios.get('/api/getPosts')
        //         .then(response => {
        //             console.log(response);
        //             this.posts = response.data;
        //         })
        //     .finally(()=>{
        //         this.$store.state.posts.push(this.posts)
        //     })
        // },
        resetForm() {
            this.title = '';
            this.body = ''

        }
    },mounted() {
        console.log(this.$store.state)

    }
}
</script>

<style scoped>
.cursor-pointer {
    cursor: pointer;

}

.cursor-pointer:hover {
    background: deepskyblue;
    color: white;
}
</style>
