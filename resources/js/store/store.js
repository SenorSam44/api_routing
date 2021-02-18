import Vue from 'vue'
import Vuex from 'vuex'
import axios from "axios";

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        cc: 1,
        post:[]
    },
    getters:{

    },
    actions:{

        getPosts(context){
            context.commit('setPosts')
        }
    },
    mutations: {
        increment (state) {
            state.cc++
        },

        setPosts(state){
            // state.posts=([
            //     'state title',
            //     'state body'
            // ])
            axios.get('/api/getPosts')
                .then(response => {
                    console.log(response);
                    state.posts = response.data;
                })
                // .finally(()=>{
                //     this.$store.state.posts.push(this.posts)
                // })
        }
    }
})

export default store;
