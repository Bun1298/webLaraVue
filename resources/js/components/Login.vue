<template>
<div ref="screenHeight">
  <div class="container h-100 my-auto">
    <div class="row h-100 my-auto">
      <div class="col-md"></div>
      <div class="col-md-6 py-4 my-auto">
        <div class="middle-content my-4 py-4">
          <div class="text-center">
            <h3>Login</h3>
          </div>
          <!-- {{screenSize}} -->
          <form @submit.prevent="loginUser">
            <div class="form-group">
              <label>Email</label>
              <input type="email" v-model="logins.email" class="form-control" placeholder="Input Email here">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" v-model="logins.password" class="form-control" placeholder="Input Password here">
            </div>
            <button type="submit" class="form-control btn btn-primary">Login</button>
          </form>
          <router-link to="/register" name="register" class="btn btn-info form-control text-white my-4">Register Up</router-link>
        </div>
      </div>
      <div class="col-md">{{datased}}</div>
    </div>
  </div>
</div>
</template>
<script>
export default{
  data(){
    return{
      logins:{},
      datased:""
    }
  },
  methods:{
    loginUser(){
      this.axios
      .post('http://localhost:8000/loginUser/',this.logins)
      .then(response=>{
        // Jika data yang direturn bukan "kosong"
        if(response.data!="kosong"){
          // console.log(response.data);
          const a = JSON.stringify(response.data);
          localStorage.setItem('user',a);
          // this.datased=a;

          // Kembali ke View Index
          this.$router.push({name:'index'});
          this.$router.go('/')
        }
        else if(response.data="kosong"){
          // Jika value yang di return kosong maka
          const a = JSON.stringify(response.data);
          // Set Data Local Kosong)
          localStorage.setItem('user',a);
          // Warning data salah (input ulang)
          this.datased = "Password atau email salah";
        }
      });
    }
  }
  

}
</script>