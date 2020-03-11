<template>
    <div id="wrapper">
        <div id="menu-wrapper">
            <div id="menu" class="container" v-if="category_group">
                <ul>
                    <!-- <li class="current_page_item"><a href="#">{{data.title}}</a></li> -->
                    <router-link v-for="(data,index) in category_group " :key="index" :to="'/category_group/'+data.id">{{data.title}}</router-link>
                </ul>
            </div>
            <!-- end #menu --> 
        <div id="header-wrapper">
            <div id="header" class="container">
                <div id="logo">
                    <h1><a href="#">Home Page</a></h1>
                    <p>Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a></p>
                </div>
            </div>
        </div>
        </div>
        <router-view></router-view>
        
    </div>
</template>
<script>
export default {
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
#menu a {
    display: inline-block;

}
</style>