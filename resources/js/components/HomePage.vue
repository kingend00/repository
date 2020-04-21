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
        <category></category>
        <router-view></router-view>
        
    </div>
</template>
<script>
import Category from "./Category.vue"
export default {
    components: {
        'category': Category
    },
    data() {
       return{
            category_group:null,
       }
    },
    created(){
        axios.get('/category_group/').then(response => {
            this.category_group = response.data;
        }).catch(e => {
            console.log('error',e)
        });
    }
}
</script>
<style>

</style>