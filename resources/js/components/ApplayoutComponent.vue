<template>
  <v-sheet
  >
    <v-container class="fill-height"> 
        <v-btn 
          dark
          @click.stop="drawer = !drawer"
        >
          Toggle
        </v-btn>
    </v-container>

    <v-navigation-drawer
        v-model="drawer"
        :clipped="$vuetify.breakpoint.lgAndUp"
        class="background-gradient"
        src="/img/nav.png"
        absolute
        temporary
        dark
        app
    >
      <v-list-item>
         <v-img
            class="mt-3"
            src="/img/icon.png"
            max-width="50"
            max-height="50">
            </v-img>
            <div class="mx-4 pt-3 font-weight-bold" style="font-size:1.5em">
                LAB LENDER
            </div>
      </v-list-item>

      <v-divider></v-divider>

      <v-list dense>

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
  </v-sheet>
</template>

<script>
  export default {
    data () {
      return {
        drawer: null,
        items: [
          { title: 'Home', icon: 'dashboard' },
          { title: 'About', icon: 'question_answer' },
        ],
      }
    },
  }
</script>