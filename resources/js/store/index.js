import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import auth from '@/store/auth'
import profile from '@/store/profile'

const store = createStore({
    plugins:[
        createPersistedState()
    ],
    modules:{
        auth,
        profile,
    }
})

export default store