<template>
    <div id="app">
        <!-- <v-app>
            <v-content>
                <table class="table table-bordered">
               <tr>
                   <th>id</th>
                   <th>Name</th>
                   <th>Qty</th>
                   <th>Lab</th>
                   <th>Created At</th>
                   <th>Updated At</th>
               </tr>
               <tr v-for="e in equip">
                   <td>{{e.Equip_id}}</td>
                   <td>{{e.Equip_Name}}</td>
                   <td>{{e.Equip_Num}}</td>
                   <td>{{e.Lab_id}}</td>
                   <td>{{e.created_at}}</td>
                   <td>{{e.updated_at}}</td>
               </tr>
               </table>
            </v-content>
        </v-app> -->
        <v-content>
            <v-card>
                <v-card-title>
                    Equipment List
                    <v-spacer></v-spacer>
                    <v-text-field
                        v-model="search"
                        append-icon="search"
                        label="Search"
                        single-line
                        hide-details
                    ></v-text-field>
                </v-card-title>
                <v-data-table
                    :headers="headers"
                    :items="equip"
                    :search="search"
                ></v-data-table>
            </v-card>
        </v-content>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("OK");
        this.getEquipData();
    },
    methods: {
        getEquipData() {
            axios.get("api/equipment").then(Response => {
                this.equip = Response.data;
            });
        }
    },
    data() {
        return {
            search: "",
            headers: [
                { text: "ID", value: "Equip_id" },
                {
                    text: "Equip_Name",
                    align: "left",
                    sortable: false,
                    value: "name"
                },
                { text: "Qty", value: "Equip_num" },
                { text: "Lab", value: "Lab_id" },
                { text: "Created at", value: "created_at" },
                { text: "Updated at", value: "updated_at" }
            ],
            equip: [],
            equip: {
                Equip_id: 0,
                Equip_Name: "",
                Equip_num: "",
                Lab_id: "",
                created_at: "",
                updated_at: ""
            }
        };
    }
};
</script>
