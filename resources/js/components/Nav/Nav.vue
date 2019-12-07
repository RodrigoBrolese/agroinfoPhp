<template>
    <v-app id="app">

        <div class="app__wrapper">
            <v-app-bar color="primary" clipped-right>
                <v-app-bar-nav-icon @click.stop="isOpen = !isOpen" class="d-md-none"/>

                <v-toolbar-title>Agroinfo</v-toolbar-title>

                <v-spacer/>

                <v-navigation-drawer app v-model="isOpen" temporary absolute>
                    <SideNav>

                    </SideNav>
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
        <v-card
            width="240"
            height="100%"
            class="d-none d-md-flex"
        >
            <SideNav>

            </SideNav>
        </v-card>
    </v-app>
</template>

<script>

  import SideNav from "./SideNav/SideNav";

  export default {
    props: {
      'logoutRoute': String,
    },
    methods: {
      logout: (logoutRoute) => {
        window.location.href = logoutRoute;
      }
    },
    components: {
      SideNav
    },
    data() {
      return {
        isOpen: false,
      }
    }
  }
</script>


<style lang="less">
    .app__wrapper {
        .v-toolbar__title, .v-app-bar__nav-icon, .v-btn--round {
            color: #fff !important;
        }
    }
</style>