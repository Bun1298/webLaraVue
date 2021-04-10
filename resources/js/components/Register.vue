<template>
<div>
  <div class="container">
    <div class="row pt-4">
      <div class="col-md text-center pt-4">
        <h3 class="font-weight-bold">Register</h3>
      </div>
    </div>
    <div class="row pb-4">
      <div class="col-md-3"></div>
      <div class="col-md pt-4">
        <form @submit.prevent="registerAkun">
        <div class="form-group">
          <label>Username</label>
          <input type="text" v-model="user.username" class="form-control">
        </div>
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" v-model="user.nama" class="form-control">
        </div> 
        <div class="form-group">
          <label>Email</label>
          <input type="email" v-model="user.email" class="form-control">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" v-model="user.password" class="form-control">
        </div>
        <div class="form-group">
          <label>Jurusan</label>
          <select v-model="user.jurusan" class="form-control">
            <option v-for="(item,index) in jurusan" :key="index" :id="item.id">{{item.kode_jurusan}}</option>
          </select>
        </div>
        <div class="form-group">
          <label>Status</label>
          <select v-model="user.status" class="form-control" @change="cekValue(user.status)">
            <option value="A">Aktif</option>
            <option value="C">Calon</option>
            <option value="E">Alumni</option>
            <option value="O">Lain-lain</option>
          </select>
          <!-- <br>
          <input class="mx-4" type="radio" v-for="users in user" :key="users" v-model="users.status">
          <input class="mx-4" type="radio" v-model="user.status" id="A" value="A">Aktif
          <input class="mx-4" type="radio" v-model="user.status" id="C" value="C">Calon
          <br>
          <br>
          Status User : {{user.status}} -->
        </div>
        <div class="form-group">
          <label>Tanggal Lahir</label>
          <input type="date" class="form-control" v-model="user.tgl_lahir">
        </div>
        <div class="form-group">
          <label>Tahun Masuk</label>
          <input type="number" maxlength="4" class="form-control" v-model="user.tahun_masuk">
        </div>
        
        <div class="form-group">
          <button type="submit" class="btn btn-primary text-white form-control">Register</button>
        </div>
        </form>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</div>
</template>
<script>
export default{
  data(){
    return{
      jurusan:[],
      status:'',
      user:{},
      status:''
    }
  },
  created() {
    this.axios
    .get('http://localhost:8000/api/jurusans/')
    .then(response => {
      this.jurusan = response.data;
      });
  },
  methods:{
    registerAkun(){
      this.axios
        .post('http://localhost:8000/api/users',this.user)
        .then(response=>{
          this.$router.push({name:'login'})
        })
        // .catch(e => this.response(e))
        .finally(()=>this.loading=false)
    },
    cekValue(val){
      // Jika value bukan Alumni (E)
      if(val != "E"){
        // Event untuk non-alumni
        console.log(val)
      }else{
        // Event untuk alumni
        console.log("Enable Alumni");
      }
    }
  },
  mounted(){

  }
}
</script>