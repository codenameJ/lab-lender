<template>
  <v-app id="inspire">
    <Header :menu="menu" />
    <v-content>
      <v-container fluid>

      </v-container>
    </v-content>
    <Footer />
  </v-app>
</template>

<script>
  data: () => ({
    menu: [
      {
        icon: 'mdi-file-chart',
        'icon-alt': 'mdi-file-chart',
        text: 'รายงาน',
        children: [
          { text: 'รายงานสรุป', route: '/reports/summarize' },
          { text: 'รายงานประจำวัน', route: '/reports/daily' },
          { text: 'รายงาน Tarnsection', route: '/reports/tarnsection' }
        ]
      },
      {
        icon: 'mdi-settings',
        'icon-alt': 'mdi-settings',
        text: 'ตั้งค่า',
        children: [
          { text: 'ตั้งค่าโซน', route: '/settings/zones' },
          { text: 'ตั้งค่าโครงการ', route: '/settings/projects' },
          { text: 'ตั้งค่าพนักงาน', route: '/settings/employees' },
          { text: 'ตั้งค่าผู้ใช้งาน', route: '/settings/backoffice-users' },
          { text: 'ตั้งค่าการแจ้งเหตุฉุกเฉิน', route: '/settings/emergency-notification' }
        ]
      }
    ]
  })
</script>