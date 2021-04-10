<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <table>
                        <tr v-for="(item,index) in dataList" :key="index">
                            <td>{{ item.id }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default{
    data:{
        return:{
            dataList:[],
        }
    },
    created(){
        this.cekData()
    },
    methods:{
        cekData(){
            const id = JSON.parse(localStorage.getItem('user','id'));
            console.log(id);
            this.axios.get('http://localhost:8000/api/lokers').then(response=>(this.dataList = response.data));
        }
    }
}
</script>
