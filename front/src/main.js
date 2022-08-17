import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify'
import Navigation from "./navigation/NavigationBar.vue"
import { loadFonts } from './plugins/webfontloader'
loadFonts()

createApp(App)
  .use(router)
  .use(vuetify)
  .component("Navigation-Bar",Navigation)
  .mount('#app')
