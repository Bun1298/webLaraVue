<template>
    <div class="content-1">
        <div class="container">
            <div class="row pt-4">
                <div class="col-md py-4">
                    <h1 class="font-weight-bold">{{detail.title_loker}}</h1>
                    <p id="alumniId">{{detail.kontak}}</p>
                </div>
            </div>
            <div class="pb-4 row">
                <div class="col-md-12">
                    <h5 class="font-weight-bold py-4">Deskripsi Pekerjaan</h5>
                    <p>{{detail.job_des}}</p>
                </div>
                <div class="col-md-12">
                    <h5 class="font-weight-bold py-4">Overview</h5>
                    <p>{{detail.overview}}</p>
                </div>
                <div class="col-md-12">
                    <h5 class="font-weight-bold py-4">Informasi Tambahan</h5>
                    <p>{{detail.additional_info}}</p>
                </div>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default{
        data(){
            return{
                detail:{}
            }
        },
        created(){
            this.axios
                .get('http://localhost:8000/api/lokers/'+this.$route.params.id)
                .then(response => {
                    this.detail = response.data;
                });
        }
    }
</script>