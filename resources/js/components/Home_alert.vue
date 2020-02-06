<template>
  <div>
    <v-alert
      v-model="alert"
      dismissible
      color="indigo accent-4"
      border="left"
      elevation="2"
      colored-border
      icon="notifications"
    >
      You've got <strong>5</strong> notifications!
    </v-alert>

    <div class="text-center">
      <v-btn
        v-if="!alert"
        dark
        @click="alert = true"
      >
        Reset Alert
      </v-btn>
    </div>
  </div>
</template>

<script>
  export default {
    data () {
      return {
        alert: true,
      }
    },
  }
</script>