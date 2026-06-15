import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'
import path from 'path'

export default defineConfig({
  plugins: [tailwindcss()],

  build: {
    outDir: 'dist',
    emptyOutDir: true,

    rollupOptions: {
      input: path.resolve('source/js/app.js'),

      output: {
        entryFileNames: 'app.js',
        chunkFileNames: '[name].js',

        assetFileNames: (assetInfo) => {
          const name = assetInfo.names?.[0] || ''

          if (name.endsWith('.css')) {
            return 'app.css'
          }

          return '[name]-[hash][extname]'
        }
      }
    }
  }
})