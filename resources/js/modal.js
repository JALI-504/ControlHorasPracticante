import $ from 'jquery';

// Ahora puedes utilizar jQuery en tu código
$(document).ready(function() {
    // Tu código con jQuery aquí
    
    document.addEventListener('livewire:load', function () {
        Livewire.on('openModal', function () {
            $('#exampleModal').modal('show');
        });
    });
});