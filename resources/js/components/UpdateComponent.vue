<template>
    <div>
        <div v-if="data == null">
            <center><p><b>Getting data...</b></p></center>
        </div>
        <div v-else-if="Array.isArray(data) && data.length == 0">
            <center><p><b>404 Data Request Is Not Found.</b></p></center>
        </div>
        <div v-else>
            <form id="create" @submit.prevent="updateData">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" v-model="data.name">
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="text" name="age" class="form-control" v-model="data.age">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" v-model="data.address">
                </div>
                <button class="btn btn-sm btn-block btn-success">Update</button>
            </form>
        </div>
    </div>
</template>

<script>
    import router from './../router';
    export default {
        data() {
            return {
                data: null
            }
        },
        beforeMount() {
            window.axios.get('/api/data/'+this.$route.params.id).then((response) => {
                this.data = response.data.result;
            });
        },
        methods: {
            updateData: function(){
                var param = {
                    name: this.data.name, age: this.data.age, address: this.data.address
                };

                window.axios.post('/api/data/'+this.$route.params.id, param).then((response) => {
                    if (response.status == 200 && response.data.status == 'success')
                    {
                        router.push({name: 'home'});
                    } else {
                        alert('Error Update Data. Check Console.');
                        console.log(response);
                        router.push({name: 'home'});
                    }
                });
            }
        }
    }
</script>

