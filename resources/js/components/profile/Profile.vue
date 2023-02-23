<template>
    <div class="container">
        <div class="profile-page" id="profile">
            <div class="top-profile">
                <div class="cover" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                    <img v-if="profile.cover_img == null" :src="'/storage/logos/1595904.jpg'" alt="" class="img-fluid w-100">
                    <img v-else :src="'/storage/covers/'+profile.cover_img" alt="" class="img-fluid w-100">
                </div>
                <div class="profile-pic" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img v-if="profile.profile_img == null" :src="'/storage/logos/blank-profile-picture-g638b8c242_1280.png'" alt="" class="img-fluid">
                    <img v-else :src="'/storage/profiles/'+profile.profile_img" alt="" class="img-fluid">
                </div>
                <div class="edit-cover dropup">
                    <button class="btn btn-sm btn-light" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-camera px-1"></i>
                        <span class="px-1">Edit Cover</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                <i class="fa-solid fa-eye"></i>
                                <span class="px-2">View Photo</span>
                            </a>
                        </li>
                        <li>
                            <router-link :to="{name:'update-cover', params:{username:profile.username}}" class="dropdown-item">
                                <i class="fa-solid fa-pencil"></i>
                                <span class="px-2">Update Photo</span>                   
                            </router-link>
                        </li>
                        <li>
                            <button class="dropdown-item" @click="removeCover(profile.id)">
                                <i class="fa-solid fa-trash-can"></i>
                                <span class="px-2">Remove Photo</span>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="edit-profile-pic dropend">
                    <div class="fs-6 px-2 py-1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-camera"></i>
                    </div>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa-solid fa-eye"></i>
                                <span class="px-2">View Photo</span>
                            </a>
                        </li>
                        <li>
                            <router-link :to="{name:'update-profile-pic', params:{username:profile.username}}" class="dropdown-item">
                                <i class="fa-solid fa-pencil"></i>
                                <span class="px-2">Update Photo</span>                   
                            </router-link>
                        </li>
                        <li>
                            <button class="dropdown-item" @click="removeProfilePic(profile.id)">
                                <i class="fa-solid fa-trash-can"></i>
                                <span class="px-2">Remove Photo</span>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="edit-profile">
                    <button class="btn btn-sm btn-warning"><i class="fa-solid fa-circle-plus px-1"></i><span class="px-1">Add Story</span></button>
                    <router-link :to="{name:'edit-profile', params:{username:profile.username}}">
                        <button class="btn btn-sm btn-secondary"><i class="fa-solid fa-user-pen px-1"></i><span class="px-1">Edit Profile</span></button>
                    </router-link>
                </div>
            </div>
            <div class="profile-data">
                <div class="container">
                    <div class="user-name pb-4">
                        <h2>{{profile.name}}</h2>
                        <span>@</span><span>{{profile.username}}</span>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <p>{{profile.bio}}</p>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                    <div class="row user-data mb-3">
                        <div class="col-4">
                            <span class="count">1000</span><span class="mx-2">Followers</span>
                        </div>
                        <div class="col-4">
                            <span class="count">500</span><span class="mx-2">Following</span>
                        </div>
                        <div class="col-4">
                            <span class="count">75</span><span class="mx-2">Posts</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Profile pic modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="m-4 p-2">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-profile-pic">
                <img v-if="profile.profile_img == null" :src="'/storage/logos/blank-profile-picture-g638b8c242_1280.png'" alt="" class="img-fluid">
                <img v-else :src="'/storage/profiles/'+profile.profile_img" alt="" class="img-fluid">
            </div>
        </div>
    </div>

    <!-- Cover pic modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="m-4 p-2">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-cover-pic">
                <img v-if="profile.cover_img == null" :src="'/storage/logos/1595904.jpg'" alt="" class="img-fluid w-100">
                <img v-else :src="'/storage/covers/'+profile.cover_img" alt="" class="img-fluid w-100">
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    name:"profile",
    data(){
        return {
            user:this.$store.state.auth.user
        }
    },
    computed: {
        ...mapGetters(["profile"])
    },
    methods: {
        removeCover(id) {
            this.$swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(async (response)=>{
                if (response.isConfirmed){
                    let id = this.profile.id
                    const formData = new FormData()
                    formData.append("_method", 'put')
                    const response = await axios.post("/api/profile/cover-remove/"+id, formData)
                    this.$swal.fire(
                        {
                            title: 'Deleted!',
                            text: 'Cover Photo has been removed.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        }
                    )
                    setTimeout(function () {
                        window.location.reload()
                    }, 2000)
                } else if (
                    response.dismiss === Swal.DismissReason.cancel
                ) {
                    this.$swal.fire({
                        title: 'Canceled',
                        text: 'Your imaginary file is safe :)',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        },
        removeProfilePic(id) {
            this.$swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(async (response)=>{
                if (response.isConfirmed){
                    let id = this.profile.id
                    const formData = new FormData()
                    formData.append("_method", 'put')
                    const response = await axios.post("/api/profile/profile-pic-remove/"+id, formData)
                    this.$swal.fire(
                        {
                            title: 'Deleted!',
                            text: 'Profile Pic has been removed.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        }
                    )
                    setTimeout(function () {
                        window.location.reload()
                    }, 2000)
                } else if (
                    response.dismiss === Swal.DismissReason.cancel
                ) {
                    this.$swal.fire({
                        title: 'Canceled',
                        text: 'Your imaginary file is safe :)',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        },
    },
}
</script>
<style lang="css" scoped src="../../../css/app.css"></style>