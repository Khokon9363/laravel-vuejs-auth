<template>
    <div class="card-body">
        <router-link v-for="(link, index) in links" :key="link.index" :to="link.url" class="text-left">
            {{ link.name }}
            <span v-if="++index !== links.length">|</span>
        </router-link>
    </div>
</template>
<script>
export default {
    data(){
        return{
            links: []
        }
    },
    created(){
        this.insertLinks()
        // Call a method of an component from another component
        this.$root.$refs.HomeLinks = this;
    },
    methods: {
        // Call a method of an component from another component
        insertLinks(){
            this.links = []
            this.links.push(
                {
                    url: '/',
                    name: 'Home'
                },
            )
            if (user) {
                this.links.push(
                    {
                        url: '/dashboard',
                        name: 'Dashboard'
                    }
                )
            } else {
                this.links.push(
                    {
                        url: '/login',
                        name: 'Login'
                    },
                    {
                        url: '/register',
                        name: 'Register'
                    },
                    {
                        url: '/forgot-password',
                        name: 'Forgot password ?'
                    }
                )
            }
        }
    }
}
</script>
<style scoped>

</style>>