<template>
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" v-if="loading === false">
                <div class="card">
                    <div class="card-header">Clima da Região</div>

                    <div class="card-body">
                        <h1>{{ info.temp }}°C</h1>
                        <h2>{{ info.city }}</h2>
                        <h4>{{ info.description }}</h4>
                        <p><small>{{ info.date }} - Última atualização às {{ info.time }}h</small></p>
                    </div>
                </div>
            </div>

            <div class="spinner-border" role="status" v-if="loading === true">
                <span class="visually-hidden">Loading...</span>
            </div>

        </div>
    </main>
</template>

<script>
export default {
    data () {
        return {
            info: null,
            loading: true,
        }
    },
    created: function(){
        this.getWeather();
    },
    methods: {
        getWeather() {
            axios.get("/api/weather")
            .then(response => {
                this.info = response.data
                this.loading = false
            })
        }
    }
}
</script>

<style>

</style>
