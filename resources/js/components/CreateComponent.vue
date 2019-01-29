<template>
    <form id="create" @submit.prevent="createData">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" v-model="name">
        </div>
        <div class="form-group">
            <label>Age</label>
            <input type="text" name="age" class="form-control" v-model="age">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" v-model="address">
        </div>
        <button class="btn btn-sm btn-block btn-success">Create</button>
    </form>
</template>

<script>
    import router from './../router';
    export default {
        data() {
            return {
                name: '',
                age: '',
                address: ''
            }
        },
        methods: {
            createData: function () {
                var param = {
                    name: this.name, age: this.age, address: this.address
                };

                window.axios.post('/api/data', param).then((response) => {
                    if (response.status == 200 && response.data.status == 'success')
                    {
                        router.push({name: 'home'});
                    } else {
                        alert('Error Create Data. Check Console.');
                        console.log(response);
                    }
                });
            }
        }
    }
</script>

