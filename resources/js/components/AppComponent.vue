<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        LaraVue
                        <span style="float: right;">
                            <router-link tag="a" class="btn btn-sm btn-primary" to="/">Home</router-link>
                            <router-link tag="a" class="btn btn-sm btn-success" to="/create">Create</router-link>
                        </span>
                    </div>

                    <div class="card-body">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    }
</script>
