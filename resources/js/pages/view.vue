<script setup>
    import {router} from '@inertiajs/vue3'

    defineProps({student:Object})

    function home() {
        router.get('/');

    }


</script>
<template>
    <div class="card col-8 offset-2 mt-3">
        <div class="card-header">
            Students Details
            <button @click.prevent="home()" class="btn btn-warning btn-sm float-end">previous</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th>SL</th>
                    <td>{{student.id}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{student.name}}</td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td>{{student.department}}</td>
                </tr>
                <tr>
                    <th>Roll</th>
                    <td>{{student.roll}}</td>
                </tr>
                <tr>
                    <th>Regiestration</th>
                    <td>{{student.reg}}</td>
                </tr>
                <tr>
                    <th>Student Image</th>
                    <img :src="student.image" class="image-fluid " style="width: 50px">
                </tr>
            </table>
        </div>
    </div>
</template>
