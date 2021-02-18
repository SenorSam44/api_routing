<template>
    <div class="card border-primary">
        <div class="card-header text-center font-italic">
            Register
        </div>

        <div class="card-body">
            <form @submit.prevent="registerUser()">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name </label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" v-model="name" required autofocus
                               placeholder="Your name">

                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Email </label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" v-model="email" required autofocus
                               placeholder="Enter your email">

                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password </label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" v-model="password" required autofocus
                               placeholder="Choose a password">

                    </div>
                </div>

                <div class="form-group row">
                    <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirm
                        Password </label>

                    <div class="col-md-6">
                        <input id="password_confirmation" type="password" class="form-control" v-model="password_confirmation"
                               required autofocus placeholder="Confirm password">
                    </div>
                </div>

                <button class="btn btn-primary mt-4 offset-9 pl-4 pr-4">Sign In</button>
            </form>

        </div>

    </div>
</template>

<script>
import axios from 'axios';

export default {

    name: "RegisterIndex",
    data() {
        return {
            name: '',
            email: '',
            password: '',
            password_confirmation: '',

        }
    },
    methods: {
        registerUser() {
            let url = '/api/register';
            let register_data = {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation,

            }
            console.log(register_data);

            axios.post(url, register_data)
                .then((response) => {
                    if (response!=false) {
                        window.location.href='/post'
                    }

                    console.log(response)

            }).catch(err=>{
                console.log(err);
            })
            .finally(()=>{

            })

        },
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
