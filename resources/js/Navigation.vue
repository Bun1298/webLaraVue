<template>
<!-- Disini tampilan Navigation bar -->
    <div>
    <nav class="navbar navbar-expand-sm bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Logo</a>
            <ul class="navbar-nav">
                <li class="nav-item nav-link">
                    <router-link to="/">Home</router-link>
                </li>
                <!-- <li class="nav-item nav-link">
                    <router-link to="/admin/" name="admin">Admin</router-link>
                </li> -->
                <li class="nav-item nav-link">
                    <!-- <router-link to="/login/" name="login">Sign In/Up</router-link> -->
                    <router-link :to="'/'+sign+'/'+id" :name="sign">{{signValue}}</router-link>
                </li>
                <li class="nav-item nav-link" v-show="seen">
                    <button @click="logOut" class="text-white">Logout</button>
                </li>
            </ul>
        </div>
    </nav>
        <router-view></router-view>
    </div>
</template>

<script>
export default{
    data(){
        return {
            user:'',
            seen:true,
            sign:'login',
            id:'',
            signValue:'Login',
        }
    },
    mounted(){
        this.cekUser();
    },
    methods:{
        cekUser(){
            const parse = JSON.parse(localStorage.getItem('user'));
            if(parse != "kosong"){
                this.showLog();
            }else if(parse=="kosong"){
                this.hideLog();
            }
        },
        logOut(){
            const string = JSON.stringify("kosong");
            localStorage.setItem('user',string);
            // window.location.reload();
            // this.$router.push({ name:'index' })
            this.$router.go('/');
        },
        hideLog(){
            this.seen = false;
        },
        showLog(){
            this.seen=true;
        }
    }
}
</script>
