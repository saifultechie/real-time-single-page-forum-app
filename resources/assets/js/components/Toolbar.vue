<template>
    <v-toolbar color="indigo" dark>
        <v-toolbar-title>
            <router-link to="/" class="white--text">ForumTech</router-link>
        </v-toolbar-title>
        <v-spacer></v-spacer>
        <app-notification v-if="loggedIn"></app-notification>
        <div class="hidden-sm-and-down">
            <router-link
            v-for="item in items"
            :key="item.title"
            :to="item.to"
            v-if="item.show">
                <v-btn flat>{{item.title}}</v-btn>
            </router-link>
        </div>
    </v-toolbar>
</template>

<script>
import AppNotification from './AppNotification.vue'
export default {
    components:{AppNotification},
    data(){
        return {
            loggedIn: User.loggedIn(),
            items: [
                {title: 'Forum', to:'/forum' ,show:true },
                {title: 'Login', to:'/login' ,show: !User.loggedIn() },            
                {title: 'Ask For Question', to:'/ask' ,show: User.loggedIn() },
                {title: 'Category', to:'/category' ,show: User.admin() },
                 {title: 'Logout', to:'/logout' ,show: User.loggedIn() },
            ]
        }
    },

    created(){
        EventBus.$on('logout',()=>{
            User.logout();
        })
    }

}
</script>

<style>

</style>
