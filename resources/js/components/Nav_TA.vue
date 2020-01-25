<template>
<v-card
height="1200"
width="256"


>
<v-navigation-drawer v-model="drawer"
app class = "indigo"
src="/img/nav.png"
dark
left
permanent>

<v-list-item>
          <v-img
  class="mt-3"
  src="/img/icon.png"
  max-width="50"
  max-height="50"
></v-img>
<div class="mx-4 pt-3 font-weight-bold" style="font-size:1.5em">LAB LENDER</div>
<!-- <v-list-item-title class="title">
Lab Lender
</v-list-item-title> -->
</v-list-item>

  <v-divider></v-divider>

  <v-list
    dense
    nav
  >
    <v-list-item-group v-model="item" color="primary">
    <v-list-item
      v-for="item in items"
      :key="item.title"
      link
    >
      <v-list-item-icon>
        <v-icon>{{ item.icon }}</v-icon>
      </v-list-item-icon>
    
      <v-list-item-content>
        <v-list-item-title class="mx-4" style="font-size:1.2em">{{ item.title }}</v-list-item-title>
      </v-list-item-content>
    </v-list-item>
    </v-list-item-group>
  </v-list>
</v-navigation-drawer>
</v-card>
</template>

<script>
export default {
data () {
return {
items: [
{ title: 'Home', icon: 'home' },
{ title: 'Announcement', icon: 'announcement' },
{ title: 'Lab Equipment', icon: 'build' },
{ title: 'Request', icon: 'assignment' },
{ title: 'History', icon: 'history' },
],
right: null,
drawer: true
}
},
}
</script>
Application