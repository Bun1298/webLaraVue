<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md">
                    {{ dataList }}
                    <table>
                        <!-- <tr v-for="(item,index) in dataList" :key="index"> -->
                            <!-- <td>{{ item.id }}</td> -->
                        <!-- </tr> -->
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default{
    data(){
        return{
            dataList:[],
            test:'ikan',
            ids:'',
        }
    },
    created(){
        this.cekData()
    },
    methods:{
        cekData(){
            const parsed = JSON.parse(localStorage.getItem('user'));
            this.ids = parsed[0].id
            // console.log(ids)
            // console.log(parsed);
            this.axios.get('http://localhost:8000/lowongan/',this.ids).then(response=>(console.log(response.data)));
        }
    }
}
</script>
