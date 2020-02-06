<template>
    <v-card class="mx-auto" max-width="1500">
        <v-col cols="12" rows="5">
            <v-textarea color="teal">
                <template v-slot:label>
                    <div>
                        Type something...
                    </div>
                </template>
            </v-textarea>
        </v-col>
        <v-card-actions>
        <v-spacer></v-spacer>
            <v-btn
                permanent
                right
                text
                type="submit"
                class="button-btn-gradient mr-1"
                style="text-decoration : none; color : #FFFFFF; "
                >Post</v-btn
            ></v-card-actions>
    </v-card>
</template>

<style scoped>
.button-btn-gradient {
    background-color: #0c0b0b;
    background-image: linear-gradient(to bottom, #2ad4d9, #2ad4a9);
    font-weight: bold;
}
</style>
