<script setup>
    import {useForm} from '@inertiajs/vue3';
    import {router} from '@inertiajs/vue3';

    defineProps({
        errors:Object
    });


    const form=useForm({
        name:null,
        department:null,
        roll:null,
        reg:null,
        phone:null,
        image:null,
    })
    function submit() {
        router.post('/students',form)
        // console.log(form);
    }
</script>
<template>
    <div class="container">
        <div class="card mt-5 col-8 offset-2">
            <div class="card-header">
                Student Registration Form
            </div>
            <div class="card-body">
                <form @submit.prevent="submit()" >
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
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</template>
