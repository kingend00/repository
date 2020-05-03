<template>
    <div>
        <div id="content">
            <div class="full-wrapper">

                <h1 class="article-header-h1">Bài viết</h1>
                
                <div class="inner-wrapper">
                    <div @click="goToDeTail(data.post.id,data.post_group.id)" class="article-preview" v-for="(data,index) in post_data" :key="index">
                      <span v-if="index >=pagination_start && index <= pagination_end">
                          <h6 class="article-date">{{ data.post.updated_at }}</h6>
                          <h3 class="article-h1"><a href="">{{ data.post.title }}</a></h3>
                          <p class="article-p"> {{ data.post.description }}</p> 
                          
                          <p class="article-link"><a href="#">Read more &raquo;</a></p>
                          <div class="article-breaker"></div>
                      </span>
                    </div>
                </div>
                <nav aria-label="Page navigation example">
                  <ul class="pagination" v-if="length_pagination > 0">
                    <span v-for="(data,index) in length_pagination" :key="index">
                          <li :class="'page-item ' +checkActive(index)"><a class="page-link" @click="handlePagination(index)" href="#">{{ index+1 }}</a></li>
                    </span>
                  </ul>
                </nav>
                
            </div>
        </div>
        <div id="sidebar">
          <div class="sidebar-container">
              <h3>Tags</h3><br/>
              <div class="tag-container">
                <a href="#" @click="getPostTag(data.tag.id)" v-for="(data,index) in tag_data" :key="index" class="tag">{{ data.tag.tag }}</a>
              </div>
          </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            post_data:'',
            length_pagination:0,
            pagination_start:0,
            pagination_end:9,
            tag_data:''
        }
    },
    created(){
        axios.get('/post/getPostGroup/').then(response => {
            this.post_data = response.data
            console.log(this.post_data)
            this.length_pagination = Math.round(response.data.length/10)
            }).catch(e => {
                console.log('error',e)
            });
        axios.get('/tag/getPost/').then(res => {
            console.log(res.data)
            this.tag_data = res.data
          }).catch(err => {
            console.log(err)
          })
    },
    methods:{
        handlePagination(page){
          this.pagination_start = page*10
          this.pagination_end = page <=0 ? 9 : (page+1)*9  // array loop start from 0 , so show 10 record -> *9
        },
        checkActive(index){
          return this.pagination_start/10 == index ? 'active' : ''
        },
        goToDeTail(postId,postGroupId){
          this.$store.commit('gotoPostDetail',postId)
          this.$router.push({name:'post_group',params:{id:postGroupId}})
        },
        getPostTag(tagId){
          axios.get('/tag/getPostTag/'+tagId).then(res => {
            this.length_pagination = Math.round(res.data.length/10) <= 0 ? 1 : Math.round(res.data.length/10)
            this.post_data = res.data
          }).catch(err => {
            console.log(err)
          })
        }
    }
}
</script>
<style lang="scss" scoped>
.active .page-link{
  background-color: #212529;
  border-color:#212529;
}
.page-item {
  width: 60px;
  text-align: center;
}
.sidebar-container{
  margin-left: 3%;
  margin-bottom: 3%;
}
.tag-container a{
  color:#16a085;
}
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
    margin-top: 1%;
    margin-left: 2%;

}
.full-wrapper {
  width:100%;
}

.article-header-h1{
  padding-top:50px;
  margin:0;
  font-size:40px;
  font-weight:bold;
  text-align:center;
  font-family: 'Sunflower', sans-serif;
}

.article-h1 a {
  color:black;
  text-align:left !important;
}

.article-h1 a:hover {
  color:black;
}

.article-h1 a:visited {
  color:black;
}

.inner-wrapper {
  padding:50px;
  margin-bottom: -60px;
}

.article-preview{
  background-color:white;
  margin-left:auto;
  margin-bottom: 0.5%;
  margin-right:auto;
  box-shadow: 0.5px 0.10px 10px -1px #ccc;
  border-left:4px solid #16a085;
  cursor:pointer;
}

@media (min-width: 1024px){
  .article-preview{
  background-color:white;
  max-width:90%;
}
}

@media (min-width: 1280px){
  .article-preview{
  background-color:white;
  max-width:90%;
	transition:.2s;
}
  
  .article-preview:hover{
  transform:scale(1.02);
}
}

@media (max-width: 768px){
  .article-preview{
  background-color:white;
  width:100%;
}
  .inner-wrapper {
    padding:50px 10px;
    margin-bottom: -60px;
}
}

.article-h1,
.article-p,
.article-link,
.article-date{
  text-align: left !important;
  margin-left:2% !important;
  margin-right:2% !important;
  font-family: 'Sunflower', sans-serif;
}

.full-wrapper a {
  text-decoration: none;
}

.article-date {
  margin-bottom: -20px;
  padding-top: 25px;
  font-weight:normal;
  color:#767676;
  font-size:15px;
}

.article-h1{
  font-size:20px !important;
  padding-top:25px;
}

.article-p {
  color:#767676;
  font-weight:normal;
  max-width:90%;
}

.article-link a {
  margin-top:10px;
  color:#212529 !important;
  font-weight:bold;
}

.article-link:hover a {
  color:#212529 ;
}

.article-breaker{
  border-bottom:1px solid #E8E8E8;
  padding-top:20px;
}

.article-breaker-last {
  padding-top:20px;
}
.pagination{
  margin-top:3%;
  margin-left: 11%;
  
}
.pagination a {
  color: #212529;
}
.pagination a:hover {
  color:#16a085;
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
</style>