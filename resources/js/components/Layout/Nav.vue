<template>

    <div class="app__wrapper">
        <v-app-bar color="primary" clipped-right :elevation="2" app>
            <v-app-bar-nav-icon @click.stop="isOpen = !isOpen" class="d-md-none"/>

            <v-toolbar-title>Agroinfo</v-toolbar-title>

            <v-spacer/>

            <v-navigation-drawer app v-model="isOpen" temporary absolute>
                <NavList :menu-itens=" menuItens "/>
            </v-navigation-drawer>

            <v-menu left bottom>
                <template v-slot:activator="{ on }">
                    <v-btn icon v-on="on">
                        <v-icon>mdi-dots-vertical</v-icon>
                    </v-btn>
                </template>

                <v-list>
                    <v-list-item disabled>
                        <v-list-item-title>Minha conta</v-list-item-title>
                    </v-list-item>
                    <v-list-item @click="logout(logoutRoute)">
                        <v-list-item-title>Sair</v-list-item-title>
                    </v-list-item>
                </v-list>

            </v-menu>

        </v-app-bar>
    </div>

</template>

<script>

  import NavList from './NavList'

  export default {
    props: [
      'logoutRoute',
      'menuItens'
    ],
    methods: {
      logout: (logoutRoute) => {
        window.location.href = logoutRoute;
      }
    },
    components: {
      NavList
    },
    data() {
      return {
        isOpen: false,
      }
    }
  }
</script>

<style lang="scss">
    .app__wrapper {
        .v-toolbar__title {
            padding-left: 0 !important;
        }

        .v-toolbar__title, .v-app-bar__nav-icon, .v-btn--round {
            color: #fff !important;
        }
    }
</style>