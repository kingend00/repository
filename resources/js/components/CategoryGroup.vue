<template>
    <ul>
        <li><router-link :to="{name:'home_page'}">Home page</router-link></li>
        <li v-if="!userLogin"><router-link :to="{name:'login'}" >Login</router-link></li>
        <li v-else><a @click="logout" href="#" :key="userLogin" >Logout</a></li>
        <li><a href="css.html">About</a></li>
        <li><a href="reveal.html">Contact</a></li>
        <li id="wrapper">
            <div class="dropdown">
            <button @click="dropdown" class="dropbtn third">Category</button>
                <div id="myDropdown" :class="'dropdown-content '+activeDropdown">
                    <router-link v-for="(data,index) in category_group " :key="index" :to="'/category_group/'+data.id">{{data.title}}</router-link>
                </div>
            </div>
        </li>
    </ul>
</template>
<script>
export default {
    data() {
       return{
            category_group:null,
            activeDropdown:'',
            userLogin:this.$cookies.get('token') || ''
       }
    },
    created(){   
        axios.get('/category_group/').then(response => {
            this.category_group = response.data;
        }).catch(e => {
            console.log('error',e)
        });
    },
    methods:{
        dropdown(){
            if(this.activeDropdown == '' ){
                this.activeDropdown = 'show'
            }
            else {
                this.activeDropdown = ''
            }
        },
        logout(){
            this.$cookies.remove('token')
            this.$store.commit('changeLogin',false)
            this.$router.push({name:'home_page'})
            console.log('logout')
        }
    },
    computed:{
        checkStatus(){
            return this.$store.state.checkLogin
        }
    },
    watch:{
        checkStatus(newData,oldData){
            this.userLogin = this.$cookies.get('token')
        }
    }
}
</script>
<style scoped>
#menu{
    height: auto;
    width: auto;
}
#wrapper{
    width: 100%;
}
.dropbtn {
  background-color: rgb(68, 175, 68);
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  width: 100%;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: rgb(68, 175, 68);
}
.dropbtn:active{
    background-color:#16a085;
}

.dropdown {
  position: relative;
  display: inline-block;
  width: 100%;
}

.dropdown-content {
    -webkit-transition: all .4s ease-out;
    transition: all .4s ease-out;
    transform: rotateX(90deg);
    transform-origin: top;
    opacity: 0;
    display: block;
    width: 100%;
    border: none;

}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {
    display: block;
    position: absolute;
    background-color: #f1f1f1;
    transform: rotateX(0deg);
    transform-origin: top;
    min-width: 160px;
    width: 100%;
    opacity: 1;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.third {
  border-color: rgb(68, 175, 68);
  color: #fff;
  box-shadow: 0 0 40px 40px rgb(68, 175, 68) inset, 0 0 0 0 rgb(68, 175, 68);
  transition: all 150ms ease-in-out;
  
}
.third:hover {
    box-shadow: 0 0 10px 0 rgb(68, 175, 68) inset, 0 0 10px 4px rgb(68, 175, 68);
  }
</style>