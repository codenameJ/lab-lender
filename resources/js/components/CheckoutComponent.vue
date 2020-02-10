<template>
    <div id="app">
        <v-content>
            <v-card class="mx-auto" max-width="600">
                <p>{{ userid }}</p>
                <v-data-table
                    :headers="headers"
                    :items="carts"
                    hide-default-footer
                    class="elevation-1 txt-title"
                >
                    <template v-slot:item.action="{ item }">
                        <v-btn
                            small
                            rounded
                            class="button-btn-gradient elevation-2"
                            color="success"
                            @click="removeCart(item)"
                        >
                            Delete
                        </v-btn>
                    </template>
                </v-data-table>
            </v-card>
            <v-row justify-center>
                <v-spacer></v-spacer>
                <v-col cols="3" sm="1">
                    <v-btn
                        small
                        rounded
                        class="button-btn-gradient elevation-2"
                        color="success"
                        @click="cancleCheckout(carts)"
                    >
                        Cencled
                    </v-btn>
                </v-col>
                <v-col cols="3">
                    <v-btn
                        small
                        rounded
                        class="button-btn-gradient elevation-2"
                        color="success"
                        @click="StoreRequest()"
                    >
                        Request
                    </v-btn>
                </v-col>
            </v-row>
        </v-content>
    </div>
</template>

<script>
export default {
    props: {userid: 0,},
    mounted() {
        console.log(this.userid);
    },
    data: () => ({
        headers: [
            {
                text: "Equip Name",
                align: "left",
                sortable: false,
                value: "Equip_Name"
            },
            { text: "Qty", value: "amount" },
            { text: "Actions", value: "action", sortable: false }
        ],
        carts: []
    }),

    computed: {},

    created() {
        this.viewCart();
    },

    methods: {
        viewCart() {
            if (localStorage.getItem("carts")) {
                this.carts = JSON.parse(localStorage.getItem("carts"));
                this.badge = this.carts.length;
            }
        },
        removeCart(pro) {
            this.carts.splice(pro, 1);
            this.storeCart();
        },
        storeCart() {
            let parsed = JSON.stringify(this.carts);
            localStorage.setItem("carts", parsed);
            this.viewCart();
        },
        cancleCheckout(carts) {
            this.carts.splice(0, carts.length);
            this.storeCart();
            window.location.href = "/equipment";
        },
        StoreRequest() {
            axios
                .post("/api/request", {
                    userid: this.userid
                })
                .then(response => console.log(response.data));
        }
    }
};
</script>

<style scoped>
.button-btn-gradient {
    background-color: #0c0b0b;
    background-image: linear-gradient(to bottom, #2ad4d9, #2ad4a9);
    font-weight: bold;
}
</style>
