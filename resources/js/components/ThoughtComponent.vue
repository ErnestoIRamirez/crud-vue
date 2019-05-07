<template>
    <div class="card">
        <div class="card-header">Publicado en {{ thought.create_at }}</div>
        <div class="card-body">
            <input v-if="editMode" type="text" class="form-control" v-model="thought.description">
            <p v-else>{{ thought.description }}</p>
        </div>
        <div class="card-footer">
            <button v-if="editMode" class="btn btn-success" v-on:click="onClickUpdate()">Guardar cambios</button>
            <button v-else class="btn btn-default" v-on:click="onClickEdit()">Editar</button>
            <button class="btn btn-danger" v-on:click="onClickDelete()">Eliminar</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['thought'],
        data() {
            return {
                editMode: false
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            onClickDelete() {
                this.$emit('delete');
            }, 

            onClickEdit() {
                this.editMode = true;
            },

            onClickUpdate() {
                this.editMode = false;
                this.$emit('update', thought);
            }
        }
    }
</script>
