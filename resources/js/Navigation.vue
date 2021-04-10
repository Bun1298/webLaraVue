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
                <li class="nav-item nav-link" v-show="admin">
                    <button @click="moveAdmin" class="btn btn-primary">Admin</button>
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
            status:'',
            signValue:'Login',
            admin:true,
        }
    },
    mounted(){
        this.cekUser();
    },
    methods:{
        cekUser(){
            const parse = JSON.parse(localStorage.getItem('user'));
            if(parse != "kosong"){
                this.moveAdmin(parse[0].id,parse[0].status);
                this.seen = true;
                this.admin = true;
            }else if(parse=="kosong"){
                this.status = parse[0];
                this.seen=false;
                this.admin = false;
            }
        },
        logOut(){
            const string = JSON.stringify("kosong");
            localStorage.setItem('user',string);
            this.$router.go('/');
        },
        hideLog(){
            this.seen = false;
        },
        showLog(){
            this.seen=true;
        },
        moveAdmin(id,status){
            // console.log(this.id+this.status);
            const curStat = this.status;

            // this.$router.go('/admin/');
        }
    }
}
</script>
