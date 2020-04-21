<template>
    <div>
      <div class="row text-center">
        <div class="col-md-2">
            <router-link :to="{name:'add_post'}" class="btn third">Add</router-link>
        </div>
        <div class="col-md-2">
            <router-link :to="{name:'list_post'}" class="btn third">List</router-link>
        </div> 
      </div>
        <router-view></router-view>
    </div>
</template>
<style lang="scss" scoped>

$green: #2ecc71;
$red: #e74c3c;
$blue: #3498db;
$yellow: #f1c40f;
$purple: #8e44ad;
$turquoise: #1abc9c;

.btn {
  box-sizing: border-box;
  appearance: none;
  background-color: transparent;
  border: 2px solid $red;
  border-radius: 0.6em;
  color: $red;
  cursor: pointer;
  display: flex;
  align-self: center;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1;
  margin: 20px;
  padding: 0.8em 1.4em;
  text-decoration: none;
  text-align: center;
  text-transform: uppercase;
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;

  &:hover{
    color:$blue;
    outline: 0;
  }
  &:focus {
    color:#fff;
    outline: 0;
  }
}

.third {
  border-color: $blue;
  color: #fff;
  box-shadow: 0 0 40px 40px $blue inset, 0 0 0 0 $blue;
  transition: all 150ms ease-in-out;
  
  &:hover {
    box-shadow: 0 0 10px 0 $blue inset, 0 0 10px 4px $blue;
  }
}
</style>