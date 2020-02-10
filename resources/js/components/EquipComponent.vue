<template>
    <div id="app">
        <v-content>
            <template>
                <v-col cols="12" sm="6" md="12">
                <v-dialog v-model="dialogcart" max-width="500px">
                    <template v-slot:activator="{ on }">
                        <v-radio-group row>
                            <v-spacer></v-spacer>
                        <v-btn v-on="on" class="mx-2 button-btn-gradient" fab dark default color="cyan">
                        
                            <v-badge  >
                                <span slot="badge">{{ badge }}</span>
                                <v-icon dark>shopping_cart</v-icon>
                            </v-badge>
                        </v-btn>
                        </v-radio-group>
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
                            <v-btn color="blue darken-1" text @click="closecart"
                                >Cancel</v-btn
                            >
                            <v-btn color="blue darken-1" style="text-decoration:none" href="/equipment/checkout"
                                >Check Out</v-btn
                            >
                        </v-card-actions>
                    </v-card>
                </v-dialog>
                </v-col>
            </template>
            <v-card>
                <v-data-table
                    :headers="headers"
                    :items="filterEquip"
                    class="elevation-1 txt-title"
                >
                    <template v-slot:top>
                        <v-toolbar flat color="white">
                            <v-toolbar-title>Equipments List</v-toolbar-title>
                            <v-spacer></v-spacer>

                            <v-text-field
                                v-model="search"
                                append-icon="search"
                                label="Search"
                                single-line
                                hide-details
                            ></v-text-field>

                            <v-dialog v-model="dialog" max-width="500px">
                                <v-card>
                                    <v-card-title>
                                        <span class="headline">Lend</span>
                                    </v-card-title>

                                    <v-card-text>
                                        <v-container>
                                            <v-row>
                                                <v-col cols="12" sm="6" md="4">
                                                    <v-text-field
                                                        :value="
                                                            editedItem.Equip_id
                                                        "
                                                        label="Equipment ID"
                                                        readonly
                                                    ></v-text-field>
                                                </v-col>
                                                <v-col cols="12" sm="6" md="4">
                                                    <v-text-field
                                                        :value="
                                                            editedItem.Equip_Name
                                                        "
                                                        label="Equipment Name"
                                                        readonly
                                                    ></v-text-field>
                                                </v-col>
                                                <v-col cols="12" sm="6" md="4">
                                                    <v-text-field
                                                        v-model="quantity"
                                                        value="0"
                                                        label="QTY"
                                                    ></v-text-field>
                                                </v-col>
                                            </v-row>
                                        </v-container>
                                    </v-card-text>
                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                        <v-btn
                                            color="blue darken-1"
                                            text
                                            @click="close"
                                            >Cancel</v-btn
                                        >
                                        <v-btn
                                            color="blue darken-1"
                                            text
                                            @click="addCart(editedItem)"
                                            >Lend</v-btn
                                        >
                                    </v-card-actions>
                                </v-card>
                            </v-dialog>
                        </v-toolbar>
                    </template>
                    <template v-slot:item.action="{ item }">
                        <v-btn
                            small
                            rounded
                            class="button-btn-gradient elevation-2"
                            color="success"
                            @click="editItem(item)"
                        >
                            <v-icon small class="mr-2" left
                                >add_circle_outline</v-icon
                            >
                            Lend
                        </v-btn>
                    </template>
                    <template v-slot:no-data>
                        <v-btn color="primary" @click="getEquipData"
                            >Reset</v-btn
                        >
                    </template>
                </v-data-table>
            </v-card>
        </v-content>
    </div>
</template>

<script>
export default {
    mounted() {
        this.getEquipData();
    },
    data: () => ({
        dialog: false,
        dialogcart: false,
        search: "",
        headers: [
            // { text: "ID", value: "id" },
            // { text: "Equip ID", value: "Equip_id" },
            {
                text: "Equip Name",
                align: "left",
                sortable: false,
                value: "Equip_Name"
            },
            { text: "Qty", value: "Equip_Num" },
            // { text: "Lab", value: "Lab_id" },
            // { text: "created at", value: "created_at" },
            // { text: "updated at", value: "updated_at" },
            { text: "Actions", value: "action", sortable: false }
        ],
        equips: [],
        editedIndex: -1,
        editedItem: {
            Equip_id: 0,
            Equip_Name: "",
            Equip_Num: 0,
            Lab_id: 0
        },
        defaultItem: {
            Equip_id: 0,
            Equip_Name: "",
            Equip_Num: 0,
            Lab_id: 0
        },
        carts: [],
        cartadd: {
            id: 0,
            Equip_id: 0,
            Equip_Name: "",
            amount: 0
        },
        badge: "0",
        quantity: "1"
    }),

    computed: {
        filterEquip: function() {
            return this.equips.filter(eq => {
                return eq.Equip_Name.match(this.search);
            });
        }
    },

    watch: {
        dialog(val) {
            val || this.close();
        }
    },

    created() {
        this.getEquipData();
        this.viewCart();
    },

    methods: {
        viewCart() {
            if (localStorage.getItem("carts")) {
                this.carts = JSON.parse(localStorage.getItem("carts"));
                this.badge = this.carts.length;
            }
        },
        addCart(pro) {
            this.cartadd.id = pro.id;
            this.cartadd.Equip_id = pro.Equip_id;
            this.cartadd.Equip_Name = pro.Equip_Name;
            this.cartadd.amount = this.quantity;
            this.carts.push(this.cartadd);
            this.cartadd = {};
            this.storeCart();
            this.close();
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

        getEquipData() {
            axios.get("api/equipment").then(Response => {
                this.equips = Response.data;
                console.log(this.equips);
            });
        },

        editItem(item) {
            this.editedIndex = this.equips.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },

        deleteItem(id, item) {
            const index = this.equips.indexOf(item);
            confirm("Are you sure you want to delete this item?") &&
                this.equips.splice(index, 1);

            axios
                .delete("api/equipment/" + item.id)
                .then(response => console.log(response.data));
        },

        close() {
            this.dialog = false;
        },
        closecart() {
            this.dialogcart = false;
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