<template>
  <div class="container" v-if="getUser?.role_id === 2">
    <h1>Rental Edit</h1>
    <div class="form-container">
      <div class="form-group">
        <label for="car">Car</label>
        <select class="form-control" id="car" v-model="selectedCar">
          <option disabled value="">Select car</option>
          <option v-for="car in cars" :key="car.id" :value="car.id">
            {{ car.brand }} - {{ car.model }}({{ car.year }})
          </option>
        </select>
      </div>

      <button class="btn btn-secondary" @click="showCarForm = true" v-if="!showCarForm">Add new car +</button>

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
        <select class="form-control" id="bank" v-model="selectedBank">
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
        <label for="start_date">Start date</label>
        <input type="date" class="form-control" id="start_date" v-model="start_date">
      </div>

      <div class="form-group">
        <label for="end_date">End date</label>
        <input type="date" class="form-control" id="end_date" v-model="end_date">
      </div>

      <div class="form-group">
        <label for="total">Total €</label>
        <input type="number" class="form-control" id="total" v-model="total">
      </div>

      <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" id="status" v-model="status">
          <option value="pending">Pending</option>
          <option value="paid">Paid</option>
          <option value="cancelled">Cancelled</option>
          <option value="completed">Completed</option>
          <option value="refunded">Refunded</option>
          <option value="expired">Expired</option>
          <option value="rejected">Rejected</option>
          <option value="waiting">Waiting</option>          
        </select>
      </div>

      <button class="btn btn-secondary" @click="submitForm">Update</button>
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
  name: "edit",
  computed: {
    ...mapGetters(["getUser"]),
  },
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
      showBankForm: false,
      newBank: {
        name: '',
        cvv: '',
        expiry_date: '',
        code: ''
      },
      cars: [],
      banks: [],
      selectedCar: null,
      selectedBank: null,
      start_date: '',
      end_date: '',
      total: '',
      status: ''
    };
  },
  created() {
    this.getData();
    this.getDataBillCar();

  },
  methods: {
    async getDataBillCar() {
      axios.get('/api/getForCreate').then((response) => {
        this.cars = response.data.cars;
        this.banks = response.data.banks;
      });
    },
    async getData() {
let rental_id = this.$route.params.id;
console.log(rental_id);
      axios.get('/api/rental/'+ rental_id).then((response) => {

        this.selectedCar = response.data.car_id;
        this.selectedBank = response.data.bill.bank_id;
        this.start_date = response.data.start_date;
        this.end_date = response.data.end_date;
        this.total = response.data.bill.total;
        this.status = response.data.bill.status;
      });
    },
    async submitForm() {
      let rental_id = this.$route.params.id;

      let data;
      if(this.newCar.license_plate !== '' && this.newBank.name===''){
        console.log(this.newCar);
        data = {
          car: this.newCar,
          bank_id: this.selectedBank,
          start_date: this.start_date,
          end_date: this.end_date,
          total: this.total,
          status: this.status,

        };
      }else if (this.newCar.license_plate === '' && this.newBank.name!==''){
        data = {
          car_id: this.selectedCar,
          start_date: this.start_date,
          end_date: this.end_date,
          total: this.total,
          status: this.status,
          bank: this.newBank,

        };
      }else if(this.newCar.license_plate !== '' && this.newBank.name!==''){
        data = {
          start_date: this.start_date,
          end_date: this.end_date,
          total: this.total,
          status: this.status,
          car: this.newCar,
          bank: this.newBank,

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

        };
      }


      axios.put(`/api/rentals/${rental_id}`, data).then((response) => {
        console.log(response);
        this.$router.push('/rental');
      });
    }
  }
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
