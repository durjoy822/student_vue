<script setup>
    import {useForm} from '@inertiajs/vue3';
    import {router} from '@inertiajs/vue3';

    const props=defineProps({
        errors:Object,
        student:Object
    })
    const form=useForm({
        name:props.student.name,
        department:props.student.department,
        roll:props.student.roll,
        reg:props.student.reg,
        phone:props.student.phone,
        image:props.student.image,
    })
    function submit(id) {
        router.put('/students/'+id,form)

    }
</script>

<template>
    <div class="container">
        <div class="card mt-5 col-8 offset-2">
            <div class="card-header">
                Student Edit
            </div>
            <div class="card-body">
                <form @submit.prevent="submit(student.id)" >
                    <div class="mb-3">
                        <label  class="form-label">Name</label>
                        <input type="name" id="name" v-model="form.name" class="form-control" aria-describedby="emailHelp">
                        <div class="text-danger text-xs" v-if="errors.name">{{errors.name}}</div>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label"> Depeartment Name</label>
                        <input type="name" id="department" v-model="form.department" class="form-control" aria-describedby="emailHelp">
                        <div class="text-danger text-xs" v-if="errors.department">{{errors.department}}</div>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Roll</label>
                        <input type="number" id="roll" v-model="form.roll" class="form-control" >
                        <div class="text-danger text-xs" v-if="errors.roll">{{errors.roll}}</div>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Regiestration</label>
                        <input type="number" id="reg" v-model="form.reg" class="form-control" >
                        <div class="text-danger text-xs" v-if="errors.reg" >{{errors.reg}}</div>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Phone</label>
                        <input type="number" id="phone" v-model="form.phone" class="form-control" >
                        <div class="text-danger text-xs" v-if="errors.phone" >{{errors.phone}}</div>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Image</label>
                        <input type="file" id="image" class="form-control" @input="form.image = $event.target.files[0]" />
                        <div><img :src="student.image"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>
