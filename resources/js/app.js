import './bootstrap';
import '../css/app.css';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
  setup({ el, app, props, plugin }) {
      return createApp({ render: () => h(app, props) })
          .use(plugin)
          .mixin({ methods: { route } })
          .mount(el);
  },
});

Alpine.start();
