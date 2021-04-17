<template>
    <div>
        <div class="content-1">
            <div class="container py-4">
                <div class="row py-4">
                    <div class="col-md-6">
                        <h3>Sediakan Lowongan ?</h3>
                    </div>
                    <div class="col-md-6">
                        <button @click="addLowongan" class="btn btn-primary">Tambah Lowongan</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-2">
            <div class="container">
                <h4>List Pekerjaan</h4>
                <div class="row" v-for="items in listLowongan" :key="items.id">
                    <div class="col-md">
                        <span>{{ items.title_loker }}</span>
                        <p>{{ items.overview }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default{
    data(){
        return{
            listLowongan:[]
        }
    },
    created(){
        this.cekData()
    },
    methods:{
        cekData(){
            const parsed = JSON.parse(localStorage.getItem('user'));
            // this.ids = parsed[0].id
            this.axios.get('http://localhost:8000/api/lowongan/').then(response=>{
                this.listLowongan = response.data;
            });
        },
        addLowongan(){
            this.$router.push('/tambahLowongan/');
        }
    }
}
</script>
