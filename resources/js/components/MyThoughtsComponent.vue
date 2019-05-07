<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form-component @new="addThought"></form-component>
            <br>
            <thought-component 
            v-for="(thought, index) in thoughts" 
            :key="thought.id" 
            :thought="thought" 
            @update="updateThought(index, ...arguments)"
            @delete="deleteThought(index)">

            </thought-component>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                thoughts: [{
                    'id': 1,
                    'description': 'abc',
                    'create_at': '27/07/1995' 
                }]
            };
        },
        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            addThought(thought) {
                this.thoughts.push(thought);
            },
            deleteThought(index) {
                this.thoughts.splice(index, 1);
            },
            updateThought(index, thought) {
                this.thoughts[index]= thought;
            }
        }
    }
</script>
