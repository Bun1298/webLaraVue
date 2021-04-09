<template>
    <div>
        <h3 class="text-center">Create Product</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="tambahJurusan">
                    <div class="form-group">
                        <label>Kode Jurusan</label>
                        <input type="text" class="form-control" v-model="jurusan.kode_jurusan">
                    </div>
                    <div class="form-group">
                        <label>Nama Jurusan</label>
                        <input type="text" class="form-control" v-model="jurusan.nama_jurusan">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Jurusan</label>
                        <textarea class="form-control" v-model="jurusan.deskripsi_jurusan"></textarea>
                        <!-- <input type="text" class="form-control" v-model="jurusan.detail"> -->
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                jurusan: {}
            }
        },
        methods: {
            tambahJurusan() {
                this.axios
                    .post('http://localhost:8000/api/jurusans', this.jurusan)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>