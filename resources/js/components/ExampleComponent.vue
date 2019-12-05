<template>
    <v-app id="app">
        <Wrapper>
            <v-app-bar color="primary" clipped-right>
                <v-toolbar-title>Agroinfo</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-app-bar-nav-icon large></v-app-bar-nav-icon>
            </v-app-bar>
        </Wrapper>
    </v-app>
</template>

<script>
  import {} from '../GlobalStyle';

  import { Wrapper } from "./styled";

  export default {
    props: {
      teste: String
    },
    components: {
        Wrapper
    },
    mounted() {
      console.log('Component mounted.')
    }
  }
</script>
