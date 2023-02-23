<template>
    <div class="h-100 h-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
                <div class="card rounded-3">
                    <div class="card-body m-0 p-0">
                        <div class="form-pic">
                            <div class="form-cover">
                                <img v-if="user.cover_img == null" id="preview-one" :src="'/storage/logos/1595904.jpg'" alt="" class="img-fluid w-100 rounded-3">
                                <img v-else :src="'/storage/covers/'+user.cover_img" id="preview-one" alt="" class="img-fluid w-100 rounded-3">
                            </div>
                            <div class="form-profile-pic">
                                <img v-if="user.profile_img == null" :src="'/storage/logos/blank-profile-picture-g638b8c242_1280.png'" alt="" class="img-fluid">
                                <img v-else :src="'/storage/profiles/'+user.profile_img" alt="" class="img-fluid">
                            </div>
                        </div>
                        <form class="container" @submit.prevent="onSubmit">
                            <div class="form-group mb-5">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control form-control-lg" v-model="user.name">
                            </div>
                            <div class="form-group mb-5">
                                <label for="bio">Bio</label>
                                <textarea name="bio" class="form-control form-control-lg" style="height: 100px" v-model="user.bio"></textarea>
                            </div>
                            <div class="form-group mb-5">
                                <label for="date_of_birth">Birthday</label>
                                <input name="date_of_birth" type="date" class="form-control form-control-lg" v-model="user.date_of_birth">
                            </div>
                            <div class="form-group mb-5">
                                <label for="address">Location</label>
                                <input name="address" type="text" class="form-control form-control-lg" v-model="user.address">
                            </div>
                            <div class="mb-5">
                                <router-link :to="{name:'profile', params:{username:user.username}}">
                                    <button type="button" class="btn btn-light btn-lg fw-bold">Cancel</button>
                                </router-link>
                                <button type="submit" class="btn btn-secondary btn-lg fw-bold mx-3">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"editProfile",
    data() {
        return{
            user:this.$store.state.profile.profile
        }
    },
    methods: {
        async onSubmit () {
            try {
                let id = this.user.id
                const formData = new FormData()
                formData.append('name', this.user.name)
                formData.append('bio', this.user.bio)
                formData.append('date_of_birth', this.user.date_of_birth)
                formData.append('address', this.user.address)
                formData.append("_method", 'put')

                const response = await axios.post("/api/profile/"+id, formData)
                .then(res => {
                    console.log(res.data)
                })
                .then(() => {
                    this.$swal.fire({
                        icon: 'success',
                        title: 'Profile updated succesfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.$router.push({name:'profile', params:{username:this.user.username}})
                    setTimeout(function () {
                        window.location.reload()
                    }, 2000)
                })
            } catch (error) {
                console.log()
            }
        }
    },
}
</script>
<style lang="css" scoped src="../../../css/app.css"></style>