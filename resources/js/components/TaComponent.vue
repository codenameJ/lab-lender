<template>
    <div id="app">
        <v-content>
            <v-data-table :headers="headers" :items="tas" class="elevation-1">
                <template v-slot:top>
                    <v-toolbar flat color="white">
                        <v-toolbar-title>TA</v-toolbar-title>
                        <v-divider class="mx-4" inset vertical></v-divider>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialog" max-width="500px">
                            <template v-slot:activator="{ on }">
                                <v-btn
                                    color="primary"
                                    dark
                                    class="mb-2"
                                    v-on="on"
                                    >Add TA</v-btn
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
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field
                                                v-model="editedItem.TA_Name"
                                                label="TA Name"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field
                                                v-model="editedItem.Lab_id"
                                                label="Lab ID"
                                            ></v-text-field>
                                        </v-col>
                                        
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
                    <v-btn color="primary" @click="getTaData">Reset</v-btn>
                </template>
            </v-data-table>
        </v-content>
    </div>
</template>

<script>
export default {
    mounted() {
        this.getTaData();
    },
    data: () => ({
        // return {
        value: String,
        dialog: false,
        search: "",
        headers: [
            { text: "User ID", value: "client_id" },
            {
                text: "TA Name",
                align: "left",
                sortable: false,
                value: "TA_Name"
            },
            { text: "Lab ID", value: "Lab_id" },
            // { text: "created at", value: "created_at" },
            // { text: "updated at", value: "updated_at" },
            { text: "Actions", value: "action", sortable: false }
        ],
        tas: [],
        editedIndex: -1,
        editedItem: {
            TA_Name: "",
            Lab_id: 0,
            client_id: 0,
        },
        defaultItem: {
            TA_Name: "",
            Lab_id: 0,
            client_id: 0,
        },
        selectactivation: ["Yes", "No"],
        selecttype: [ "student", "ta", "admin"],
        // },
    }),

    computed: {
        formTitle() {
            return this.editedIndex === -1 ? "New TA" : "Edit TA";
        },
        filterStudnet: function() {
            return this.tas.filter(ta => {
                return ta.Name.match(this.search);
            });
        }
    },

    watch: {
        dialog(val) {
            val || this.close();
        }
    },

    created() {
        this.getTaData();
    },

    methods: {
        getTaData() {
            axios.get("/api/ta").then(Response => {
                this.tas = Response.data;
                console.log(this.tas);
            });
        },

        editItem(item) {
            this.editedIndex = this.tas.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },

        deleteItem(item) {
            const index = this.tas.indexOf(item.TA_id);
            confirm("Are you sure you want to delete this item?") &&
                this.tas.splice(index, 1);

            axios
                .delete("/api/ta/" + item.TA_id)
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
                Object.assign(this.tas[this.editedIndex], this.editedItem);
                axios
                    .put("/api/ta/" + this.editedItem.TA_id, this.editedItem)
                    .then(response => console.log(response.data));
            } else {
                this.tas.push(this.editedItem);
                axios
                    .post("/api/ta", this.editedItem)
                    .then(response => console.log(response.data));

                // location.reload();
            }
            this.close();
        }
    }
};
</script>
