<template>    
    <div class="exec">        
        <form>
            <div class="form-group mb-4">
            <input type="hidden" name="_token" :value="csrf" />
            <input type="text" v-model="city" placeholder="Enter City" class="dropdown-toggle px-3 py-2 border border-solid border-gray-300 rounded w-96 mb-4" />
            <button v-on:click="getWeather" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Display Weather</button>
            </div>
        </form>

        <div class="flex-1 flex-wrap gap-2 sm:flex sm:flex-row" v-if="showResult">
            <div class="mb-4">
                <h2 class="uppercase bg-gray-400 p-2 text-white text-center">Date</h2>
                <p class="px-3 text-center text-gray-600">{{ w_date }}</p>
            </div>

            <div class="mb-4">
                <h2 class="uppercase bg-gray-400 p-2 text-white text-center">Temp</h2>
                <p class="px-3 text-center text-gray-600">{{ w_temp }}&#8457;</p>
            </div>            

            <div class="mb-4">
                <h2 class="uppercase bg-gray-400 p-2 text-white text-center">Description</h2>
                <p class="px-3 text-center text-gray-600">{{ w_desc }}</p>
            </div>            

            <div class="mb-4">
                <h2 class="uppercase bg-gray-400 p-2 text-white text-center">Pressure</h2>
                <p class="px-3 text-center text-gray-600">{{ w_pressure }}</p>             
            </div>            

            <div class="mb-4">
                <h2 class="uppercase bg-gray-400 p-2 text-white text-center">Humidity</h2>
                <p class="px-3 text-center text-gray-600">{{ w_humidity }}</p>
            </div>            
        </div>

        <div class="text-red-600" v-if="showErr">
            <p>{{ err_msg }}</p>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return { 
                showResult: false,
                showErr: false,
                csrf: document.head.querySelector('meta[name="csrf-token"]').content,
                city: '',
                w_date: '',
                w_temp: '',
                w_desc: '',
                w_pressure: '',
                w_humidity: '',
                err_msg: '',
            }
        },
        mounted() {
            this.weather_apikey = process.env.MIX_WEATHER_KEY;            
        },
        methods: {
            getWeather: function(e) {
                e.preventDefault();   
                

                axios.get('https://api.weatherapi.com/v1/current.json', {
                    params: {
                        key: this.weather_apikey,
                        q: this.city,
                    }
                })
                .then(response => {

                    this.w_date = response.data.current.last_updated;
                    this.w_temp = response.data.current.temp_f;
                    this.w_desc = response.data.current.condition.text;
                    this.w_pressure = response.data.current.pressure_mb;
                    this.w_humidity = response.data.current.humidity;
                    this.showResult = true;
                    this.showErr = false;                                        
                    
                })
                .catch((error) => {                  
                    this.showResult = false;
                    this.showErr = true;
                    this.err_msg = error.response.data.error.message;                    
                });

            }
        }
    }
</script>