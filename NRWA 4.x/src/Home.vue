<template>
 <div class="container">
    <div class="header">
    <h1>{{ message }}</h1>
  </div>

  
  <div class="search-container">
      <input v-model="searchTerm" type="text" placeholder="Search cars" style="padding: 10px; border: 1px solid #6363cb;border-radius: 5px;">
      <button @click="searchCars" style="padding: 10px; border: 1px solid #6363cb;border-radius: 5px;">Search</button>
    </div>

  <div class="container">
   
    <div class="card" v-for="car in cars" :key="car.id">
      <div class="card-body">
        <h5 class="card-title">{{ car.brand }} {{ car.model }}</h5>
        <p class="card-text">
          Year: {{ car.year }}<br>
          Color: {{ car.color }}<br>
          License Plate: {{ car.license_plate }}
        </p>
      </div>
    </div>
  </div>
 </div>
</template>
<script>
import axios from "axios";
export default {
  name: "Home",
  data() {
    return {
      message: "Welcome to the car rental app!",
      cars: [],
      searchTerm: ""
    };
  },
  methods: {
    async getData() {
      axios.get('/api/cars').then((response) => {
        this.cars = response.data;
      
      });
    },
    async searchCars() {
        if (this.searchTerm === "") {
        this.getData();
        }else{
      axios.get('/api/cars/search', { params: { q: this.searchTerm } }).then((response) => {
        this.cars = response.data;
      });}
    }
},
    mounted() {
      this.getData();
  },
};
</script>
<style>
.container {
  width: 100%;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  padding-top:60px ;
}

.search-container {
  width: 100%;
  display: flex;
  justify-content: flex-end;
  padding: 10px 0;
}
.card-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
}

.header h1, .header h2 {
    display: block;
}
.card-title {
  font-size: 1.5em;
  font-weight: bold;
  color:#6363cb;
}
.card {
  flex: 1 0 20%; 
  margin: 1em;
  box-sizing: border-box;
  border: 2px solid #6363cb;
  border-radius: 10px;
  padding: 2%;
}
</style>