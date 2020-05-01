<template>
    <div>
        <div id="content">
              <!-- <paginate
                v-model="length_pagination"
                :page-count="20"
                :page-range="3"
                :margin-pages="2"
                :click-handler="clickCallback"
                :prev-text="'Prev'"
                :next-text="'Next'"
                :container-class="'pagination'"
                :page-class="'page-item'">
            </paginate> -->
            <div class="full-wrapper">

                <h1 class="article-header-h1">Bài viết</h1>
                
                <div class="inner-wrapper">
                    <div class="article-preview" v-for="(data,index) in post_data" :key="index">
                        <h6 class="article-date">{{ data.updated_at }}</h6>
                        <h3 class="article-h1"><a href="">{{ data.title }}</a></h3> <!-- Artikelnamnet-->
                        <p class="article-p"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam rhoncus aliquam metus. Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est. Integer in sapien. </p> 
                        
                        <p class="article-link"><a href="">Read more &raquo;</a></p> <!-- Ändra läknen till vald artikel-->
                        <div class="article-breaker"></div>
                    </div>
                </div>
                
            </div>
        </div>
        <div id="sidebar">
            <h1>This is sidebar</h1>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            post_data:'',
            length_pagination:0
        }
    },
    created(){
        axios.get('/post').then(response => {
            console.log('response',response.data.length)
            this.post_data = response.data
            this.length_pagination = response.data.length
            }).catch(e => {
                console.log('error',e)
            });
    },
    methods:{
        clickCallback(){
            console.log('clickCallback')
        }
    }
}
</script>
<style lang="css" scoped>

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
  margin-right:auto;
  box-shadow: 0.5px 0.10px 10px -1px #ccc;
  border-left:4px solid #B71A8B;
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
</style>