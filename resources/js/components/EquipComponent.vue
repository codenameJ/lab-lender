<template>
    <div id="app">
        <v-app>
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
        </v-app>
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
                {
                    text: "Equipment Name",
                    align: "left",
                    sortable: false,
                    value: "name"
                },
                { text: "ID", value: 'id' },
                { text: "Qty", value: 'num' },
                { text: "Lab", value: 'lab' },
                { text: "Created at", value: 'createdat' },
                { text: "Updated at", value: 'updatedat' }
            ],
            equip: [],
            equip: {
                Equip_id: 0,
                Equip_Name: '',
                Equip_num: '',
                Lab_id: '',
                created_at:'',
                updated_at:''
            }
        };
    }
};
</script>
