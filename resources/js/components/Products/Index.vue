<template>
    <v-data-table
            :headers="JSON.parse(headers)"
            :items="values"
            class="elevation-2 table__wrapper"
            :loading="loadingTable"
    >
        <template v-slot:top>
            <v-toolbar flat>
                <v-toolbar-title>{{title}}</v-toolbar-title>
                <v-divider
                        class="mx-4"
                        inset
                        vertical
                > </v-divider>
                <v-spacer> </v-spacer>
                <CreateProduct
                    :title="buttonText"
                    :store="store"
                    ref="dialog"
                    @update="handleUpdate"
                > </CreateProduct>
            </v-toolbar>
        </template>
        <template v-slot:item.action="{ item }">
            <v-icon
                    small
                    class="mr-2"
                    @click="editProduct(item.id)"
            >
                edit
            </v-icon>
            <v-icon
                    small
                    @click="deleteItem(item.id)"
            >
                delete
            </v-icon>
            <v-overlay :value="loading" :opacity="0.1">
                <v-progress-circular indeterminate size="64" color="#27632a"> </v-progress-circular>
            </v-overlay>
            <div class="snack__wrapper">
                <v-snackbar
                        v-model="snackbar"
                        :color="snackColor"
                        class=""
                        :timeout="3000"
                >
                    {{successMsg}}
                </v-snackbar>
                <ConfirmDialog ref="confirmDialog"> </ConfirmDialog>
            </div>
        </template>
    </v-data-table>
</template>

<script>

  import CreateProduct from "./CreateProduct";
  import ConfirmDialog from "../ConfirmDialog";

  export default {
    props: [
      'title',
      'buttonText',
      'headers',
      'get',
      'store',
    ],
    created() {
      this.initialize();
    },
    watch: {
      dialog (val) {
        val || this.close();
      },
    },
    methods: {
      async initialize() {

        this.loadingTable = true;

        let products = [];
        products = await axios.get(this.$props.get).then(function (response) {
          return response.data.products;
        });

        this.loadingTable = false;
        this.values = products;
      },
      async editProduct(id) {
        this.loading = true;

        let editValues = await axios.get(`${this.$props.store}/${id}`).then(function (response) {
          return response.data.product;
        });

        this.loading = false;

        this.$refs.dialog.open(editValues);

      },
      handleUpdate(successMsg) {

        let msg = successMsg || '';

        if (msg.length !== 0) {
          this.successMsg = msg;
          this.snackbar = true;
        }
        this.initialize();
      },
      async deleteItem(id) {

        if (await this.$refs.confirmDialog.open({
          title: 'Atenção',
          message: 'Deseja realmente excluir esse produto?',
          color: 'warning',
          confirmText: 'Sim',
          cancelText: 'Cancelar',
        })) {

          this.loading = true;

          axios.delete(`${this.$props.store}/${id}`).then((response) => {
            this.handleUpdate(response.data.message);
          }).finally(() => {
            this.loading = false;
          });

        }

      }
    },
    components: {
      CreateProduct,
      ConfirmDialog
    },
    name: "DataTable",
    data() {
      return {
        loadingTable: true,
        loading: false,
        openDialog: false,
        snackbar: false,
        snackColor: 'success',
        successMsg: '',
        editValues: {},
        values: []
      }
    }
  }
</script>

<style lang="scss">

    .table__wrapper {

        .v-toolbar__title {
            text-transform: capitalize;
        }

        .v-snack__wrapper {
            box-shadow: initial !important;
        }

        .v-data-table__mobile-row {
            min-height: 40px;
        }

    }
</style>