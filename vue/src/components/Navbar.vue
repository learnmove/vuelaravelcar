<template>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" ><router-link to="/"><a href="#"><span class="glyphicon glyphicon-user"></span> Salep</a></router-link></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><router-link :to="{name:'product'}"><a href="#">商品</a></router-link></li>
        <li><router-link v-if="isAuth" :to="{name:'product_create'}"><a href="#">刊登商品</a></router-link></li>
        <li><router-link v-if="isAuth" :to="{name:'product_create'}"><a href="#">會員資料</a></router-link></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><router-link v-if="isAuth" :to="{name:'cart'}"><a href="#"><span class="badge">{{getTotalQty}} </span>購物車</a></router-link></li> 
          
        <li><a href="#" v-if="isAuth" @click.prevent="logout">登出</a> </li>
        <li><router-link v-if="!isAuth" :to="{name:'signup'}"><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></router-link> </li>
      
        <li><router-link  v-if="!isAuth" :to="{name:'login'}"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></router-link></li>
      </ul>
    </div>
  </div>
</nav>
</template>
<script>
import {mapGetters} from 'vuex'
    export default{
        name:'Navbar',
        data(){
            return{
                isAuth: this.$auth.isAuthenticate()
            }
        },
      
        watch:{
            '$route':function(){
                this.isAuth=this.$auth.isAuthenticate()
                
            },
          
        },
        computed:{
        //    ...mapGetters('cart',['getTotalQty'])
//         getTotalQty () {
//             return this.$store.getters.cart.getTotalQty()
//   }
           ...mapGetters('cart',['getTotalQty'])

        }
        ,
        methods:{
            logout(){
                this.$auth.destroyLogin()
                this.$swal('已登出')
                setTimeout(function() {
                window.location.reload()
                }, 1000);
            }
        }
    }

</script>
<style>

</style>
