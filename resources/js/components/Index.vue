<template>
    <!-- Disini tampilan home / index / view logo / home -->
    <div>
        <div
            class="content-1"
            style="background-color:rgba(0,0,0,0.5);height:auto;"
        >
            <div class="container">
                <div class="row text-center py-4">
                    <div class="col-md py-4 h4">
                        Dapatkan pekerjaan dari alumni
                    </div>
                    <!-- <input type="text" class="form-control py-2" placeholder="Cari Judul pekerjaan"> -->
                    <div>
                        <!-- <input type="text" class="form-control py-2" placeholder="Cari Judul Loker" v-model="keyword">
                    <ul v-if="lokers.length > 0">
                        <li v-for="loker in lokers" :key="loker.id" v-text="loker.title_loker"></li>
                    </ul> -->
                    </div>
                </div>
                <div class="row my-4">
                    <input
                        type="text"
                        class="form-control py-2"
                        placeholder="Cari Judul Loker"
                        v-model="keyword"
                    />
                    <div
                        class="col-md-3"
                        v-for="(item, index) in lokers"
                        :key="index"
                    >
                        <div id="card_kerja">
                            <div class="p-4">
                                <h4 class="font-weight-bold">
                                    {{ item.title_loker }}
                                </h4>
                                <p>{{ item.job_des }}</p>
                                <!-- <button @click="seeDetail(item.id)" class="btn btn-primary">Lebih Lanjut</button> -->
                                <router-link
                                    :to="{
                                        name: 'detailLoker',
                                        params: { id: item.id }
                                    }"
                                    >Lebih Lanjut Item
                                    {{ item.id }}</router-link
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
#card_kerja {
    height: 320px;
    background-color: white;
    border-radius: 10px;
}
</style>
<script>
// import Other from './components/index.vue';
export default {
    data() {
        return {
            lokers: [],
            keyword: null,
            seen: true,
            id: "",
            status: ""
        };
    },
    watch: {
        keyword(after, before) {
            this.getResults();
        }
    },
    created() {
        // const a = localStorage.getItem('nama');
        // this.name = a;
        this.cekUser();
        // this.axios
        //     .get('http://localhost:8000/api/lokers/')
        //     .then(response => {
        //         this.lokers = response.data;
        //     });
    },
    mounted: function() {
        // if (localStorage.getItem("user")) {
        //     try {
        //         this.name = JSON.parse(localStorage.getItem("user"));
        //     } catch (e) {
        //         localStorage.removeItem("user");
        //     }
        // }
    },
    methods: {
        getResults() {
            axios
                .get("/livesearch", { params: { keyword: this.keyword } })
                .then(res => (this.Words = res.data));
        },
        cekUser() {
            // Ambil data Local
            const parsed = JSON.parse(localStorage.getItem("user"));

            if (parsed != null) {
                if (parsed == "kosong") {
                    console.log("Guest");
                    this.getData(null, null);
                } else {
                    this.id = parsed[0].id;
                    this.status = parsed[0].status;
                    console.log(this.id + "_" + this.status);
                    this.getData(this.id, this.status);

                    if (parsed[0].status != "E") {
                        // Jika bukan E (ALUMNI) LOAD DATA LOWONGAN
                        this.getData(this.id, this.status);
                    } else {
                        // JIKA ALUMNI LOAD DATA ADMIN
                        this.getData(this.id,this.status);
                        // this.$router.push({ name: "admin" });
                    }
                }
            } else {
                localStorage.setItem("user", JSON.stringify("kosong"));
                this.getData(null, null);
            }
        },
        getData(dataId, dataStatus) {
            if ((dataStatus = "A")) {
                // Jika kosong munculkan view guest
                this.axios
                    .get("http://localhost:8000/api/lokers/")
                    .then(response => {
                        this.lokers = response.data;
                    });
            } else {
                // Jika Admin munculkan view admin
            }
        }
    }
};
</script>
