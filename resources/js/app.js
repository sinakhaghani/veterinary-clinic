require('./bootstrap');

let Swal = require('sweetalert2');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.addEventListener('livewire:load', () => {
    Livewire.on('validateLogin', (type, message) => {
        Swal.fire({
            icon: type,
            title: message,
            text: '',
            showConfirmButton: false,
            timer: 1500
        })
        console.log(type, message)
    })
})
