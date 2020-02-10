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

                <!-- <v-dialog v-model="dialog" max-width="500px">
                    <template v-slot:activator="{ on }">
                        <v-badge>
                            <span slot="badge">{{ badge }}</span>
                            <v-icon v-on="on">shopping_cart</v-icon>
                        </v-badge>
                    </template>
                    <v-card>
                        <v-card-title>
                            <span class="headline">Lending Cart</span>
                        </v-card-title>
                        <v-card-text>
                            <v-container>
                                <v-row>
                                    <table
                                        class="table table-striped text left"
                                    >
                                        <tr
                                            v-for="(cart, n) in carts"
                                            v-bind:key="cart.id"
                                        >
                                            <td>
                                                {{ cart.Equip_Name }}
                                            </td>
                                            <td>
                                                {{ cart.amount }}
                                            </td>
                                            <td>
                                                <v-btn
                                                    color="blue darken-1"
                                                    text
                                                    @click="removeCart(n)"
                                                    >delete</v-btn
                                                >
                                            </td>
                                        </tr>
                                    </table>
                                </v-row>
                            </v-container>
                        </v-card-text>

                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="blue darken-1" text @click="close"
                                >Cancel</v-btn
                            >
                            <v-btn color="blue darken-1" text @click="save"
                                >Save</v-btn
                            >
                        </v-card-actions>
                    </v-card>
                </v-dialog> -->

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
                                    <v-list-item-title>{{
                                        username
                                    }}</v-list-item-title>
                                    <v-list-item-subtitle>{{
                                        type
                                    }}</v-list-item-subtitle>
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

                <v-list
                    nav
                    dense
                    v-if="
                        type == 'admin'
                            ? (selmenu = menu)
                            : (selmenu = usermenu)
                    "
                >
                    <template v-for="item in selmenu">
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
                                    <a class="menuhref" :href="child.route">
                                        <v-list-item-title
                                            class="text-sub-menu mr-3"
                                        >
                                            &nbsp&nbsp&nbsp&nbsp{{ child.text }}
                                        </v-list-item-title>
                                    </a>
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
                                <a class="menuhref" :href="item.href">
                                    <v-list-item-title
                                        class="text-menu"
                                        style="font-size:1.1em"
                                    >
                                        {{ item.text }}
                                    </v-list-item-title>
                                </a>
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
    props: ["username", "type"],

    // created() {
    //     this.viewCart();
    // },
    mounted() {
        console.log(this.username);
    },
    name: "Header",
    components: {},
    data: () => ({
        appName: process.env.APP_NAME,
        fixed: false,
        dialog: false,
        drawer: true,
        // carts: [],
        // cartadd: {
        //     id: 0,
        //     Equip_id: 0,
        //     Equip_Name: "",
        //     amount: 0
        // },
        // badge: "0",
        useritems: [
            { title: "Profile", href: "/" },
            { title: "Log Out", href: "/logout" }
        ],
        usermenu: [
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
            }
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
        }
    },

    watch: {
        dialog(val) {
            val || this.close();
        }
    },

    methods: {
        sidebarToggle() {
            this.drawer = !this.drawer;
        },
        checkMobile() {
            console.log("ttt");
            if (this.isMobile) {
                this.drawer = false;
            }
        },
        // viewCart() {
        //     if (localStorage.getItem("carts")) {
        //         this.carts = JSON.parse(localStorage.getItem("carts"));
        //         this.badge = this.carts.length;
        //     }
        // },
        // removeCart(pro) {
        //     this.carts.splice(pro, 1);
        //     this.storeCart();
        // },
        // addCart(pro) {
        //     this.cartadd.id = pro.id;
        //     this.cartadd.Equip_id = pro.Equip_id;
        //     this.cartadd.Equip_Name = pro.Equip_Name;
        //     this.cartadd.amount = this.quantity;
        //     this.carts.push(this.cartadd);
        //     this.cartadd = {};
        //     this.storeCart();
        //     this.close();
        // },
        // storeCart() {
        //     let parsed = JSON.stringify(this.carts);
        //     localStorage.setItem("carts", parsed);
        //     this.viewCart();
        // },
        // close() {
        //     this.dialog = false;
        // },

        // save() {

        //     this.close();
        // },
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
