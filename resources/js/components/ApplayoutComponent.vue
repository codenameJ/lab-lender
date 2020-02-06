<template>
    <div id="app">
        <nav>
            <v-toolbar flat>
                <v-app-bar-nav-icon
                    @click="drawer = !drawer"
                ></v-app-bar-nav-icon>
                <v-toolbar-title>Lab Lender</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn icon>
                    <v-icon>notifications</v-icon>
                </v-btn>
                <v-btn icon>
                    <v-icon>shopping_cart</v-icon>
                </v-btn>
                <v-menu bottom left>
                    <template v-slot:activator="{ on }">
                        <v-btn icon v-on="on">
                            <v-icon>mdi-account</v-icon>
                        </v-btn>
                    </template>

                    <!-- <v-list>
            <v-list-item
              v-for="item in useritems"
              :key="item.title">
                  <v-list-item-title><a class="userhref" :href="item.href">{{ item.title }}</a></v-list-item-title>
            </v-list-item>
          </v-list>  อันเก่า -->

                    <v-card>
                        <v-list>
                            <v-list-item>
                                <v-list-item-avatar>
                                    <img
                                        src="https://cdn.vuetifyjs.com/images/john.jpg"
                                        alt="John"
                                    />
                                </v-list-item-avatar>

                                <v-list-item-content>
                                    <v-list-item-title
                                        >Tanawit Prasertsak</v-list-item-title
                                    >
                                    <v-list-item-subtitle
                                        >Student</v-list-item-subtitle
                                    >
                                </v-list-item-content>
                            </v-list-item>
                        </v-list>

                        <v-divider></v-divider>

                        <v-card-actions>
                            <v-spacer></v-spacer>

                            <v-btn
                                style="text-decoration : none; color : #000000;"
                                href="/logout"
                                text
                                @click="menu = false"
                                >Log out</v-btn
                            >
                        </v-card-actions>
                    </v-card>

                    <!-- <v-list>
                <span>
                <a href="/logout">Logout</a>
              </span>
              </v-list> -->
                </v-menu>
            </v-toolbar>

            <v-navigation-drawer
                app
                v-model="drawer"
                class="background-gradient"
                src="/img/nav1.png"
                overlay-opacity="70"
                absolute
                dark
            >
                <v-list-item>
                    <v-img
                        class="mt-3"
                        src="/img/icon.png"
                        max-width="50"
                        max-height="50"
                    >
                    </v-img>
                    <div
                        class="mx-4 pt-3 font-weight-bold"
                        style="font-size:1.5em"
                    >
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
                                <v-subheader
                                    v-if="item.heading"
                                    class="text-menu"
                                >
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
                            class="mr-3"
                        >
                            <template v-slot:activator>
                                <v-list-item-title style="font-size:1.1em">
                                    &nbsp&nbsp&nbsp{{ item.text }}
                                </v-list-item-title>
                            </template>
                            <v-list-item
                                v-for="child in item.children"
                                :key="child.text"
                                :to="child.route"
                                nuxt
                            >
                                <v-list-item-action>
                                    <v-icon class="mr-3">
                                        {{ child.icon }}
                                    </v-icon>
                                </v-list-item-action>
                                <v-list-item-content>
                                    <v-list-item-title
                                        class="text-sub-menu mr-3"
                                    >
                                        &nbsp&nbsp&nbsp&nbsp<a class="menuhref" :href="child.route">{{ child.text }}</a>
                                    </v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        </v-list-group>

                        <v-list-item
                            v-else
                            :key="item.text"
                            :to="item.route"
                            @click="checkMobile()"
                            nuxt
                        >
                            <v-list-item-action>
                                <v-icon class="mr-3">{{ item.icon }}</v-icon>
                            </v-list-item-action>
                            <v-list-item-content>
                                <v-list-item-title
                                    class="text-menu"
                                    style="font-size:1.1em"
                                >
                                    <a class="menuhref" :href="item.href">{{
                                        item.text
                                    }}</a>
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </template>
                </v-list>
            </v-navigation-drawer>
        </nav>
    </div>
</template>

<script>
export default {
    props: ['username'],
    mounted () {
      console.log(this.username)
    },
    name: "Header",
    components: {},
    data: () => ({
        appName: process.env.APP_NAME,
        fixed: false,
        dialog: false,
        drawer: true,
        useritems: [
            { title: "Profile", href: "/" },
            { title: "Log Out", href: "/logout" }
        ],
        menu: [
            {
                icon: "home",
                "icon-alt": "home",
                text: "หน้าหลัก",
                href: "/home"
            },
            {
                icon: "announcement",
                "icon-alt": "announcement",
                text: "ประกาศ",
                href: "/announcement"
            },
            {
                icon: "build",
                "icon-alt": "build",
                text: "อุปกรณ์",
                href: "/equipment"
            },
            {
                icon: "assignment",
                "icon-alt": "assignment",
                text: "คำขอยืม",
                href: "/request"
            },
            {
                icon: "history",
                "icon-alt": "history",
                text: "ประวัติ",
                href: "/history"
            },
            {
                icon: "group",
                "icon-alt": "group",
                text: "จัดการผู้ใช้งาน",
                children: [
                    {
                        text: "ผู้ใช้งานทั้งหมด",
                        route: "/user"
                    },
                    {
                        text: "นักศึกษา",
                        route: "/user/student"
                    },
                    {
                        text: "ผู้ช่วยสอน (TA)",
                        route: "/user/ta"
                    }
                ]
            }
        ]
    }),
    computed: {
        isMobile() {
            return window.innerWidth < 600;
        },
    },

    watch: {},

    methods: {
        sidebarToggle() {
            this.drawer = !this.drawer;
        },
        checkMobile() {
            console.log("ttt");
            if (this.isMobile) {
                this.drawer = false;
            }
        }
    }
};
</script>

<style scoped>
.userhref {
    text-decoration: none;
    color: #000000;
}

.menuhref {
    text-decoration: none;
    color: #ffffff;
}
</style>
