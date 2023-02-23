import './bootstrap';
import '../sass/app.scss'
import './auth-password'
import Router from '@/router'
import store from '@/store'
import Swal from 'sweetalert2';
import VueSweetalert2 from 'vue-sweetalert2';

import { createApp } from 'vue/dist/vue.esm-bundler';

const app = createApp({})
app.use(Router)
app.use(store)
app.use(VueSweetalert2)
app.mount('#app')