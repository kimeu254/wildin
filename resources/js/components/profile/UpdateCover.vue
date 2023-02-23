<template>
    <div class="h-100 h-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card rounded-3">
                        <div class="card-body m-0 p-0">
                            <div class="form-pic mb-3 text-center">
                                <div class="form-cover">
                                    <img id="preview-one" v-if="url" :src="url" alt="" class="img-fluid w-100 rounded-3">
                                    <div v-else>
                                        <img id="preview-one" v-if="user.cover_img == null" :src="'/storage/logos/1595904.jpg'" alt="" class="img-fluid w-100 rounded-3">
                                        <img id="preview-one" v-else :src="'/storage/covers/'+user.cover_img" alt="" class="img-fluid w-100 rounded-3">
                                    </div>
                                </div>
                                <form class="container" @submit.prevent="onSubmit">
                                    <div class="form-group">
                                        <label for="file" class="fs-3 px-3 py-2">
                                            <i class="fa-solid fa-camera-retro"></i>
                                        </label>
                                        <input id="file" type="file" accept="image/*" class="form-control form-control-lg d-none" v-on:change="onChange">
                                    </div>
                                    <div class="my-5">
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
    </div>
</template>

<script>
export default {
    name:"updateCover",
    data() {
        return{
            user:this.$store.state.profile.profile,
            file:"",
            url:"",
        }
    },
    computed: {},
    methods: {
        onChange(e) {
            console.log(e.target.files[0]);
            this.file = e.target.files[0];
            this.url = URL.createObjectURL(this.file);
        },
        async onSubmit () {
            try {
                let id = this.user.id
                const formData = new FormData()
                formData.append('file', this.file)
                formData.append("_method", 'put')

                const response = await axios.post("/api/profile/cover/"+id, formData)
                .then(res => {
                    console.log(res.data)
                })
                .then(() => {
                    this.$swal.fire({
                        icon: 'success',
                        title: 'Cover Photo updated succesfully',
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