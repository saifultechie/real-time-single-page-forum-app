<template>
    <v-card class="mt-2">
        <v-card-title primary-title>
            <div>
               <router-link :to="data.path">
                   {{data.title}}
               </router-link>
                <div class="grey--text">
                   {{data.user}} said {{data.created}}
                </div>
            </div>
        </v-card-title>
        <v-card-text>
            {{data.body}}
        </v-card-text>
    </v-card>
</template>

<script>
export default {
    props:['data']

}
</script>

<style>

</style>
