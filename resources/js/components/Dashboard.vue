<template>
    <div>
        <div class="card-header text-center font-weight-bold font-italic">
            {{ appName }} - Dashboard
        </div>
        <div v-if="user" class="float-right">
            <h5 >{{ user.name }}</h5> |
            <button type="button" @click="logout" class="btn btn-sm btn-secondary">Logout</button>
        </div>
        <h1 class="text-center">Dashboard Component</h1>
        <home-links></home-links>
    </div>
</template>
<script>
import HomeLinks from './HomeLinks.vue'
export default {
  components: { HomeLinks },
    data(){
        return{
            appName: appName,
            user   : user
        }
    },
    created(){
        window.document.title = appName + ' - Dashboard'
        this.loggedOut()
    },
    methods:{
        loggedOut(){
            if(!this.user){
                this.$router.push('login')
            }
        },
        logout(){
            axios.post(baseURL + 'logout')
                 .then(res => {
                     user = res.data.data
                     this.user = user
                     this.loggedOut()
                 })
                 .catch(err => {
                     console.log(err);
                 })
        }
    }
}
</script>
<style scoped>

</style>>