<template>
  <div class="container">
    <h1>Register</h1>
    <div v-if="errorMessage" class="error-message">{{ errorMessage }}</div>

    <div class="form-container">
      <form @submit.prevent="submitRegister">
        <div class="input-group">
          <label for="name">Ime:</label>
          <input type="text" id="name" v-model="name" required>
        </div>
        <div class="input-group">
          <label for="email">Email:</label>
          <input type="text" id="email" v-model="email" required>
        </div>
        <div class="input-group">
          <label for="password">Password:</label>
          <input type="password" id="password" v-model="password" required>
        </div>
        <div class="input-group">
          <label for="password_confirmation">Password confirmation:</label>
          <input type="password" id="password_confirmation" v-model="password_confirmation" required>
        </div>
        <button type="submit" class="submit-button">Register</button>
      </form>
    </div>

    <!-- Gumb za prijavu putem Google-a -->
    <button @click="handleGoogleSignIn" class="google-signin-button">Sign in with Google</button>
  </div>
</template>

<script>
import axios from "axios";
import { mapActions } from "vuex";
import { googleAuthCodeLogin } from 'vue3-google-login';

export default {
  name: "Register",
  data() {
    return {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      errorMessage: '',
    };
  },
  methods: {
    ...mapActions(['register']),
    async submitRegister() {
      try {
        await this.register({ 
          name: this.name, 
          email: this.email, 
          password: this.password, 
          password_confirmation: this.password_confirmation 
        });
        this.$router.push('/');
      } catch (error) {
        this.errorMessage = error.response.data.message;
      }
    },
    async handleGoogleSignIn() {
      try {
        const googleUser = await googleAuthCodeLogin();
        if (googleUser) {
          // Koristite podatke iz googleUser za registraciju ili prijavu korisnika
          await this.register({
            name: googleUser.profileObj.name,
            email: googleUser.profileObj.email,
            // Možda nećete dobiti lozinku za Google OAuth prijavu
            // Morat ćete smisliti način kako se nositi s tim
          });
          this.$router.push('/');
        }
      } catch (error) {
        console.error(error);
      }
    }
  }
}
</script>

<style scoped>
.error-message {
  color: red;
  margin-bottom: 2px;
}
.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;

}

h1 {
  margin-bottom: 20px;
}

.form-container {
  width: 100%;
  max-width: 400px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

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

.google-signin-button {
  margin-top: 10px;
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #dd4b39;
  color: #fff;
  cursor: pointer;
}

.google-signin-button:hover {
  background-color: #c23321;
}
</style>
