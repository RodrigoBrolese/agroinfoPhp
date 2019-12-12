<template>
    <v-dialog v-model="dialog" max-width="500px">
        <template v-slot:activator="{ on }">
            <v-btn color="primary" dark class="mb-2" v-on="on">{{title}}</v-btn>
        </template>
        <v-card>
            <v-card-title class="headline text-capitalize">{{ title }}</v-card-title>

            <v-card-text>
                <div class="create__product__wrapper">
                    <v-text-field
                            label="Nome"
                            v-model.trim="form.name"
                            :error-messages="errors.name"
                    > </v-text-field>
                    <v-text-field
                            label="Hectare"
                            type="number"
                            v-model.number="form.hectare"
                            :error-messages="errors.hectare"
                    > </v-text-field>
                    <v-text-field
                            label="Tipo"
                            v-model.trim="form.type"
                            :error-messages="errors.type"
                    > </v-text-field>

                    <div class="group__button">
                        <v-btn color="primary" text @click="close()">Cancelar</v-btn>
                        <v-btn color="primary" @click="save()" :loading="loading">Salvar</v-btn>
                    </div>
                </div>
            </v-card-text>
        </v-card>
        <div class="snack__wrapper">
            <v-snackbar
                    v-model="snackbar"
                    absolute
                    color="sucess"
                    class="snack"
                    :multi-line="true"
                    :timeout="3000"
            >
                {{successMsg}}
                <v-btn
                        color="primary"
                        text
                        @click="close()"
                >
                    Close
                </v-btn>
            </v-snackbar>
        </div>
    </v-dialog>
</template>

<script>
  export default {
    props: [
      'title',
      'store'
    ],
    methods: {
      close() {
        this.dialog = false;
        this.snackbar = false;
        Object.assign(this.$data, this.$options.data());

        this.$emit('update');

      },
      async save() {

        this.loading = true;
        let form = this.form;

        axios.post(this.$props.store, {
          'name': form.name,
          'hectare': form.hectare,
          'type': form.type,
        }).then((response) => {

          this.successMsg = response.data.message;
          this.snackbar = true;

          setTimeout(() => {
            this.close();
          }, 3000);

        }).catch((error) => {

          let serverErrors = error.response.data.errors;
          this.errors.name = serverErrors.name ? serverErrors.name.join(', ') : '';
          this.errors.hectare = serverErrors.hectare ? serverErrors.hectare.join(', ') : '';
          this.errors.type = serverErrors.type ? serverErrors.type.join(', ') : '';

        }).finally(() => {

          this.loading = false;

        });
      }
    },
    data() {

      let proprietis = {
        name: '',
        hectare: '',
        type: ''
      };

      return {
        dialog: false,
        loading: false,
        snackbar: false,
        form: {
          ...proprietis
        },
        errors: {
          ...proprietis
        },
        successMsg: ''
      }
    },
    name: "CreateProduct"
  }
</script>

<style lang="scss">
    .create__product__wrapper {
        display: flex;
        flex: 1 0 auto;
        flex-direction: column;

        .group__button {
            align-self: flex-end;
            display: flex;
            margin-top: 15px;

            button {
                margin-right: 15px;
            }

            button:last-of-type {
                margin-right: 0;
            }
        }

    }
</style>