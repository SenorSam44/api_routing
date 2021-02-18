<template>
    <div class="card">
        <div class="card-header text-center font-italic">Login</div>

        <div class="card-body">
            <form @submit.prevent="loginUser()">

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" v-model="email" required
                               autocomplete="email" autofocus>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" v-model="password" required
                               autocomplete="current-password">

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="remember" id="remember">

                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-2 offset-9 pl-4 pr-4">Login</button>

            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import {saveToken} from '../../services/jwt.service';

export default {

    name: "LoginIndex",
    data() {
        return {
            email: '',
            password: '',
            remember: false,

        }
    },
    methods: {
        loginUser() {
            let url = '/api/login';
            let login_info = {
                email: this.email,
                password: this.password,
                // remember: this.remember,
            }
            axios.post(url, login_info)
                .then((response) => {
                    // alert('login success')
                    // window.location.href='/post'
                    saveToken(response.data.access_token);

                    localStorage.setItem('auth', JSON.stringify(response.data));

                }).catch(err => {
                console.log(err);

            }).finally(() => {

            })


        },
        resetForm() {
            this.email = '';
            this.password = ''
            this.remember = ''
        }
    },
    mounted() {
        console.log(this.$store.state);
    }
}
</script>

<style scoped>

.card-header {
    font-family: 'Reggae One', cursive;
    font-size: x-large;
    background: #1d68a7;
    color: #ffffff;
}

.card-body {
    background: #1357f51f;
}
</style>
