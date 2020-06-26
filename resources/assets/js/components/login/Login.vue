<template>
    <v-container>
        <v-form @submit.prevent="login">
            <v-text-field
            label="E-mail"
            v-model="form.email"
            type="email"
            required
            ></v-text-field>
            <v-text-field
            label="Password"
            v-model="form.password"
            type="password"
            required
            ></v-text-field>
            <v-btn
            type="submit"
            color="green" 
            >Login</v-btn>

            <router-link to="/signup">
                <v-btn
                color="blue"
                >Signup</v-btn>
            </router-link>
        </v-form>
    </v-container>  
</template>

<script>
export default {
    data(){
        return {
            form: {
                email:null,
                password:null
            }
        }
    },

    props:['email','password'],
    created(){
        if(User.loggedIn()){
            this.$router.push({name:'forum'})
        }

    },
    methods: {
        login(){
            User.login(this.form)
            //this.$router.push({name:'forum'})
        }
    }

}
</script>

<style>

</style>
