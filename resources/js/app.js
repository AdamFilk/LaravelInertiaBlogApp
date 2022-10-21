import './bootstrap';
import '../scss/app.scss';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import Toast, { useToast } from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";

InertiaProgress.init()

const toast = useToast();
createInertiaApp({
  resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) })
      .use(plugin)
    app.config.globalProperties.$route = route;
    app.use(Toast);
    app.config.globalProperties.$toast = toast;
    app.mount(el)
  },
});