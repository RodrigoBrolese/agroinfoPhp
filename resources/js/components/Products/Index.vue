<template>
    <v-data-table
            :headers="JSON.parse(headers)"
            :items="values"
            class="elevation-1"
            :loading="loading"
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
                    ref="teste"
                    @update="handleCreate()"
                > </CreateProduct>
            </v-toolbar>
        </template>
        <template v-slot:item.action="{ item }">
            <v-icon
                    small
                    class="mr-2"
                    @click="editProduct(item)"
            >
                edit
            </v-icon>
            <v-icon
                    small
                    @click="deleteItem(item)"
            >
                delete
            </v-icon>
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
      'store'
    ],
    created() {
      this.initialize()
    },
    watch: {
      dialog (val) {
        val || this.close()
      },
    },
    methods: {
      async initialize() {

        let products = [];
        products = await axios.get(this.$props.get).then(function (response) {
          return response.data.products;
        });

        this.loading = false;
        this.values = products;
      },
      async editProduct(product) {

      },
      handleCreate() {
        this.initialize();
      }
    },
    components: {
      CreateProduct
    },
    name: "DataTable",
    data() {
      return {
        loading: true,
        values: []
      }
    }
  }
</script>

<style lang="scss">
    .v-toolbar__title {
        text-transform: capitalize;
    }
</style>