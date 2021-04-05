window.Vue = require('vue')
import VueRouter from 'vue-router'
import Login from "./components/Login"
import Register from "./components/Register"
import Home from "./components/Home"
import Forgot from "./components/Forgot"
import Dashboard from "./components/Dashboard"

Vue.use(VueRouter)

window.appName = document.getElementById('appName').value
window.user = document.getElementById('user').value
window.baseURL = '/api/'
    
const router  = new VueRouter({
    mode : 'history',
    routes : [
        {
            path      : '/',
            component : Home
        },
        {
            path      : '/login',
            component : Login
        },
        {
            path      : '/register',
            component : Register
        },
        {
            path      : '/forgot-password',
            component : Forgot
        },
        {
            path      : '/dashboard',
            component : Dashboard
        }
    ]
})

export default router
