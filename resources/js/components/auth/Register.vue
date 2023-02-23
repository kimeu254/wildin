<template>
    <div class="form-wrapper">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="logo">
                        <img src="../../dist/images/logo-colorful.png" alt="logo">
                    </div>
                    <div class="text-center my-5">
                        <p class="text-muted">You can create a free account now</p>
                    </div>
                    <form action="javascript:void(0)" @submit="register" class="row" method="post">

                        <div class="col-12" v-if="Object.keys(validationErrors).length > 0">
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    <li v-for="(value, key) in validationErrors" :key="key">{{ value[0] }}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fullname">Name</label>
                            <div class="form-icon-wrapper">
                                <input type="text" name="name" v-model="user.name" id="name" placeholder="Enter name" class="form-control">
                                <i class="form-icon-left mdi mdi-account"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fullname">Username</label>
                            <div class="form-icon-wrapper">
                                <input type="text" name="username" v-model="user.username" id="username" placeholder="Enter Username" class="form-control">
                                <i class="form-icon-left mdi mdi-account"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fullname">Phone</label>
                            <div class="form-icon-wrapper">
                                <input type="text" name="phone" v-model="user.phone" id="phone" placeholder="Enter Phone" class="form-control">
                                <i class="form-icon-left mdi mdi-phone"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fullname">Birthday</label>
                            <div class="form-icon-wrapper">
                                <input type="date" name="date_of_birth" v-model="user.date_of_birth" id="date_of_birth" class="form-control">
                                <i class="form-icon-left mdi mdi-cake"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="form-icon-wrapper">
                                <input type="text" name="email" v-model="user.email" id="email" placeholder="Enter Email" class="form-control">
                                <i class="form-icon-left mdi mdi-email"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="form-icon-wrapper">
                                <input type="password" name="password" v-model="user.password" id="password" placeholder="Enter Password" class="form-control">
                                <i class="form-icon-left mdi mdi-lock"></i>
                                <a href="#" class="form-icon-right password-show-hide" title="Hide or show password">
                                    <i class="mdi mdi-eye"></i>
                                </a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-repeat">Retype password</label>
                            <div class="form-icon-wrapper">
                                <input type="password_confirmation" name="password_confirmation" v-model="user.password_confirmation" id="password_confirmation" placeholder="Enter Password" class="form-control">
                                <i class="form-icon-left mdi mdi-lock"></i>
                                <a href="#" class="form-icon-right password-show-hide" title="Hide or show password">
                                    <i class="mdi mdi-eye"></i>
                                </a>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" :disabled="processing" class="btn btn-primary btn-block">
                                    {{ processing ? "Please wait" : "Sign Up" }}
                            </button>
                        </div>

                        <p class="text-center">Do you already have an account? <router-link :to="{name:'login'}">Sign in!</router-link>.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex'

export default {
    name:'register',
    data(){
        return {
            user:{
                name:"",
                username:"",
                phone:"",
                date_of_birth:"",
                email:"",
                password:"",
                password_confirmation:""
            },
            validationErrors:{},
            processing:false
        }
    },
    methods:{
        ...mapActions({
            signIn:'auth/login'
        }),
        async register(){
            this.processing = true
            await axios.get('/sanctum/csrf-cookie')
            await axios.post('/register',this.user).then(response=>{
                this.validationErrors = {}
                this.signIn()
            }).catch(({response})=>{
                if(response.status===422){
                    this.validationErrors = response.data.errors
                }else{
                    this.validationErrors = {}
                    alert(response.data.message)
                }
            }).finally(()=>{
                this.processing = false
            })
        }
    }
}
</script>

<style lang="css" scoped src="../../../css/style.css"></style>