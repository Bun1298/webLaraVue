<template>
<!-- Disini tampilan Navigation bar -->
    <div>
    <nav class="navbar navbar-expand-sm bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Logo</a>
            <ul class="navbar-nav">
                <li class="nav-item nav-link">
                    <router-link to="/">Home</router-link>
                </li>
                <!-- <li class="nav-item nav-link">
                    <router-link to="/admin/" name="admin">Admin</router-link>
                </li> -->
                <li class="nav-item nav-link">
                    <router-link to="/login/" name="login">Sign In/Up</router-link>
                </li>
            </ul>
        </div>
    </nav>
        <router-view></router-view>
    </div>
</template>

<script>
export default{}
</script>
