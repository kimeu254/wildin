<template>
    <div>
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
        </div> -->
        <!-- Spinner End -->

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light fixed-top p-0 shadow-sm">
            <div class="container-fluid">
                <router-link :to="{name:'home'}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
                    <h1 class="m-0">Wildin'</h1>
                </router-link>
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <router-link :to="{name:'home'}" class="nav-item nav-link">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </router-link>
                    <a href="#" class="nav-item nav-link">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="nav-item nav-link">
                        <i class="fa fa-commenting" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="nav-item nav-link">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                    </a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu bg-white rounded-0 rounded-bottom m-0">
                            <div class="container">
                                <div class="row profile py-3 g-0">
                                    <router-link :to="{name:'profile', params:{username:profile.username}}" class="col-3 profile-img">
                                        <img v-if="profile.profile_img == null" :src="'/storage/logos/blank-profile-picture-g638b8c242_1280.png'" alt="" class="img-fluid">
                                        <img v-else :src="'/storage/profiles/'+user.profile_img" alt="" class="img-fluid">
                                    </router-link>
                                    <div class="col-9">
                                        <div class="mx-3">
                                            <div class="username mb-3">
                                                <h6>{{profile.name}}</h6>
                                                <router-link :to="{name:'profile', params:{username:profile.username}}">
                                                    <span>@</span><span>{{profile.username}}</span>
                                                </router-link>
                                            </div>
                                            <div class="bio">
                                                <p>{{profile.bio}}</p>
                                            </div>
                                        </div>
                                        <div class="row profile-info g-0 text-center">
                                            <div class="col-4">
                                                <a href="#">
                                                    <p>Followers</p>
                                                    <span>1000</span>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#">
                                                    <p>Following</p>
                                                    <span>1000</span>
                                                </a>                                        
                                            </div>
                                            <div class="col-4">
                                                <a href="#">
                                                    <p>Posts</p>
                                                    <span>1000</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-3 drop-links">
                                    <router-link :to="{name:'profile', params:{username:profile.username}}" class="dropdown-item">
                                        <i class="fa-solid fa-user" aria-hidden="true"></i>
                                        <span>Profile</span>
                                    </router-link>
                                    <a href="#" class="dropdown-item">
                                        <i class="fa-solid fa-gears" aria-hidden="true"></i>
                                        <span>Settings & Privacy</span>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="fa-solid fa-circle-question" aria-hidden="true"></i>
                                        <span>Help & Support</span>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="fa-solid fa-display" aria-hidden="true"></i>
                                        <span>Display & Accessibility</span>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="fa-solid fa-comments" aria-hidden="true"></i>
                                        <span>Feedback</span>
                                    </a>
                                    <a href="javascript:void(0)" @click="logout" class="dropdown-item">
                                        <i class="fa-solid fa-sign-out" aria-hidden="true"></i>
                                        <span>Log Out</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Navbar-md Start -->
        <div class="nav shadow-sm fixed-top">
            <div class="container top-nav p-3">
                <router-link :to="{name:'home'}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
                    <h1 class="m-0">Wildin'</h1>
                </router-link>
                <div data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <img v-if="profile.profile_img == null" :src="'/storage/logos/blank-profile-picture-g638b8c242_1280.png'" alt="" class="img-fluid">
                    <img v-else :src="'/storage/profiles/'+user.profile_img" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <!-- Navbar-md End -->

        <!-- Offcanvas Start -->
        <div class="offcanvas offcanvas-end offcanvas-size-sm" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel"><i class="fa-solid fa-circle-info"></i><span class="px-3">Account Info</span></h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="container">
                    <div class="row d-flex align-items-center profile py-3 g-0">
                        <router-link :to="{name:'profile', params:{username:profile.username}}" class="col-4 profile-img">
                            <img v-if="profile.profile_img == null" :src="'/storage/logos/blank-profile-picture-g638b8c242_1280.png'" alt="" class="img-fluid">
                            <img v-else :src="'/storage/profiles/'+user.profile_img" alt="" class="img-fluid">
                        </router-link>
                        <div class="col-8">
                            <div class="mx-3">
                                <div class="username mb-3">
                                    <h6>{{profile.name}}</h6>
                                    <router-link :to="{name:'profile', params:{username:profile.username}}">
                                        <span>@</span><span>{{user.username}}</span>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bio py-2">
                        <p>{{profile.bio}}</p>
                    </div>
                    <div class="row profile-info g-0 text-center pb-4">
                        <div class="col-4">
                            <a href="#">
                                <p>Followers</p>
                                <span>1000</span>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#">
                                <p>Following</p>
                                <span>1000</span>
                            </a>                                        
                        </div>
                        <div class="col-4">
                            <a href="#">
                                <p>Posts</p>
                                <span>1000</span>
                            </a>
                        </div>
                    </div>
                    <div class="py-3 drop-links">
                        <router-link :to="{name:'profile', params:{username:profile.username}}" class="dropdown-item">
                            <i class="fa-solid fa-user" aria-hidden="true"></i>
                            <span>Profile</span>
                        </router-link>
                        <a href="#" class="dropdown-item">
                            <i class="fa-solid fa-gears" aria-hidden="true"></i>
                            <span>Settings & Privacy</span>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="fa-solid fa-circle-question" aria-hidden="true"></i>
                            <span>Help & Support</span>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="fa-solid fa-display" aria-hidden="true"></i>
                            <span>Display & Accessibility</span>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="fa-solid fa-comments" aria-hidden="true"></i>
                            <span>Feedback</span>
                        </a>
                        <a href="javascript:void(0)" @click="logout" class="dropdown-item">
                            <i class="fa-solid fa-sign-out" aria-hidden="true"></i>
                            <span>Log Out</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Offcanvas End -->

        <main>
            <router-view></router-view>
        </main>

        <!-- Bottom-Nav Start -->
        <div class="footer shadow-lg">
            <div class="container">
                <div class="foot-nav p-4">
                    <router-link :to="{name:'home'}" class="nav-item nav-link">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </router-link>
                    <a href="#" class="nav-item nav-link">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="nav-item nav-link">
                        <i class="fa fa-commenting" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="nav-item nav-link">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- Bottom-Nav End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-wildin btn-lg-square rounded-circle post-story"><i class="fa fa-plus"></i></a>

    </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex'
export default {
    name:"default-layout",
    data(){
        return {
            user:this.$store.state.auth.user
        }
    },
    methods:{
        ...mapActions({
            signOut:"auth/logout"
        }),
        async logout(){
            await axios.post('/logout').then(({data})=>{
                this.signOut()
                this.$router.push({name:"login"})
            })
        }
    },
    mounted() {
        this.$store.dispatch("getProfile")
    },
    computed: {
        ...mapGetters(["profile"])
    }

}
</script>
<style lang="css" scoped src="../../../css/app.css"></style>