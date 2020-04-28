<template>
    <div id="wrapper">
        <div id="menu-wrapper">
        <div id="header-wrapper">
            <div id="header">
                <div id="logo">
                    <h1><a href="#">HoangX Blog</a></h1>
                </div>
            </div>
        </div>
        </div>
        <router-view></router-view>
        
    </div>
</template>
<script>
import Post from "./Post.vue"
export default {
    components: {
        'post': Post
    },
    data() {
       return{
            post_group:null,
       }
    },
    created(){
        axios.get('/post_group/').then(response => {
            this.post_group = response.data;
        }).catch(e => {
            console.log('error',e)
        });
    }
}
</script>
<style>

</style>