<template>
    <div id="app">
        <v-content>
            <v-data-table :headers="headers" :items="students" class="elevation-1">
                <template v-slot:top>
                    <v-toolbar flat color="white">
                        <v-toolbar-title>Student</v-toolbar-title>
                        <v-divider class="mx-4" inset vertical></v-divider>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialog" max-width="500px">
                            <template v-slot:activator="{ on }">
                                <v-btn
                                    color="primary"
                                    dark
                                    class="mb-2"
                                    v-on="on"
                                    >Add Student</v-btn
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
                                                v-model="editedItem.Student_Name"
                                                label="Student Name"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field
                                                v-model="editedItem.Student_id"
                                                label="Student ID"
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
                    <v-btn color="primary" @click="getStudentData">Reset</v-btn>
                </template>
            </v-data-table>
        </v-content>
    </div>
</template>

<script>
export default {
    mounted() {
        this.getStudentData();
    },
    data: () => ({
        // return {
        value: String,
        dialog: false,
        search: "",
        headers: [
            { text: "User ID", value: "client_id" },
            { text: "Student ID", value: "Student_id" },
            {
                text: "Student Name",
                align: "left",
                sortable: false,
                value: "Student_Name"
            },
            // { text: "created at", value: "created_at" },
            // { text: "updated at", value: "updated_at" },
            { text: "Actions", value: "action", sortable: false }
        ],
        students: [],
        editedIndex: -1,
        editedItem: {
            Sutdent_id: 0,
            Student_Name: "",
            client_id: 0,
        },
        defaultItem: {
            Sutdent_id: 0,
            Student_Name: "",
            client_id: 0,
        },
        selectactivation: ["Yes", "No"],
        selecttype: [ "student", "ta", "admin"],
        // },
    }),

    computed: {
        formTitle() {
            return this.editedIndex === -1 ? "New Student" : "Edit Student";
        },
        filterStudnet: function() {
            return this.students.filter(st => {
                return st.Name.match(this.search);
            });
        }
    },

    watch: {
        dialog(val) {
            val || this.close();
        }
    },

    created() {
        this.getStudentData();
    },

    methods: {
        getStudentData() {
            axios.get("/api/student").then(Response => {
                this.students = Response.data;
                console.log(this.students);
            });
        },

        editItem(item) {
            this.editedIndex = this.students.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },

        deleteItem(item) {
            const index = this.students.indexOf(item.Student_id);
            confirm("Are you sure you want to delete this item?") &&
                this.students.splice(index, 1);

            axios
                .delete("/api/student/" + item.Student_id)
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
                Object.assign(this.students[this.editedIndex], this.editedItem);
                axios
                    .put("/api/student/" + this.editedItem.Student_id, this.editedItem)
                    .then(response => console.log(response.data));
            } else {
                this.students.push(this.editedItem);
                axios
                    .post("/api/student", this.editedItem)
                    .then(response => console.log(response.data));

                // location.reload();
            }
            this.close();
        }
    }
};
</script>
