<template>
    <div class="container"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/admin/" class="nav-item nav-link">Admin</router-link>
                    <!-- <router-link to="/admin/tb_alumni/create" class="nav-item nav-link">Tambah Jurusan</router-link> -->
                </div>
            </div>
        </nav>
        <router-view> </router-view>
    </div>
<!-- Disini kita atur navigation barnya berarti -->
</template>
 
<script>
export default{

}
</script>

