<template>
    <div id="wrapper">
        <div id="menu-wrapper">
            <div id="header-wrapper">
                <div id="header">
                    <div id="logo">
                        <h1><router-link class="li-title" :to="{name:'home_page_index'}">Hoangx Blog</router-link></h1>
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
<style lang="scss">
#header-wrapper{
    border-radius: 0.6em;

}
#menu-wrapper{
    background-color: white;
}


</style>