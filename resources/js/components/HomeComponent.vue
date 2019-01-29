<template>
    <div>

        <div v-if="datas == null">
            <center><p><b>Getting data...</b></p></center>
        </div>
        <div v-else-if="Array.isArray(datas) && datas.length == 0">
            <center><p><b>No data is displayed, please create a new data.</b></p></center>
        </div>
        <div v-else>
            <table class="table"> 
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Create at</th>
                        <th style="text-align: center;">...</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="data in datas" :key="data.id">
                        <td>{{ data.name }}</td>
                        <td>{{ data.age }}</td>
                        <td>{{ data.address }}</td>
                        <td>{{ data.created_at }}</td>
                        <td style="text-align: center;">
                            <a href="" class="btn btn-sm btn-warning" @click.prevent="updateData(data.id);">Edit</a>
                            <a href="" class="btn btn-sm btn-danger" @click.prevent="deleteData(data.id);">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import router from './../router';
    export default {
        data() {
            return {
                datas: null
            }
        },
        beforeMount() {
            window.axios.get('/api/data').then((response) => {
                this.datas = response.data.result;
            });
        },
        methods: {
            deleteData: function (id) {
                window.axios.delete('/api/data/'+id).then((response) => {
                    if (response.status == 200 && response.data.status == 'success')
                    {
                        this.refreshData();
                    } else {
                        alert('Error Delete Data. Check Console.');
                        console.log(response);
                    }
                });
            },
            updateData: function(idnya) {
                router.push({name: 'update', params: {id: idnya}});
            },
            refreshData: function() {
                window.axios.get('/api/data').then((response) => {
                    this.datas = response.data.result;
                });
            }
        }
    }
</script>
