<template>
    <div class="form-wrapper">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="logo">
                        <img src="../../dist/images/logo-colorful.png" alt="logo">
                    </div>
                    <div class="my-5 text-center">
                        <p class="text-muted">Please log in to continue</p>
                    </div>
                    <form action="javascript:void(0)" class="row" method="post">
                        <div class="col-12" v-if="Object.keys(validationErrors).length > 0">
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    <li v-for="(value, key) in validationErrors" :key="key">{{ value[0] }}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email, Phone or Username</label>
                            <div class="form-icon-wrapper">
                                <input type="text" v-model="auth.email" name="email" id="email" class="form-control">
                                <i class="form-icon-left mdi mdi-email"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="form-icon-wrapper">
                                <input type="password" v-model="auth.password" name="password" id="password" class="form-control">
                                <i class="form-icon-left mdi mdi-lock"></i>
                                <a href="#" class="form-icon-right password-show-hide" title="Hide or show password">
                                    <i class="mdi mdi-eye"></i>
                                </a>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="d-md-flex justify-content-between">
                                <div class="custom-control custom-checkbox mb-2 mb-md-0">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember">
                                    <label class="custom-control-label px-2" for="customCheck1">Remember me</label>
                                </div>
                                <!-- @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" :disabled="processing" @click="login" class="btn btn-primary btn-block">
                                    {{ processing ? "Please wait" : "Login" }}
                            </button>
                        </div>
                        <p class="text-center">
                            Don't have an account?
                            <router-link :to="{name:'register'}">Create a free account</router-link>.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex' 

export default {
    name:"login",
    data(){
        return {
            auth:{
                email:"",
                password:""
            },
            validationErrors:{},
            processing:false
        }
    },
    methods:{
        ...mapActions({
            signIn:'auth/login'
        }),
        async login(){
            this.processing = true
            await axios.get('/sanctum/csrf-cookie')
            await axios.post('/login',this.auth).then(({data})=>{
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
        },
    }
}
</script>

<style lang="css" scoped src="../../../css/style.css"></style>