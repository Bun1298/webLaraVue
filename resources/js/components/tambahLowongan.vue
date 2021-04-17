<template>
    <div>
        <div v-show="adminCheck" class="viewAdmin">
            <div class="container py-4">
                <div class="row py-4">
                    <div class="col-md">
                        <div class="form-group">
                            <label>Title Job</label>
                            <input type="text" name="title_job" placeholder="Title Job" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-show="notAdmin" class="container">
            {{ valueData }}
            <br>
            <span>Silahkan kembali ke home </span><router-link to="/" class="btn btn-primary">Kembali ke home</router-link>
        </div>
    </div>
</template>
<script>
export default{
    data(){
        return{
            valueData:"",
            adminCheck:false,
            status:"",
            uid:"",
            notAdmin:true,
        }
    },
    created(){
        this.cekData()
    },
    methods:{
        cekData(){
            const parsed = JSON.parse(localStorage.getItem('user'));
            this.status = parsed[0].status;
            this.uid = parsed[0].id;
            if(this.status ==="E"){
                // Jika alumni do something
                this.adminCheck=true
                this.notAdmin=false
                // Allow view admin
            }else{
                // Jika Bukan Alumni do something
                this.valueData = "Anda bukan alumni jadi tidak bisa post job"
                this.notAdmin = true
            }
        },
        addLowongan(){
            this.$router.push('/tambahLowongan/');
        }
    }
}
</script>
