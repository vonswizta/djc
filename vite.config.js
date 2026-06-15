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
        entryFileNames: 'js/app.js',
        chunkFileNames: 'js/[name].js',

        assetFileNames: (assetInfo) => {
          const name = assetInfo.names?.[0] || ''

          if (name.endsWith('.css')) {
            return 'css/app.css'
          }

          return 'assets/[name]-[hash][extname]'
        }
      }
    }
  }
})