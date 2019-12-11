<template>
    <v-footer>
        <v-col
                class="text-center"
        >
            {{ new Date().getFullYear() }} — <strong>{{appName}}</strong>
        </v-col>
    </v-footer>
</template>

<script>
  export default {
    props: [
      'appName'
    ],
    name: "Footer"
  }
</script>
