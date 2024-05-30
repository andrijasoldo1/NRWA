<template>
  <div class="container" v-if="getUser?.role_id === 2">
    <h1>Create new rental</h1>
    <div class="form-container">
      <div class="form-group">
        <label for="car">Car</label>
        <select class="form-control" id="car" v-model="selectedCar" :disabled="showCarForm">
          <option  value="" selected >Select car</option>
          <option v-for="car in cars" :key="car.id" :value="car.id">
            {{ car.brand }} - {{ car.model }}({{ car.year }})
          </option>
        </select>

        <button class="btn btn-secondary" @click="showCarForm = true" v-if="!showCarForm">Add new car +</button>
      </div>
      <div v-if="showCarForm" class="form-group">
        <label for="license_plate">License Plate</label>
        <input type="text" class="form-control" id="license_plate" v-model="newCar.license_plate">
      </div>
      <div v-if="showCarForm" class="form-group">
        <label for="model">Model</label>
        <input type="text" class="form-control" id="model" v-model="newCar.model">
      </div>
      <div v-if="showCarForm" class="form-group">
        <label for="brand">Brand</label>
        <input type="text" class="form-control" id="brand" v-model="newCar.brand">
      </div>
      <div v-if="showCarForm" class="form-group">
        <label for="color">Color</label>
        <input type="text" class="form-control" id="color" v-model="newCar.color">
      </div>
      <div v-if="showCarForm" class="form-group">
        <label for="year">Year</label>
        <input type="text" class="form-control" id="year" v-model="newCar.year">
      </div>
      <div v-if="showCarForm" class="form-group">
        <button class="btn btn-secondary" @click="showCarForm = false">Cancel</button>
      </div>


      <div class="form-group">
        <label for="bank">Bank</label>
        <select class="form-control" id="bank" v-model="selectedBank" :disabled="showBankForm">
          <option disabled value="">Select bank</option>
          <option v-for="bank in banks" :key="bank.id" :value="bank.id">
            {{ bank.name }}
          </option>
        </select>
        <button class="btn btn-secondary" @click="showBankForm = true" v-if="!showBankForm">Add new bank +</button>
      </div>

      <div v-if="showBankForm" class="form-group">
        <label for="bank_name">Bank Name</label>
        <input type="text" class="form-control" id="bank_name" v-model="newBank.name">
        <label for="code">Code</label>
        <input type="expiry_date" class="form-control" id="code" v-model="newBank.expiry_date">
        <label for="expiry_date">Expire date</label>
        <input type="text" class="form-control" id="bank_name" v-model="newBank.name">
        <label for="cvv">CVV</label>
        <input type="text" class="form-control" id="cvv" v-model="newBank.cvv">
        <button class="btn btn-secondary" @click="showBankForm = false">Cancel</button>
      </div>
      <div class="form-group">
        <label for="bank">Start date</label>
       <input type="date" class="form-control" id="bank" v-model="start_date">
       <label for="bank">End date</label>
       <input type="date" class="form-control" id="bank" v-model="end_date">
       <label for="bank">Total €</label>
       <input type="number" class="form-control" id="bank" v-model="total">
       <label for="bank">Status</label>
        <select class="form-control" id="bank" v-model="status" >
          <option  value="pending">Pending</option>
          <option  value="paid">Paid</option>
          <option  value="cancelled">Cancelled</option>
          <option  value="completed">Completed</option>
          <option  value="refunded">Refunded</option>
          <option value="expired">Expired</option>
          <option value="rejected">Rejected</option>
          <option value="waiting">Waiting</option>          
        </select>
        <button class="btn btn-secondary" @click="submitForm">Submitt form</button>
      </div>
    </div>
  </div>
  <div class="container" v-else>
    <h1>Access denied</h1>
  </div>
</template>

<script>
import axios from "axios";
import { mapGetters } from "vuex";
export default {
  name: "create",
  data() {
    return {
      showCarForm: false,
      newCar: {
        license_plate: '',
        model: '',
        brand: '',
        color: '',
        year: '',
        user_id: 1
      },
      cars: [],
      banks: [],
      selectedCar: null,
      selectedBank: null,
      showBankForm: false,
      newBank: {
        name: '',
        cvv: '',
        expiry_date: '',
        code: ''
      },
      status: '',
      start_date: '',
      end_date: '',
      total: '',
      
    };
  },
  created() {
    this.getData();
  },
  computed: {
    ...mapGetters(["getUser"]),
  },
  methods: {
    async getData() {
      axios.get('/api/getForCreate').then((response) => {
        this.cars = response.data.cars;
        this.banks = response.data.banks;
      });
    },
    async submitForm() {
      let data = {};
      console.log(this.selectedCar);
      if(this.selectedCar == null && this.selectedBank!==null){
        console.log(this.newCar);
       data = {
        car: this.newCar,
        bank_id: this.selectedBank,
        start_date: this.start_date,
        end_date: this.end_date,
        total: this.total,
        status: this.status,
        user_id: 1
      }; 
      }else if (this.selectedCar !== null && this.selectedBank==null){
       data = {
        car_id: this.selectedCar,
        start_date: this.start_date,
        end_date: this.end_date,
        total: this.total,
        status: this.status,
        bank: this.newBank,
        user_id: 1
      };
    }else if(this.selectedCar == null && this.selectedBank==null){
      data = {
        start_date: this.start_date,
        end_date: this.end_date,
        total: this.total,
        status: this.status,
        car: this.newCar,
        bank: this.newBank,
        user_id: 1
      };

    }else{
      console.log('tu');
       data = {
        car_id: this.selectedCar,
        bank_id: this.selectedBank,
        start_date: this.start_date,
        end_date: this.end_date,
        total: this.total,
        status: this.status,
        user_id: 1
      };
    }
      axios.post('/api/rentals', data).then((response) => {
        console.log(response);
        this.$router.push('/rental');
      });

    },
    addCar() {
      this.newCar = {
        license_plate: '',
        model: '',
        brand: '',
        color: '',
        year: '',
        user_id: null
      };
      this.showCarForm = false;
      this.selectedCar = null;
    },
   
  },
};
</script>

<style scoped>
.container {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  padding-top: 60px; 
}

.form-container {
  width: 100%;
  max-width: 50%; 
}

.form-group {
  width: 100%;
  margin-bottom: 20px;
}

.form-control {
  width: 100%;
  padding: 7px;
  border: 1px solid #6363cb;
  border-radius: 5px;
}

.btn {
  width: 100%; 
  padding: 7px 20px;
  border: 1.5px solid #6363cb;
  border-radius: 5px;
  margin-top: 10px;
}

@media (min-width: 768px) {
  .form-container {
    max-width: 50%;
  }
}

</style>
