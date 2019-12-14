<template>
    <v-data-table
            :headers="JSON.parse(headers)"
            :items="values"
            class="elevation-4"
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
                    @update="handleCreate"
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
                    @click="deleteItem(item)"
            >
                delete
            </v-icon>
            <v-overlay :value="loading" :opacity="0.1">
                <v-progress-circular indeterminate size="64" color="#27632a"> </v-progress-circular>
            </v-overlay>
            <div class="snack__wrapper">
                <v-snackbar
                        v-model="snackbar"
                        color="sucess"
                        :timeout="3000"
                >
                    {{successMsg}}
                </v-snackbar>
            </div>
        </template>
    </v-data-table>
</template>

<script>

  import CreateProduct from "./CreateProduct";

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
      handleCreate(successMsg) {

        let msg = successMsg || '';

        if (msg.length !== 0) {
          this.successMsg = msg;
          this.snackbar = true;
        }
        this.initialize();
      }
    },
    components: {
      CreateProduct
    },
    name: "DataTable",
    data() {
      return {
        loadingTable: true,
        loading: false,
        openDialog: false,
        snackbar: false,
        successMsg: '',
        editValues: {},
        values: []
      }
    }
  }
</script>

<style lang="scss">
    .v-toolbar__title {
        text-transform: capitalize;
    }

    .v-snack__wrapper {
        box-shadow: initial !important;
    }
</style>