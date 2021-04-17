<template>
    <div>
        <div v-show="adminCheck" class="viewAdmin">
            <div class="container py-4">
                <div class="row py-4">
                    <div class="col-md">
                    <form @submit.prevent="tambahLowongan" enctype="multipart/form-data">
                        <!-- <div class="col-md"> -->
                            <div class="form-group">
                                <label>Title Job</label>
                                <input type="text" name="title_job" v-model="data.title_loker" placeholder="Title Job" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Job Description</label>
                                <textarea name="job_des" class="form-control" v-model="data.job_des" cols="30" rows="10" maxlength="2000" placeholder="Job Description"></textarea>
                                <!-- <input type="text" name="title_job" placeholder="Title Job" class="form-control"> -->
                            </div>
                            <div class="form-group">
                                <label>Overview</label>
                                <textarea name="overview" class="form-control" v-model="data.overview" cols="30" rows="10" maxlength="2000" placeholder="Overview"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Additional information</label>
                                <textarea name="additional_info" class="form-control" v-model="data.additional_info" cols="30" rows="10" maxlength="2000" placeholder="Additional Information"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Contact Info</label>
                                <input type="email" name="email" v-model="data.email" placeholder="email" class="form-control">
                                <br>
                                <input type="text" name="notelp" v-model="data.notelp" placeholder="notelp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Foto Aktivitas</label>
                                <input type="file" class="form-control" name="images[]" v-on="data.gambar" multiple>
                            </div>
                            <div v-show="hiddenId">
                                <input type="text" name="uid_alumni" v-model="data.id">
                            </div>
                            <button type="submit" class="btn btn-primary text-white form-control">Tambah Lowongan</button>
                        <!-- </div> -->
                    </form>
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
            data:{},
            hiddenId:false,
            gambar:[],
        }
    },
    created(){
        this.cekData()
    },
    methods:{
        cekData(){
            const parsed = JSON.parse(localStorage.getItem('user'));
            this.status = parsed[0].status;
            // this.uid = parsed[0].id;
            if(this.status ==="E"){
                // Jika alumni do something
                this.adminCheck=true
                this.notAdmin=false
                // Allow view admin
                this.uid = parsed[0].id;
            }else{
                // Jika Bukan Alumni do something
                this.valueData = "Anda bukan alumni jadi tidak bisa post job"
                this.notAdmin = true
            }
        },
        addLowongan(){
            this.$router.push('/tambahLowongan/');
        },
        tambahLowongan(){
            this.axios
            .post('http://localhost:8000/tambahLowongan/',this.data)
            .then(response=>{
                console.log(response.data)
            })
        }
    }
}
</script>
