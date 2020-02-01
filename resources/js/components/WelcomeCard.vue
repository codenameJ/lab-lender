<template>
    <v-card class="mx-auto p-4" width="1500" height="700">
        <v-card-text>
            <!-- <div>Word of the Day display-1</div> -->
            <h1
                style="text-align:center;"
                class="font-weight-bold text--primary"
            >
                Lab Lender
            </h1>
            <h4 class="mb-3" style="text-align:center;">
                web application that help you find and lend all equipments in
                the laboratory
            </h4>
            <v-container class="justify-center">
                <center>
                    <v-img
                        class="mt-3 "
                        src="/img/welcome-vector.png"
                        max-width="80%"
                        max-height="80%"
                    />
                </center>
            </v-container>

            <div style="text-align:right;" class="text--primary">
                <!-- Before lending, you should login first -->

                <br />
                <v-btn
                    style="text-decoration : none; color : #000000;"
                    href="/login"
                    class="justify-right"
                    large
                    outlined color="success"
                >
                    LOGIN WITH CMU ACCOUNT
                </v-btn>
            </div>
        </v-card-text>
    </v-card>
</template>
