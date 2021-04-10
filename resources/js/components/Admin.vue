<template>
    <div class="container"> 
        <div class="row">
            <div class="col-md">
                <router-link to="/admin/tb_alumni">Tb Alumni</router-link>
                <router-link to="/admin/lowongan">Lowongan yang kamu sediakan</router-link>
            </div>
        </div>
        <router-view></router-view>
    </div>
<!-- Disini kita atur navigation barnya berarti -->
</template>
 
<script>
    export default {}
</script>

