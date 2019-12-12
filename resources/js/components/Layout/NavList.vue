<template>
    <v-list nav dense flat app>
        <v-list-item
                v-for="(item, i) in JSON.parse(menuItens)"
                :key="i"
                link
                :disabled="item.disabled"
                :href="item.route"
                :class="item.selected !== undefined ? 'v-list-item--active' : ''"
        >
            <v-list-item-icon>
                <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-icon>

            <v-list-item-content>
                <v-list-item-title>{{ item.title }}</v-list-item-title>
            </v-list-item-content>
        </v-list-item>
    </v-list>
</template>

<script>
  export default {
    props: [
      'menuItens'
    ],
    name: "NavList"
  }
</script>