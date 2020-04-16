<template>
    <div id="wrapper">
        <div id="menu-wrapper">
        <div id="header-wrapper">
            <div id="header">
                <div id="logo">
                    <h1><a href="#">HoangX Blog</a></h1>
                    <p>Design by <a href="http://templated.co" rel="nofollow">RogTeam Inc</a></p>
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
            console.log(response.data);
            this.category_group = response.data;
            console.log('category_group',this.category_group)
        }).catch(e => {
            console.log('error',e)
        });
    }
}
</script>
<style>

</style>