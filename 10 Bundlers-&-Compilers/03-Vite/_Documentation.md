### Create defined file name output

```js
// vite.config.js
import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
  mode: "development",
  plugins: [vue()],
  base: "./",
  build: {
    outDir: 'dist',
    emptyOutDir: true,
    rollupOptions: {
      output: {
        entryFileNames: 'aap-app.js',
        chunkFileNames: 'app-app.js',
        assetFileNames: 'app-app.[ext]',
      }
    }
  },
});
```