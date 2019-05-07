<template>
    <div class="card">
        <div class="card-header">¿En que estas pensando?</div>
        <div class="card-body">
            <form action="" v-on:submit.prevent="newThought()">
                <div class="form-group">
                    <label for="thought">Ahora estoy pensando en:</label>
                    <input type="text" class="form-control" name="thought" v-model="description">
                </div>
                <button type="submit" class="btn btn-primary">
                    Enviar
                </button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                description: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            newThought() {
                const params = {
                    description: this.description
                }
                var urlStore = route('thoughts.store');
                axios.post(urlStore, params).then(
                    response => {console.log(response)}
                );
                let thought = {
                    'id': 2,
                    'description': this.description, 
                    'created_at': '27/12/2019'
                }
                this.$emit('new', thought);
                this.description = '';
            }
        }
    }
</script>
