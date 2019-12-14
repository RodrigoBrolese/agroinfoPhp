<template>
    <v-dialog v-model="dialog" max-width="500px">
        <template v-slot:activator="{ on }">
            <v-btn color="primary" v-on="on">{{title}}</v-btn>
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
                            hint="Área plantada"
                    > </v-text-field>
                    <v-text-field
                            label="Tipo"
                            v-model.trim="form.type"
                            :error-messages="errors.type"
                            hint="Grão, cereal, ..."
                            autocomplete="new-password"
                    > </v-text-field>

                    <div class="group__button">
                        <v-btn color="primary" text @click="close()">Cancelar</v-btn>
                        <v-btn color="primary" @click="save()" :loading="loading">Salvar</v-btn>
                    </div>
                </div>
            </v-card-text>
        </v-card>

    </v-dialog>
</template>

<script>
  export default {
    props: {
      title: String,
      store: String,
    },
    methods: {
      close() {
        this.dialog = false;
        let successMsg = this.successMsg;
        Object.assign(this.$data, this.$options.data());

        this.$emit('update', successMsg);

      },
      open(editValues = {}) {
        this.dialog = true;

        if (editValues !== {}) {
            this.form = {
              id: editValues.id,
              name: editValues.name,
              hectare: editValues.hectare,
              type: editValues.type,
            }
        }

      },
      async save() {

        this.loading = true;
        let form = this.form;

        if (form.id === undefined) {
          this.create(form);
        } else {
          this.edit(form);
        }

      },
      create(form) {
        axios.post(this.$props.store, {
          'name': form.name,
          'hectare': form.hectare,
          'type': form.type,
        }).then((response) => {

          this.successMsg = response.data.message;

          this.close();

        }).catch((error) => {

          let serverErrors = error.response.data.errors;
          this.errors.name = serverErrors.name ? serverErrors.name.join(', ') : '';
          this.errors.hectare = serverErrors.hectare ? serverErrors.hectare.join(', ') : '';
          this.errors.type = serverErrors.type ? serverErrors.type.join(', ') : '';

        }).finally(() => {

          this.loading = false;

        });
      },
      edit(form) {
        axios.patch(this.$props.store + `/${form.id}`, {
          'name': form.name,
          'hectare': form.hectare,
          'type': form.type,
        }).then((response) => {

          this.successMsg = response.data.message;

          this.close();

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

                &:last-of-type {
                    margin-right: 0;
                }
            }
        }

    }
</style>