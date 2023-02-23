import { createWebHistory, createRouter } from 'vue-router'
import store from '@/store'

/* Guest Component */
const Login = () => import('@/components/auth/Login.vue')
const Register = () => import('@/components/auth/Register.vue')
/* Guest Component */

/* Layouts */
const HomeLayout = () => import('@/components/layouts/Default.vue')
/* Layouts */

/* Authenticated Component */
const Home = () => import('@/components/Home.vue')
const Profile = () => import('@/components/profile/Profile.vue')
const EditProfile = () => import('@/components/profile/EditProfile.vue')
const UpdateCover = () => import('@/components/profile/UpdateCover.vue')
const UpdateProfilePicture = () => import('@/components/profile/UpdateProfilePic.vue')

/* Authenticated Component */


const routes = [
    {
        name: "login",
        path: "/login",
        component: Login,
        meta: {
            middleware: "guest",
            title: `Login`
        }
    },
    {
        name: "register",
        path: "/register",
        component: Register,
        meta: {
            middleware: "guest",
            title: `Register`
        }
    },
    {
        path: "/",
        component: HomeLayout,
        meta: {
            middleware: "auth"
        },
        children: [
            {
                name: "home",
                path: '/',
                component: Home,
                meta: {
                    title: `Home`
                }
            },
            {
                name: "profile",
                path: '/Profile/:username',
                params: true,
                component: Profile,
                meta: {
                    title: `Profile`
                }
            },
            {
                name: "edit-profile",
                path: '/Profile/Edit/:username',
                params: true,
                component: EditProfile,
                meta: {
                    title: `Edit-Profile`
                }
            },
            {
                name: "update-cover",
                path: '/Profile/Update/Cover-Photo/:username',
                params: true,
                component: UpdateCover,
                meta: {
                    title: `Change-Cover-Photo`
                }
            },
            {
                name: "update-profile-pic",
                path: '/Profile/Update/Profile-Picture/:username',
                params: true,
                component: UpdateProfilePicture,
                meta: {
                    title: `Change-Profile-Picture`
                }
            },
        ]
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
    linkActiveClass: "active", // active class for non-exact links.
    linkExactActiveClass: "active", // active class for *exact* links.
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition
        } else{
            return new Promise((resolve, reject) => {
                setTimeout(() => {
                  resolve({ 
                    left: 0, 
                    top: 0,  
                    behavior: 'smooth', 
                })
              }, 500)
            })
        }
    },
})

router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    if (to.meta.middleware == "guest") {
        if (store.state.auth.authenticated) {
            next({ name: "home" })
        }
        next()
    } else {
        if (store.state.auth.authenticated) {
            next()
        } else {
            next({ name: "login" })
        }
    }
})

export default router