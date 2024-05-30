<template>
  <header class="header">

    <h1 @click="goHome()" class="title">CAR RENTAL</h1>
    <div class="button-container">
    <button @click="goToRentals()" class="login-button">Rentals</button>
      <button @click="goToLogin()" v-if="!isAuthenticated" class="login-button">Login</button>
      <button @click="goToRegister()" v-if="!isAuthenticated" class="login-button">Register</button>
      <button @click="goToLogout()" v-if="isAuthenticated" class="login-button">Logout</button>

    </div>

  </header>
</template>

<script>

import { mapGetters, mapActions } from 'vuex';

export default {
  name: "Header",
  computed: {
    ...mapGetters(['isAuthenticated']),

  },

  methods: {
    ...mapActions(['logout']),
    goToRentals() {
      this.$router.push('/rental');
    },
    goHome() {
      this.$router.push('/');
    },
    goToLogin() {
      this.$router.push('/login');
    },
    goToRegister() {
      this.$router.push('/register');
    },
    async goToLogout() {
      const confirmed = confirm("Are you sure you want to log out?");
      if (confirmed) {
        await this.logout();
        this.$router.push('/');
      }
    }
  }
};
</script>

<style scoped>
.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #6363cb;
  padding: 10px;
  position: fixed;
  width: 100%;
  top: 0;
  left: 0;
  z-index: 1000;
  height: 7%;
}

.button-container {
  display: flex;
  gap: 10px;
}


.title {
  margin: 0;
  color: white;
}

.login-button {
  padding: 10px 20px;
  cursor: pointer;
  box-shadow: none;
  border: none;
  color: white;
  background-color: #6363cb;
}

</style>

