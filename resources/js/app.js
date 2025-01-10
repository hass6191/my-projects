import './bootstrap';
import { createApp } from 'vue';

/**
 * Import ExampleComponent
 * You can create Vue components and import them here.
 */
import ExampleComponent from './components/ExampleComponent.vue';

/**
 * Create Vue App
 * Mount the app to the #app element in your Blade files.
 */
const app = createApp({});

// Register the ExampleComponent globally
app.component('example-component', ExampleComponent);

// Mount the Vue app
app.mount('#app');

// Add animations or other custom JavaScript
document.addEventListener('DOMContentLoaded', () => {
    // Add hover animation for buttons
    const buttons = document.querySelectorAll('.buttons a, .buttons button');
    buttons.forEach(button => {
        button.addEventListener('mouseover', () => {
            button.style.transform = 'scale(1.1)';
            button.style.transition = 'transform 0.3s';
        });
        button.addEventListener('mouseout', () => {
            button.style.transform = 'scale(1)';
        });
    });
});