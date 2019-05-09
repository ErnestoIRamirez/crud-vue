<template>
    <div class="card">
        <div class="card-header">¿En que estas pensando?</div>
        <div class="card-body">
            <table class="table" id="tablaUsers">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <th scope="row">{{ user.id }}</th>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import datables from 'datatables'
    export default {
        data() {
            return {
                users: []
            }
        },
        mounted() {
            this.getUsers();
            console.log('Component mounted.')
        },

        methods: {
            getUsers() {
                var urlUsers = "users";
                axios.get(urlUsers).then(
                    (response) => {
                        this.users = response.data;
                        this.mytable();
                    }
                )
            },

            mytable() {
                $(function () {
                    $('#tablaUsers').DataTable();
                });
            }
        }
    }
</script>