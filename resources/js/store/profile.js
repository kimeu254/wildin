import axios from 'axios'

export default {
    state:{
        profile:{}
    },
    getters:{
        profile(state){
            return state.profile
        }
    },
    mutations:{
        SET_PROFILE (state, profile) {
            state.profile = profile
        },
        UPDATE_PROFILE (state, profile) {
            const index = state.profile.find(s => s.id === profile.id)
        },
        UPDATE_COVER (state, profile) {
            const index = state.profile.find(s => s.id === profile.id)
        },
    },
    actions:{
        async getProfile({commit}) {
            const { data } = await axios.get('/api/profile')
            commit('SET_PROFILE', data)
        },
        async updateProfile({commit},id, formData){
            try {
                //const response = await axios.post("/api/profile/"+id, formData)
                let result = await axios.post('/api/profile/'+id, formData)
                console.log(result.response.data)
                commit('UPDATE_PROFILE', user)
            } catch (error) {
                console.error(error.response.data)
            }
        },
        async updateCover({commit},id, formData){
            try {
                //const response = await axios.post("/api/profile/"+id, formData)
                let result = await axios.post('/api/profile/cover/'+id, formData)
                console.log(result.response.data)
                commit('UPDATE_COVER', user)
            } catch (error) {
                console.error(error.response.data)
            }
        }
    }
}