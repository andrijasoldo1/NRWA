<template>
  <div class="container">
    <h1>Rental Index</h1>
    <button v-if="getUser?.role_id === 2" class="create-button editDel" @click="createItem()">+ Create +</button>
    <table class="table">
      <thead>
        <tr style="color: #6363cb;">
          <th>ID</th>
          <th>Start date</th>
          <th>End date</th>
          <th>Status</th>
          <th>User</th>
          <th>Car</th>
          <th>Car license plate</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="rental in rentals" :key="rental.id">
          <td>{{ rental.id }}</td>
          <td>{{ rental.start_date }}</td>
          <td>{{ rental.end_date }}</td>
          <td>{{ rental.bill.status }}</td>
          <td>{{ rental.bill.user?.name }}</td>
          <td>{{ rental.car.brand }} - {{ rental.car.model }}</td>
          <td>{{ rental.car.license_plate }}</td>
          <td>

            <button @click="showMore(rental)" class="editDel" style="border: #6363cb 2px solid; color: #6363cb;">Show more</button>
            <button v-if="getUser?.role_id === 2" @click="editItem(rental)" class="editDel" style="border: #6363cb 2px solid; color: #6363cb;">Edit</button>
            <button v-if="getUser?.role_id === 2"  @click="deleteItem(rental)" class="editDel" style="border: red 2px solid;color: red;">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";
import { mapGetters } from "vuex";
export default {
  name: "RentalIndex",
  data() {
    return {
      rentals: [],
    }
  },
  computed: {
    ...mapGetters(["getUser"]),
  },
  mounted() {
    this.getRentals()
  },
  methods: {
    async getRentals() {
      axios.get('/api/rentals').then((response) => {
        this.rentals = response.data
      })
    },
    editItem(item) {
      this.$router.push(`/rental/edit/${item.id}`);
    },showMore(item) {
      this.$router.push(`/rental/${item.id}`);
    },
    createItem() {
      this.$router.push('/rental/create');
    },
    deleteItem(item) {
      axios.delete(`/api/rental/${item.id}`).then(() => {
        this.getRentals();
      });
    }
  }
}
</script>

<style scoped>
.container {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding-top: 60px; 
}

.table {
  width: 80%;
  margin-top: 20px; 
  border-collapse: collapse;
}
.table th {
  border-bottom: 2px solid #6363cb;
  background-color: #ececf9;
  text-align: left;
}
.table td, .table th {
  padding: 10px 0;
}

.table td {
  border-top: 1px solid #6363cb;
  border-bottom: 1px solid #6363cb;
}

.table tr:last-child td {
  border-bottom: none;
}
.editDel{
  padding: 10px;
  border-radius:7px ;
  margin-right:10px;
}
.create-button{
  border: #6363cb 2px solid;
  color: #6363cb;
  width: 300px;
}
</style>