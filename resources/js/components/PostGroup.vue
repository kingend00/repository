<template>
    <ul>
        <li class = "cl-effect-1"><router-link class="li-title" :to="{name:'home_page_index'}">Trang chủ</router-link></li>
        <li class = "cl-effect-1" v-if="!userLogin"><router-link class="li-title" :to="{name:'login'}" >Đăng nhập</router-link></li>
        <li class = "cl-effect-1" v-else><a @click="logout" class="li-title" href="#" :key="userLogin" >Đăng xuất</a></li>
        <li class = "cl-effect-1"><a href="css.html" class="li-title">About</a></li>
        <li class = "cl-effect-1"><a href="reveal.html" class="li-title">Contact</a></li>
        <li id="wrapper">
            <div class="dropdown">
            <button @click="dropdown" class="dropbtn third">Chuyên mục</button>
                <div id="myDropdown" :class="'dropdown-content '+activeDropdown">
                    <router-link v-for="(data,index) in post_group " :key="index" :to="'/post_group/'+data.id">{{data.title}}</router-link>
                </div>
            </div>
        </li>
    </ul>
</template>
<script>
export default {
    data() {
       return{
            post_group:null,
            activeDropdown:'',
            userLogin:this.$cookies.get('token') || ''
       }
    },
    created(){   
        axios.get('/post_group/').then(response => {
            this.post_group = response.data;
        }).catch(e => {
            console.log('error',e)
        });

        axios.get('/user/data')
        .then(res => {
            console.log('res - postGroup',res)

        }).catch(err => {
                this.userLogin = '',
                this.logout()
        })
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
            this.$router.push({name:'home_page_index'})
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
.li-title{
    color:#212529;
    font-size: 22px;
    border-bottom: .05em solid #b4e7f8;

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
  font-size: 19px;
  border-radius: 0.6em;
  box-shadow: 0 0 40px 40px rgb(68, 175, 68) inset, 0 0 0 0 rgb(68, 175, 68);
  transition: all 150ms ease-in-out;
  
}
.third:hover {
    box-shadow: 0 0 10px 0 rgb(68, 175, 68) inset, 0 0 10px 4px rgb(68, 175, 68);
  }
  /* Effect 1: Brackets */
.cl-effect-1 a::before,
.cl-effect-1 a::after {
	display: inline-block;
	opacity: 0;
	-webkit-transition: -webkit-transform 0.3s, opacity 0.2s;
	-moz-transition: -moz-transform 0.3s, opacity 0.2s;
	transition: transform 0.3s, opacity 0.2s;
}

.cl-effect-1 a::before {
	margin-right: 10px;
	content: '[';
	-webkit-transform: translateX(20px);
	-moz-transform: translateX(20px);
	transform: translateX(20px);
}

.cl-effect-1 a::after {
	margin-left: 10px;
	content: ']';
	-webkit-transform: translateX(-20px);
	-moz-transform: translateX(-20px);
	transform: translateX(-20px);
}

.cl-effect-1 a:hover::before,
.cl-effect-1 a:hover::after,
.cl-effect-1 a:focus::before,
.cl-effect-1 a:focus::after {
	opacity: 1;
	-webkit-transform: translateX(0px);
	-moz-transform: translateX(0px);
	transform: translateX(0px);
}
</style>