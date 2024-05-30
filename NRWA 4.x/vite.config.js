import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig({
  theme: {
      colors: {
          primary: '#c2c2c2',
          secondary: '#5c5c5c',
          tertiary: '#a0a0a0',
      }
  },
  plugins: [
    vue(),
  ],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url))
    }
  },    server: {
        proxy: {
            "/api": {
                target: "http://127.0.0.1:8000/",
                changeOrigin: true,
                rewrite: (path) => path.replace(/^\/api/, ""),
            },
        },
    },
})
