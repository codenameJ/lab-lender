<template>
    <div id="app">
        <v-content>
            <v-data-table :headers="headers" :items="users" class="elevation-1">
                <template v-slot:top>
                    <v-toolbar flat color="white">
                        <v-toolbar-title>User</v-toolbar-title>
                        <v-divider class="mx-4" inset vertical></v-divider>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialog" max-width="500px">
                            <template v-slot:activator="{ on }">
                                <v-btn
                                    color="primary"
                                    dark
                                    class="mb-2"
                                    v-on="on"
                                    >Add User</v-btn
                                >
                            </template>
                            <v-card>
                                <v-card-title>
                                    <span class="headline">{{
                                        formTitle
                                    }}</span>
                                </v-card-title>

                                <v-card-text>
                                    <v-container>
                                        <!-- <v-row>
                                            <v-col cols="12" sm="6" md="4">
                                                <v-text-field
                                                    v-model="editedItem.User_id"
                                                    label="User ID"
                                                ></v-text-field>
                                            </v-col> -->
                                            <v-col cols="12" sm="6" md="4">
                                                <v-text-field
                                                    v-model="editedItem.Name"
                                                    label="User Name"
                                                ></v-text-field>
                                            </v-col>
                                            <v-col cols="12" sm="6" md="4">
                                                <v-text-field
                                                    v-model="editedItem.Email"
                                                    label="E-mail"
                                                ></v-text-field>
                                            </v-col>
                                            <v-row>
                                            <v-col cols="12" sm="6" md="4">
                                                <v-text-field
                                                    v-model="editedItem.Password"
                                                    label="Password"
                                                    :type="value ? 'password' : 'text'"
                                                    :append-icon="value ? 'visibility' : 'visibility_off'"
                                                    @click:append="() => (value = !value)"
                                                ></v-text-field>
                                            </v-col>
                                            <v-col cols="12" sm="6" md="4">
                                                <v-text-field
                                                    v-model="editedItem.Phone"
                                                    label="Phone"
                                                ></v-text-field>
                                            </v-col>

                                            <v-col cols="12" sm="6" md="4">
                                                <v-select
                                                    v-model="editedItem.Activation"
                                                    :items="selectactivation"
                                                    label="Activation"
                                                    item-text="name"
                                                    return-object
                                                    chips
                                                ></v-select>
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
                                        @click="save"
                                        >Save</v-btn
                                    >
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
                <template v-slot:item.action="{ item }">
                    <v-icon small class="mr-2" @click="editItem(item)">
                        edit
                    </v-icon>
                    <v-icon small @click="deleteItem(item)">
                        delete
                    </v-icon>
                </template>
                <template v-slot:no-data>
                    <v-btn color="primary" @click="getUserData">Reset</v-btn>
                </template>
            </v-data-table>
        </v-content>
    </div>
</template>

<script>
export default {
    mounted() {
        this.getUserData();
    },
    data: () => ({
        // return {
        value: String,
        dialog: false,
        search: "",
        headers: [
            // { text: "ID", value: "User_id" },
            { text: "Name", value: "Name" },
            {
                text: "E-mail",
                align: "left",
                sortable: false,
                value: "Email"
            },
            { text: "Phone", value: "Phone" },
            { text: "Activation", value: "Activation" },
            // { text: "created at", value: "created_at" },
            // { text: "updated at", value: "updated_at" },
            { text: "Actions", value: "action", sortable: false }
        ],
        users: [],
        editedIndex: -1,
        editedItem: {
            User_id: 0,
            Name: "",
            Email: "",
            Phone: 0,
            Activation:"",
        },
        defaultItem: {
            User_id: 0,
            Name: "",
            Email: "",
            Phone: 0,
            Activation:"",
        },
        selectactivation: ['Yes','No']
        // },
    }),

    computed: {
        formTitle() {
            return this.editedIndex === -1 ? "New User" : "Edit User";
        },
        filterUser: function() {
            return this.users.filter(us => {
                return us.Name.match(this.search);
            });
        }
    },

    watch: {
        dialog(val) {
            val || this.close();
        }
    },

    created() {
        this.getUserData();
    },

    methods: {
        getUserData() {
            axios.get("api/user").then(Response => {
                this.users = Response.data;
                console.log(this.users);
            });
        },

        editItem(item) {
            this.editedIndex = this.users.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },

        deleteItem(item) {
            const index = this.users.indexOf(item.User_id);
            confirm("Are you sure you want to delete this item?") &&
                this.users.splice(index, 1);

            axios
                .delete("api/user/" + item.User_id)
                .then(response => console.log(response.data));
        },

        close() {
            this.dialog = false;
            setTimeout(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            }, 300);
        },

        save() {
            if (this.editedIndex > -1) {
                Object.assign(this.users[this.editedIndex], this.editedItem);
                axios
                    .put("api/user/" + this.editedItem.User_id, this.editedItem)
                    .then(response => console.log(response.data));
            } else {
                // this.users.push(this.editedItem);
                axios
                    .post("api/user", this.editedItem)
                    .then(response => console.log(response.data));

                location.reload();
            }
            this.close();
        }
    }
};
</script>
