<template>
    <div>
        <div class="card-header text-center font-weight-bold font-italic">
            {{ appName }} - Forgot password
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email address">
                </div>
                <button type="button" class="btn btn-primary">Reset</button>
            </form>
        </div>
        <home-links></home-links>
    </div>
</template>
<script>
import HomeLinks from './HomeLinks.vue'
export default {
  components: { HomeLinks },
    data(){
        return{
            appName: appName
        }
    },
    created(){
        window.document.title = appName + ' - Forgot password'
        this.loggedIn()
    },
    methods:{
        loggedIn(){
            if(user){
                this.$router.push('dashboard')
            }
        },
    }
}
</script>
<style scoped>

</style>>