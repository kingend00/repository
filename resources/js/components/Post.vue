<template>
    <div id="page">
            <div id="content">
                <h1>{{ postContent }}</h1>
                <div  v-for="(data,index) in postContent" :key="index">
                        <!-- <h2>{{data}}</h2> -->

                </div>
            <div id="sidebar">
                <article class="box2">
                    <h2>Article</h2><br>
                    <ul v-for="(data,index) in post" :key="index" class="style2">                        
                        <li><a href="#" @click="getPostContent(data.id)">{{data.title}}</a></li>
                    </ul>
                </article>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            post:'',
            category:'',
            postContent:'',
            id:this.$route.params.id || ''
        }
    },
    created(){
        this.getPost();
    },
    methods:{
        getPost(){
            axios.get('/post').then(response => {
                this.post = response.data
            }).catch(e => {
                console.log('error',e)
            });
        },
        getPostContent(id){
            axios.get('/post/'+id).then(response => {
                this.postContent = response.data
                console.log('postContent',this.postContent)
            }).catch(e => {
                console.log('error',e)
            })
        }
    },
    watch:{
        '$route'(to,from) {
            this.id = to.params.id,
            this.getPost()
        }
    }
}
</script>
<style scoped>
    #sidebar{
        border-left: 3px inset rgba(28,110,164,0.7);
        width: 30%;
        height: auto;
        min-height: 100%;
        float: right;
        margin-top: 1%;
    }
    #content{
        width: 66%;
        float: left;
        margin-left: 3%;

    }
    #page{
        height: 100%;
        width: 100%;
        padding:0;
    }
    .box2{
        height: 100%;
        margin-left: 3%;
        width: 96%;
    }
    .box2 a {
        color :#16a085;
        text-decoration:none;
        font-size:16px;
    }
</style>