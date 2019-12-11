<template>
    <div class="list__wrapper">
        <v-card
                width="220"
                height="100%"
                class="d-none d-md-flex"
        >
            <v-navigation-drawer permanent>
                <NavList :menu-itens="menuItens"/>
            </v-navigation-drawer>

        </v-card>

    </div>

</template>

<script>

  import NavList from '../NavList/index'

  export default {
    props: [
      'menuItens'
    ],
    components: {
      NavList
    }
  }
</script>

<style lang="scss">
    .v-list .v-list-item--active {
        color: var(--primary-color-dark);
    }
</style>