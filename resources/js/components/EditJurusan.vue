<template>
    <div>
        <h3 class="text-center">Edit Product</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateProduct">
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
                    <button type="submit" class="btn btn-primary">Update</button>
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
        created() {
            this.axios
                .get(`http://localhost:8000/api/jurusans/${this.$route.params.id}`)
                .then((res) => {
                    this.jurusan = res.data;
                });
        },
        methods: {
            updateProduct() {
                this.axios
                    .patch(`http://localhost:8000/api/jurusans/${this.$route.params.id}`, this.jurusan)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>