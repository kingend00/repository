<template>
    <div id="page">
        <div id="content">                
            <span  v-for="(data,index) in postContent" :key="index">
                    <!-- <h2>{{data.title}}</h2> -->
                    <header>
                        <h1 contenteditable>{{data.title}}</h1>
                    </header>
                    <span class="md-body width-img">
                        <markdown-it-vue class="md-body width-img" :content="data.content" />
                    </span>
                    <!-- <h3>{{data.content}}</h3> -->
            </span>
        </div>
        <div id="sidebar">
            <article class="box2">
                <h2>Bài viết</h2><br>
                <span v-if="post != ''">
                    <ul v-for="(data,index) in post" :key="index" class="card style2">                        
                        <li class="card-body" @click="getPostContent(data.post.id)">
                            <div class="card-header" >
                                <a href="#">{{data.post.title}}</a>
                            </div>
                            <div class="card-div">
                                <blockquote class="blockquote mb-0">
                                <h5>Tags</h5>
                                <a href="#" v-for="(data_tag,index) in data.tags" :key="index" class="tag">{{ data_tag.tag }}</a>
                                <footer class="blockquote-footer">{{ data.post.created_at }}</footer>
                                </blockquote>
                            </div>
                        </li>
                    </ul>
                </span>
                <span v-else>
                    <h4>Chưa có bài viết cho mục này ^_^</h4>
                </span>
            </article>
        </div>
    </div>
</template>
<script>
import 'markdown-it-vue/dist/markdown-it-vue.css'

export default {
    data(){
        return {
            post:'',
            category:'',
            postContent:'',
            id:this.$route.params.id || '',
            tags:''
        }
    },
    created(){
        this.getPost();
        if(this.$store.state.showPostDetail)
            this.getPostContent(this.$store.state.showPostDetail)
    },
    methods:{
        getPost(){
            axios.get('/post_group/get_post/'+this.id).then(response => {
                this.post = response.data;
                window.scrollTo(0,0);
                console.log('post_group_data' ,response.data)
            }).catch(e => {
                console.log('error',e)
            });
        },
        getPostContent(id){
            axios.get('/post/'+id).then(response => {
                window.scrollTo(0,0);
                this.postContent = [response.data]
            }).catch(e => {
                console.log('error',e)
            })
        },
    },
    watch:{
        '$route'(to,from) {
            this.id = to.params.id,
            this.getPost()
        }
    }
}
</script>
<style lang="scss" scoped>
    #sidebar{
        border-left: 3px inset rgba(28,110,164,0.7);
        width: 30%;
        height: auto;
        margin-bottom: 3%;
        min-height: 100%;
        float: right;
        margin-top: 1%;
    }
    .md-body img{
        width:100%;
    }
    .card-div{
        margin-left: 3%;
        margin-top: 3%;
    }
    #content{
        width: 66%;
        float: left;
        margin-top: 1%;
        margin-left: 2%;

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
        font-size:18px;
    }
    .card-body{
        cursor: pointer;
    }
    .card{
        margin-bottom: 3% !important;
    }
    .card-body:hover{
        box-shadow: 5px 10px 18px rgb(135, 197, 218);
    }
    .content-short{
        display: inline-block;
        width: 180px;
        white-space: nowrap;
        overflow: hidden !important;
        text-overflow: ellipsis;
    }
    .tag {
    background: #eee;
    border-radius: 3px 0 0 3px;
    color: rgb(85, 82, 82);
    display: inline-block;
    height: 26px;
    line-height: 26px;
    padding: 0 20px 0 23px;
    position: relative;
    margin: 0 10px 10px 0;
    text-decoration: none;
    -webkit-transition: color 0.2s;
    }

    .tag::before {
    background: #fff;
    border-radius: 10px;
    box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
    content: '';
    height: 6px;
    left: 10px;
    position: absolute;
    width: 6px;
    top: 10px;
    }

    .tag::after {
    background: #fff;
    border-bottom: 13px solid transparent;
    border-left: 10px solid #eee;
    border-top: 13px solid transparent;
    content: '';
    position: absolute;
    right: 0;
    top: 0;
    }

    .tag:hover {
    background-color: crimson;
    color: white;
    }

    .tag:hover::after {
    border-left-color: crimson; 
    }


    header { 
    display: table;
    text-align: center; 
    padding: 10px;
    margin: 0 auto;
    }

    header:before,
    header:after{  
    content: '\A';
    display: table-cell; 
    background: #212529; 
    width: 50%;
    -webkit-transform: scaleY(0.1);
    transform: scaleY(0.1);
    }

    header > h1{
    white-space: pre;
    padding: 0 15px;
    }
</style>