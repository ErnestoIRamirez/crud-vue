<template>
    <div>
        <b-card-group deck>
            <b-card title="Title" header-tag="header" footer-tag="footer">
            <h6 slot="header" class="mb-0">Formulario</h6>
            <form @submit.prevent="newPerson('ver')" data-vv-scope="ver">
                <b-container>
                    <b-row>
                        <b-col md="4">
                            <b-form-group label="Nombre:">
                            <b-form-input type="text" v-model="nombre" :state="nombrea" placeholder="Enter your name"></b-form-input>
                            <span>Minimo 3 caracteres</span>
                            </b-form-group>
                        </b-col>
                        <b-col md="4">
                            <b-form-group label="Primer apellido:">
                            <b-form-input type="text" v-model="primerap" :state="primera" placeholder="Enter your name"></b-form-input>
                            <span>Minimo 3 caracteres</span>
                            </b-form-group>
                        </b-col>
                        <b-col md="4">
                            <b-form-group label="Segundo apellido:">
                            <b-form-input type="text" v-model="segundoap" :state="segundoa" placeholder="Enter your name"></b-form-input>
                            <span>Minimo 3 caracteres</span>
                            </b-form-group>
                        </b-col>
                        <b-col md="6">
                            <b-form-group label="Sexo:">
                            <b-form-select v-model="sexo" :options="sexoSelect" :state="sex"></b-form-select>
                            <p>texto: {{ sexo }}</p>
                            </b-form-group>
                        </b-col>
                        <b-col md="6">
                            <b-form-group label="Documentos:">
                            <b-form-checkbox-group v-model="check" :state="documents" :options="documentosRadio"></b-form-checkbox-group>
                            <p>texto: {{ check }}</p>
                            </b-form-group>
                        </b-col>
                        <b-button type="submit"  block variant="primary">Guardar</b-button>
                    </b-row>
                </b-container>
            </form>
            </b-card>
        </b-card-group>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                nombre: '',
                primerap: '',
                segundoap: '',
                sexo: null,
                documentos: null,
                check: [],
                sexoSelect: [
                    { value: null, text: 'Selecciona un sexo' },
                    { value: 1, text: 'Hombre' },
                    { value: 2, text: 'Mujer' },
                    { value: 3, text: 'Sin especificar' }
                ],
                documentosRadio: [
                    { value: 1, text: 'Licencia de conducir' },
                    { value: 2, text: 'IFE' },
                    { value: 3, text: 'Cartilla militar'}
                ]
            }
        },

        mounted() {
            console.log('Component mounted.')
        },
        
        computed: {
            primera() {
            return this.primerap.length > 2 ? true : false;
            },
            segundoa() {
            return this.segundoap.length > 2 ? true : false;
            },
            nombrea() {
            return this.nombre.length > 2 ? true : false;
            },
            documents() {
            return this.check.length >= 1
            },
            sex() {
            // return this.sexo.invalid ? true : false;
            }
        },

        methods: {
            newPerson(scope) {
                // this.$validator.validateAll(scope).then((result) => {
                    // if (result) {
                        // var urlStore = route('personas');
                        const params = {
                            nombre: this.nombre,
                            primer_ap: this.primerap,
                            segundo_ap: this.segundoap,
                            sexo: this.sexo,
                            documento: this.check
                        }
                        axios.post('personas', params).then(
                            (response) => {
                                // const thought = response.data;
                                // this.$emit('new', thought);
                                this.$swal('Hello word!', 'error', 'warning')

                            }
                        );
                    // } else {
                        swal({
                            title: '¡Aún no es posible guardar!',
                            text: 'Ingrese los campos obligatorios',
                            type: 'warning',
                            confirmButtonText: 'Entendido'
                        })
                    // }
                // });
                
                
            },
        }
    }
</script>