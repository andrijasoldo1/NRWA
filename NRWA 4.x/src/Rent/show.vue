<template>
  <div class="container">
    <button class="goBack" @click="goBack()">Go Back</button>
    <h1>Rental Details</h1>
    <button class="create-button editDel" @click="editItem()">Edit</button>
    <button class="create-button editDel" @click="deleteItem()">Delete</button>
    <div class="details-container">
      <div class="detail-group">
        <label for="car">Car</label>
        <p id="car">{{ rental.car.brand }} - {{ rental.car.model }} ({{ rental.car.year }})</p>
      </div>
      <div class="detail-group">
        <label for="bank">Bank</label>
        <p id="bank">{{ rental.bill?.bank?.name }}</p>
      </div>
      <div class="detail-group">
        <label for="bank">Total</label>
        <p id="bank">{{ rental.bill?.total }} €</p>
      </div>


      <div class="detail-group">
        <label for="user">User</label>
        <p id="user">{{ rental.bill?.user?.name }} ({{ rental.bill?.user?.email }})</p>
      </div>

      <div class="detail-group">
        <label for="start_date">Start date</label>
        <p id="start_date">{{ rental.start_date }}</p>
      </div>
      <div class="detail-group">
        <label for="end_date">End date</label>
        <p id="end_date">{{ rental.end_date }}</p>
      </div>
      <div class="detail-group">
        <label for="status">Status</label>
        <p id="status">{{ rental.bill?.status }}</p>
      </div>

    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "show",
  data() {
    return {
      rental: {
        car: {},
        bill: {
          bank: {},
          user: {},
        }
      },
    };
  },
  mounted() {
    this.fetchRentalDetails();
  },
  methods: {
    goBack() {
      this.$router.go(-1);
    },
    editItem() {
      this.$router.push(`/rental/edit/${this.rental.id}`);
    },
    deleteItem() {

      const confirmed = confirm("Are you sure you want to delete this rental?");
      if (confirmed) {
        axios.delete(`/api/rental/${this.rental.id}`).then(() => {

          this.$router.push(`/rental`);

        });
      }
    },
    async fetchRentalDetails() {
      const rentalId = this.$route.params.id;
      try {
        const response = await axios.get(`/api/rentals/${rentalId}`);
        this.rental = response.data;
      } catch (error) {
        console.error('Error fetching rental details:', error);
      }
    },
  },
};
</script>

<style scoped>
.create-button{
  border: #6363cb 2px solid;
  color: #6363cb;
  width: 300px;
}
.editDel{
  padding: 10px;
  border-radius:7px ;
  margin-right:10px;
  margin-bottom: 10px;
}

.container {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  padding-top: 60px;
}

.details-container {
  width: 100%;
  max-width: 50%;
  display: flex;
  flex-direction: column;
}

.detail-group {
  width: 100%;
  margin-bottom: 20px;
}

.detail-group label {
  font-weight: bold;
  margin-bottom: 5px;
  display: block;
}

.detail-group p {
  background-color: #f9f9f9;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
}
.goBack{


  border: #6363cb 2px solid;
  border-radius: 5px;
  padding: 5px;
  color: #6363cb;
  width: 100px;
}

@media (min-width: 768px) {
  .details-container {
    max-width: 50%;
  }
}
</style>
