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
        });
        console.log(type, message);
    })

    Livewire.on('registerTypeLivestock', (type, message) => {
        Swal.fire({
            icon: type,
            title: message,
            text: '',
            showConfirmButton: false,
            timer: 1500
        });
        console.log(type, message);
    })

    Livewire.on('registerMedicine', (type, message) => {
        Swal.fire({
            icon: type,
            title: message,
            text: '',
            showConfirmButton: false,
            timer: 1500
        });
        console.log(type, message);
    })

    Livewire.on('register', (type, message) => {
        Swal.fire({
            icon: type,
            title: message,
            text: '',
            showConfirmButton: false,
            timer: 1500
        });
    })

    Livewire.on('registerButton', (type, message) => {
        Swal.fire({
            icon: type,
            title: message,
            text: 'Something went wrong',
        })
    })

    Livewire.on('deleteModal', (type, message) => {
        Swal.fire({
            icon: type,
            title: message,
            text: '',
            showConfirmButton: false,
            timer: 1500
        });
        $('.modal').removeClass('fade');
        $('.modal').removeClass('show');
        $('.modal').css("display", "none");
        $('.back-modal').css("display", "none");
    })
})
