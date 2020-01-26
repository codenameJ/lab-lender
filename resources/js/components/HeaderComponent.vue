<template>
    <div>
        <v-app-bar
            :clipped-left="$vuetify.breakpoint.lgAndUp"
            height="70"
            app
            class="shadow-header"
        >
            <v-toolbar-title class="ml-0 pl-4">
                <span class="hidden-sm-and-down d-flex align-center">
                    <v-img src="/img/icon.png" max-width="50" max-height="50" />
                    <!-- <h3 class="text-primary pl-3 text-brand">ssc-guard</h3> -->
                </span>
            </v-toolbar-title>
            <v-spacer />
            <v-menu offset-y>
                <template v-slot:activator="{ on }">
                    <v-btn v-on="on" icon>
                        <v-icon class="text-primary">
                            mdi-account
                        </v-icon>
                    </v-btn>
                </template>

                <v-list>
                    <v-list-item @click="logout()">
                        <v-list-item-title>ออกจากระบบ</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>
        </v-app-bar>

        <v-navigation-drawer
            v-model="drawer"
            :clipped="$vuetify.breakpoint.lgAndUp"
            class="background-gradient"
            src="/img/nav.png"
            dark
            app
        >
        
            <v-list-item>
                <v-img
                    class="mt-3"
                    src="/img/icon.png"
                    max-width="50"
                    max-height="50"
                ></v-img>
                <div class="mx-4 pt-3 font-weight-bold" style="font-size:1.5em">
                    LAB LENDER
                </div>
            </v-list-item>

            <v-divider></v-divider>

            <v-list nav dense>
                <template v-for="item in menu">
                    <v-row
                        v-if="item.heading"
                        :key="item.heading"
                        align="center"
                    >
                        <v-col cols="6">
                            <v-subheader v-if="item.heading" class="text-menu">
                                {{ item.heading }}
                            </v-subheader>
                        </v-col>
                    </v-row>

                    <v-list-group
                        v-else-if="item.children"
                        :key="item.text"
                        v-model="item.model"
                        :prepend-icon="
                            item.model ? item.icon : item['icon-alt']
                        "
                        class="my-3 text-menu"
                    >
                        <template v-slot:activator>
                            <v-list-item-title class="text-menu">
                                {{ item.text }}
                            </v-list-item-title>
                        </template>
                        <v-list-item
                            v-for="child in item.children"
                            :key="child.text"
                            :to="child.route"
                            nuxt
                        >
                            <v-list-item-action>
                                <v-icon class="mr-0">
                                    {{ child.icon }}
                                </v-icon>
                            </v-list-item-action>
                            <v-list-item-content>
                                <v-list-item-title class="text-sub-menu">
                                    {{ child.text }}
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list-group>

                    <v-list-item v-else :key="item.text" :to="item.route" nuxt>
                        <v-list-item-action>
                            <v-icon>{{ item.icon }}</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title class="text-menu">
                                {{ item.text }}
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </template>
                <!-- <v-list-item @click="logout()" class="logout-item">
          <v-list-item-action>
            <v-icon>fas fa-sign-out-alt</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>ออกจากระบบ</v-list-item-title>
          </v-list-item-content>
        </v-list-item> -->
            </v-list>
        </v-navigation-drawer>
    </div>
</template>

<script>
export default {
    name: "Header",
    components: {},
    data: () => ({
        appName: process.env.APP_NAME,
        fixed: false,
        dialog: false,
        drawer: true,
        menu: [
            {
                icon: "home",
                "icon-alt": "home",
                text: "หน้าหลัก",
                route: "/reports/summarize"
            },
            {
                icon: "announcement",
                "icon-alt": "announcement",
                text: "ประกาศ",
                route: "/reports/summarize"
            },
            {
                icon: "build",
                "icon-alt": "build",
                text: "อุปกรณ์",
                route: "/reports/summarize"
            },
            {
                icon: "assignment",
                "icon-alt": "assignment",
                text: "คำขอยืม",
                route: "/reports/summarize"
            },
            {
                icon: "history",
                "icon-alt": "history",
                text: "ประวัติ",
                route: "/reports/summarize"
            },
            {
                icon: "group",
                "icon-alt": "group",
                text: "จัดการผู้ใช้งาน",
                children: [
                    {
                        text: "นักศึกษา",
                        route: "/reports/summarize"
                    },
                    { 
                        text: "ผู้ช่วยสอน (TA)",
                        route: "/reports/daily" 
                    }
                ]
            }
            // {
            //     icon: "mdi-file-chart",
            //     "icon-alt": "mdi-file-chart",
            //     text: "รายงาน",
            //     children: [
            //         {
            //             icon: "home",
            //             text: "รายงานสรุป",
            //             route: "/reports/summarize"
            //         },
            //         { text: "รายงานประจำวัน", route: "/reports/daily" },
            //         {
            //             text: "รายงาน Tarnsection",
            //             route: "/reports/tarnsection"
            //         }
            //     ]
            // },
            // {
            //     icon: "mdi-settings",
            //     "icon-alt": "mdi-settings",
            //     text: "ตั้งค่า",
            //     children: [
            //         { text: "ตั้งค่าโซน", route: "/settings/zones" },
            //         { text: "ตั้งค่าโครงการ", route: "/settings/projects" },
            //         { text: "ตั้งค่าพนักงาน", route: "/settings/employees" },
            //         {
            //             text: "ตั้งค่าผู้ใช้งาน",
            //             route: "/settings/backoffice-users"
            //         },
            //         {
            //             text: "ตั้งค่าการแจ้งเหตุฉุกเฉิน",
            //             route: "/settings/emergency-notification"
            //         }
            //     ]
            // }
        ]
    }),
    computed: {},
    watch: {
        // userData: {
        //   handler (val) {
        //     // if (val.status) {
        //     //   await this.fetchCertificates()
        //     // }
        //   },
        //   deep: true
        // }
    },
    methods: {
        sidebarToggle() {
            this.drawer = !this.drawer;
        },
        logout() {
            this.$store
                .dispatch("auth/logout")
                .then(() => this.$router.push({ path: "/login" }));
        }
    }
};
</script>
