<template>
  <div class="container">
    <h1>Logout</h1>
    <div class="form-container">
      <form @submit.prevent="logout">
        <h4>Jeste li sigurni da se želite odjaviti</h4>
        <button type="submit" class="submit-button">Logout</button>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: "Logout",
  methods: {
    logout() {
      axios.post('/logout')
          .then((response) => {
            alert(response.data);
            this.$router.push('/');
          })
          .catch(error => {
            alert(error.response.data);
          });
    }
  }
}
</script>

<style scoped>
.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 60vh;
}

h1 {
  margin-bottom: 50px;
}

.form-container {
  width: 100%;
  max-width: 400px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  background-color: #fff;
}

.input-group {
  margin-bottom: 20px;
}

.input-group label {
  display: block;
  margin-bottom: 5px;
}

.input-group input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.submit-button {
  width: 100%;
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #6363cb;
  color: #fff;
  cursor: pointer;
}

.submit-button:hover {
  background-color: #5050a7;
}
</style>
