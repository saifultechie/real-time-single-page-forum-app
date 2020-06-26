import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../components/login/Login.vue'
import Signup from '../components/login/signup.vue'
import Forum from '../components/forum/Forum.vue'
import Logout from '../components/login/Logout.vue'
import Read from '../components/forum/Read.vue'
import Create from '../components/forum/create.vue'
import CreateCategory from '../components/category/CreateCategory.vue'
import Parallex from '../components/parallex.vue'

Vue.use(VueRouter)

const routes = [
    { path: '/' , component: Parallex},
    { path: '/login', component: Login },
    { path: '/logout', component: Logout },
    { path: '/signup', component: Signup },
    { path: '/forum', component: Forum ,name:'forum'},
    { path: '/question/:slug', component: Read ,name:'read'},
    { path: '/ask', component: Create},
    { path: '/category', component: CreateCategory},
    
    
  ]


const router = new VueRouter({
    routes,
    hashbang: false,
    mode: 'history'
  })

  export default router;