<template>
    <div class="mt-3">
        <v-card>
            <v-card-title>
                <div class="headline">{{data.user_name}}</div>
                <div class="ml-2"> said {{ data.created_at}}</div>
                <v-spacer></v-spacer>
                <like :content="data"></like>
            </v-card-title>
            <v-divider></v-divider>
            <edit-reply v-if="editing"
            :reply=data></edit-reply>
            <v-card-text v-html="reply" v-else></v-card-text>
            <v-divider></v-divider>

            <div v-if="!editing">
                 <v-card-actions v-if="own">
                    <v-btn icon small @click="edit">
                        <v-icon color="orange">edit</v-icon>
                    </v-btn>
                    <v-spacer></v-spacer>
                    <v-btn icon small @click="destroy">
                        <v-icon color="red">delete</v-icon>
                    </v-btn>
                </v-card-actions>
            </div>         
        </v-card>
    </div>
</template>

<script>
import md from 'marked'
import editReply from './editReply'
import like from '../likes/like.vue'
export default {
    props:['data','index'],

    components :{editReply,like},

    data(){
        return {
            editing:false,
            beforeEditReply: ''
        }
    },

    computed: {
        own(){
            return User.own(this.data.user_id)
        },

         reply(){
            return md.parse(this.data.reply)
        }

    },

    created(){
        this.listen()
    },

    methods: {
        destroy(){
            EventBus.$emit('deleteReply',this.index)
        },

        edit(){
            this.editing = true
            this.beforeEditReply = this.data.reply
        },

        listen(){
            EventBus.$on('cancelEditing',(reply)=>{
                this.editing =false
                if(reply!==this.data.reply){ 
                this.data.reply = this.beforeEditReply
                this.beforeEditReply =''
                }
               
            })
        }
    }
}
</script>

<style>

</style>
