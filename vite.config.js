import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'
import path from 'path'

export default defineConfig({
  plugins: [tailwindcss()],

  build: {
    outDir: 'dist',

    rollupOptions: {
      input: path.resolve('source/js/app.js'),

      output: {
        entryFileNames: 'js/app.js',

        assetFileNames: (assetInfo) => {
          if (assetInfo.names?.some(name => name.endsWith('.css'))) {
            return 'css/app.css'
          }

          return 'assets/[name]-[hash][extname]'
        }
      }
    }
  }
})