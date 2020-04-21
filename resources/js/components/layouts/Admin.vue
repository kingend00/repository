<template>
    <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">HoangX</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <router-link class="nav-link" :to="{name:'dashboard'}">Dashboard</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name:'post'}">Posts</router-link>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
            <router-view></router-view>
    </div>
</template>
<script>
export default {

    beforeCreate(){
        axios.get('/user/data')
        .then(res => {
            console.log('res - admin',res)

        }).catch(err => {
                this.$router.push({name:'login'})     
        })
    }
    
}
</script>
<style lang="scss" scoped>
    .dropdown-toggle{
        height: 100%;
    }
    .header-wrap {
  display: block;
  width: auto;
  height: auto;
  padding: 0;
  padding-bottom: 10px;
  text-align: center;
  font-size: 25px;
  font-family: 'Press Start 2P', cursive;
  transform: perspective(200px) rotateX(10deg);
  letter-spacing: .1em;
  user-select: none;
  text-shadow: 
    0 -1px 0 #fff, 
    0 1px 0 #004d40, 
    0 2px 0 #00483B, 
    0 3px 0 #004639, 
    0 4px 0 #004336, 
    0 5px 0 #004134, 
    0 6px 0 #003F32, 
    0 7px 0 #003D30, 
    0 8px 0 #003A2D, 
    0 9px 0 #00382B, 
    0 10px 0 #003528, 
    0 11px 0 #003225, 
    0 12px 0 #002F22, 
    0 13px 0 #002B1E, 
    0 14px 0 #00281C, 
    0 15px 0 #001F13, 
    0 22px 30px rgba(0,0,0, 0.9),
    0 22px 30px rgba(0, 0, 0, 0.9),
    0 22px 15px rgba(0, 0, 0, 0.9),
    0 11px 15px rgba(0, 0, 0, 0.9),
    0 15px 20px rgba(0, 0, 0, 0.9),
    0 15px 11px rgba(0, 0, 0, 0.9),
    0 16px 11px rgba(0, 0, 0, 0.9);

  transition: text-shadow .3s ease .3s, 
    transform .3s ease .3s,
    letter-spacing .3s ease .3s;

  &:hover {
    transition: text-shadow .33s ease, 
      transform .3s ease,
      letter-spacing .3s ease;
    text-shadow: 0 0 0 #004134,
      0 1px 0 #00483B,
      0 2px 0 #003528,
      0 3px 3px rgba(0, 0, 0, 0.9);
    transform: translate(0px, 15px) 
      perspective(200px) 
      rotateX(10deg);
    letter-spacing: .125em;
  }
}
</style>
