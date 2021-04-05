<template>
    <div>
        <div class="card-header text-center font-weight-bold font-italic">
            {{ appName }} - Login
        </div>
        <div class="card-body">
            <div v-show="errors.length !== 0" class="text-danger col-md-9 m-auto alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    <li v-for="error in errors" :key="error.key">{{ error[0] }}</li>
                </ul>
            </div>
            <form @submit.prevent="login">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="text" v-model="email" class="form-control" id="email" placeholder="Enter email address">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" v-model="password" class="form-control" id="password" placeholder="Enter password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
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
            appName  : appName,
            email    : null,
            password : null,
            errors   : []
        }
    },
    created(){
        window.document.title = appName + ' - Login'
        this.loggedIn()
    },
    methods: {
        login(){
            axios.post(baseURL + 'login',{
                email    : this.email,
                password : this.password
            })
            .then(res => {
                user = res.data.data
                this.linkGeneration
                this.loggedIn()
            })
            .catch(err => {
                console.log(err);
                if (err.response.data.errors) {
                    this.errors = err.response.data.errors
                }
            })
        },
        loggedIn(){
            if(user){
                this.$router.push('dashboard')
                this.linkGeneration
            }
        },
        // Call a method of an component from another component
        linkGeneration() {
            this.$root.$refs.HomeLinks.insertLinks();
        }
    }
}
</script>
<style scoped>

</style>>