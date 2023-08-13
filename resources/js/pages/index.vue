<script setup>
    import {useForm} from '@inertiajs/vue3';
    import {router} from '@inertiajs/vue3';

    defineProps({
        students:Object
    })

    function create() {
        router.get('students/create')
    }
    function edit(id) {
        // alert(id);
        router.get('/students/'+id+'/edit')
    }
    function destroy(id) {
        router.delete('/students/'+id)
    }
    function view(id) {
        router.get('/students/'+id+'/show')
    }
</script>
<template>
    <div class="container">
        <div class="card col-8 offset-2 mt-3">
            <div class="card-header">
                Student List
                <button @click.prevent="create()" class="btn btn-sm btn-outline-info float-end">Student Add</button>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Student Image</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Depeartment</th>
                        <th scope="col">Roll</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="student in students">
                        <th scope="row">{{student.id}}</th>
                        <td>
                            <img :src="student.image" class="image-fluid " style="width: 50px">
                        </td>
                        <td>{{student.name}}</td>
                        <td>{{student.department}}</td>
                        <td>{{student.roll}}</td>
                        <td>
                            <button @click.prevent="view(student.id)" class="btn btn-outline-info">view</button>
                            <button @click.prevent="edit(student.id)" class="btn btn-outline-warning">edit</button>
                            <button @click.prevent="destroy(student.id)" class="btn btn-outline-danger">Delete</button>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
