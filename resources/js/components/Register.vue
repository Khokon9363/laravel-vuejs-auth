<template>
    <div>
        <div class="card-header text-center font-weight-bold font-italic">
            {{ appName }} - Register
        </div>
        <div class="card-body">
            <div v-show="errors.length !== 0" class="text-danger col-md-9 m-auto alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    <li v-for="error in errors" :key="error.key">{{ error[0] }}</li>
                </ul>
            </div>
            <form @submit.prevent="register">
                <div class="form-group">
                    <label for="name">User name</label>
                    <input type="text" v-model="name" class="form-control" id="name" placeholder="Enter user name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="text" v-model="email" class="form-control" id="email" placeholder="Enter email address">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" v-model="password" class="form-control" id="password" placeholder="Enter password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm password</label>
                    <input type="password" v-model="password_confirmation" class="form-control" id="password_confirmation" placeholder="Re-enter password">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
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
            appName               : appName,
            name                  : null,
            email                 : null,
            password              : null,
            password_confirmation : null,
            errors                : []
        }
    },
    created(){
        window.document.title = appName + ' - Register'
        this.loggedIn()
    },
    methods:{
        register(){
            axios.post(baseURL + 'register',{
                name                  : this.name,
                email                 : this.email,
                password              : this.password,
                password_confirmation : this.password_confirmation
            })
            .then(res => {
                user = res.data.data
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