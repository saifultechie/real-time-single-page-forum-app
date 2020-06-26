<template>
    <div>
         <vue-simplemde v-model="reply.reply" ref="markdownEditor" />

          <v-card-actions>
                    <v-btn icon small @click="update">
                        <v-icon color="green">save</v-icon>
                    </v-btn>
                    <v-spacer></v-spacer>
                    <v-btn icon small @click="cancel">
                        <v-icon color="black">cancel</v-icon>
                    </v-btn>
         </v-card-actions>
    </div>
</template>

<script>
 import VueSimplemde from 'vue-simplemde'
export default {
     components: {
      VueSimplemde
    },
    props:['reply'],
    methods :{
        update(){
            axios.patch(`/api/question/${this.reply.question_slug}/reply/${this.reply.id}`
            ,{body:this.reply.reply})
            .then(res => {
                this.cancel(this.reply.reply)
            })

        },

        cancel(reply){
            EventBus.$emit('cancelEditing',reply)
        }
    }

}
</script>

<style>
     @import '~simplemde/dist/simplemde.min.css';
</style>
