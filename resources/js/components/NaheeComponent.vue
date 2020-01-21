<template>
  <v-card
    height="1200"
    width="256"

  >
    <v-navigation-drawer v-model="drawer" 
    :mini-variant.sync="mini"
    app class = "indigo"
     src="/img/nav.png"
    dark
    left
    permanent>
      <v-list-item>
        <v-list-item-content>
          <v-list-item-title class="title">
            Lab Lender
          </v-list-item-title>
          <v-btn
          icon
          @click.stop="mini = !mini"
        >
        <v-icon>mdi-chevron-left</v-icon>
        </v-btn>
          <!-- <v-list-item-subtitle>
            lend fucking everything
          </v-list-item-subtitle> -->
        </v-list-item-content>
      </v-list-item>

      <v-divider></v-divider>

      <v-list
        dense
        nav
      >
        <v-list-item
          v-for="item in items"
          :key="item.title"
          link
        >
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
  </v-card>
</template>

<script>
  export default {
    data () {
      return {
        items: [
          { title: 'Dashboard', icon: 'mdi-view-dashboard' },
          { title: 'Photos', icon: 'mdi-image' },
          { title: 'About', icon: 'mdi-help-box' },
        ],
        right: null,
        drawer: true,
        mini: true
      }
    },
  }
</script>
Application
