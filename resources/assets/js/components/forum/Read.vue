<template>
    <div v-if="question">
        <edit-question v-if="editing"
        :data = question
        ></edit-question>
        
        <show-question
        v-else
        :data = question
        ></show-question>

    <v-container>
        <replies :question="question"></replies>
        <new-reply v-if="loggedIn" :questionSlug="question.slug"></new-reply>
        <div v-else class="mt-4">
             <router-link to="/login">login in to reply</router-link>
        </div>
       
       
    </v-container>
    </div>
   
</template>

<script>
import ShowQuestion from './ShowQuestion.vue'
import EditQuestion from './editQuestion.vue'
import Replies from '../reply/replies.vue'
import newReply from '../reply/newReply.vue'
export default {
    components :{ShowQuestion,EditQuestion,Replies,newReply},
    data(){
        return {
            question: null,
            editing: false,
        }
    },
    created(){
       this.listen()
       this.getQuestion()
    },

    computed:{
        loggedIn(){
            return User.loggedIn();
        }
    },

    methods : {
        listen(){
            EventBus.$on('startEditing',()=>{
                this.editing =true
            })

            EventBus.$on('cancelEditing',()=>{
                this.editing =false
            })
        },

        getQuestion(){
            axios.get(`/api/question/${this.$route.params.slug}`)
            .then(res => this.question = res.data.data)
        }
    
    }
}
</script>

<style>

</style>
