<template>
    <div id="app">
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
                    :items="filterEquip"
                    class="elevation-1"
                >
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
    methods: {
        getEquipData() {
            axios.get("api/equipment").then(Response => {
                this.equips = Response.data;
                console.log(this.equips);
            });
        }
    },
    data() {
        return {
            search: "",
            headers: [
                { text: "ID", value: "id" },
                { text: "Equip ID", value: "Equip_id" },
                {
                    text: "Equip Name",
                    align: "left",
                    sortable: false,
                    value: "Equip_Name"
                },
                { text: "Qty", value: "Equip_Num" },
                { text: "Lab", value: "Lab_id" },
                { text: "created at", value: "created_at" },
                { text: "updated at", value: "updated_at" }
            ],
            equips: []
        };
    },
    computed: {
        filterEquip: function() {
            return this.equips.filter(eq => {
                return eq.Equip_Name.match(this.search);
            });
        }
    }
};
</script>
