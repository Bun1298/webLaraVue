<template>
    <div>
        <h2 class="text-center">List Jurusan</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Kode Jurusan</th>
                <th>Nama Jurusan</th>
                <th>Deskripsi Jurusan</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="jurusan in jurusans" :key="jurusan.id">
                <td>{{ jurusan.id }}</td>
                <td>{{ jurusan.kode_jurusan }}</td>
                <td>{{ jurusan.nama_jurusan }}</td>
                <td>{{ jurusan.deskripsi_jurusan }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: jurusan.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteProduct(jurusan.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                jurusans: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/jurusans/')
                .then(response => {
                    this.jurusans = response.data;
                });
        },
        methods: {
            deleteProduct(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/jurusans/${id}`)
                    .then(response => {
                        let i = this.jurusans.map(data => data.id).indexOf(id);
                        this.jurusans.splice(i, 1)
                    });
            }
        }
    }
</script>