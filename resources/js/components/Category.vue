<template>
    <div id="page" class="container">
            <div id="content">
                <span  v-for="(data,index) in content" :key="index">
                    <div class="title">
                        <h2>{{data.title}}</h2>
                        <span class="byline">Rating : {{data.rate}}</span> </div>
                    <p> This is list content title of category {{data.title}}</p>
                </span>
            </div>
            <div id="sidebar">
                <div class="box2">
                    <div class="title">
                        <h2>{{category_group_details.title}}</h2>
                    </div>
                    <ul v-for="(data,index) in category" :key="index" class="style2">
                        
                        <li><a href="#" @click="getCategoryContent(data.id)">{{data.title}}</a></li>
                        <!-- <li><a href="#">Ornare in hendrerit in lectus</a></li>
                        <li><a href="#">Semper mod quis eget mi dolore</a></li>
                        <li><a href="#">Quam turpis feugiat sit dolor</a></li>
                        <li><a href="#">Amet ornare in hendrerit in lectus</a></li>
                        <li><a href="#">Quam turpis feugiat sit dolor</a></li>
                        <li><a href="#">Consequat etiam lorem phasellus</a></li> -->
                    </ul>
                </div>
            </div>
        </div>
</template>
<script>
export default {
    data(){
        return {
            category_group_details:'',
            category:'',
            content:'',
            id:this.$route.params.id || ''
        }
    },
    created(){
        this.getCategory();
    },
    methods:{
        getCategory(){
            axios.get('/category_group/'+ this.id).then(response => {
                console.log(response)
                this.category_group_details = response.data
            }).catch(e => {
                console.log('error',e)
            });

            axios.get('/category/'+ this.id).then(response => {
                console.log(response)
                this.category = response.data
            }).catch(e => {
                console.log('error',e)
            })
        },
        getCategoryContent(id){
            axios.get('/content/'+id).then(response => {
                console.log(response)
                this.content = response.data
            }).catch(e => {
                console.log('error',e)
            })
        }
    },
    watch:{
        '$route'(to,from) {
            this.id = to.params.id,
            this.getCategory()
        }
    }
}
</script>