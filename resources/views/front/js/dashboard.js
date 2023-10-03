/*=============== SHOW SIDEBAR ===============*/
import axios from "axios";

const showSidebar = (toggleId, sidebarId, mainId) => {
    const toggle = document.getElementById(toggleId),
        sidebar = document.getElementById(sidebarId),
        main = document.getElementById(mainId)

    if (toggle && sidebar && main) {
        toggle.addEventListener('click', () => {
            /* Show sidebar */
            sidebar.classList.toggle('show-sidebar')
            /* Add padding main */
            main.classList.toggle('main-pd')
        })
    }
}
showSidebar('header-toggle', 'sidebar', 'main')

/*=============== LINK ACTIVE ===============*/
const sidebarLink = document.querySelectorAll('.sidebar__link')

function linkColor() {
    sidebarLink.forEach(l => l.classList.remove('active-link'))
    this.classList.add('active-link')
}

sidebarLink.forEach(l => l.addEventListener('click', linkColor))


/*=============== MINING BUTTONS ===============*/
var miningButtons = document.querySelectorAll('.mining-btn');

miningButtons.forEach(function (button) {
    button.addEventListener('click', function (e) {
        e.preventDefault()
        var id_down = this.getAttribute('data-id-down');
        var id_up = this.getAttribute('data-id-up');
        var id_all = this.getAttribute('data-id-all');
        let name = e.currentTarget.name
        if (name === 'up') {
            const response = axios.post('/update-invested-power', {id_up}, {'Content-Type': 'application/x-www-form-urlencoded'});
            response.then(() => {
                    let numberInput = document.querySelector('.mining-card[data-id="' + id_up + '"] .number-mining-btn');
                    numberInput.value = parseInt(numberInput.value) + 1;
                }
            ).catch((e) => console.log(e))
        }
        if (name === 'down') {
            const response = axios.post('/decrement-invested-power', {id_down}, {'Content-Type': 'application/x-www-form-urlencoded'});
            response.then(() => {
                    var numberInput = document.querySelector('.mining-card[data-id="' + id_down + '"] .number-mining-btn');
                    numberInput.value = parseInt(numberInput.value) + 1;
                }
            ).catch((e) => console.log(e))
        }
        if (name === 'all') {
            const response = axios.post('/invest-all', {id_all}, {'Content-Type': 'application/x-www-form-urlencoded'});
            response.then(() => {
                    var numberInput = document.querySelector('.mining-card[data-id="' + id_all + '"] .number-mining-btn');
                    numberInput.value = parseInt(numberInput.value) + 1;
                }
            ).catch((e) => console.log(e))
        }
    });
});

$(document).ready(function () {
    $('.increment-btn').on('click', function () {
        var numberInput = $(this).closest('.mining-buttons').find('.number-mining-btn');
        var currentValue = parseInt(numberInput.val());
        numberInput.val(currentValue + 1);
        var walId = $(this).attr('data-id-up');
        $('.balance__ghs[data-id="' + walId + '"]').text(numberInput.val() + ' GH/s');
    });

    $('.decrement-btn').on('click', function () {
        var numberInput = $(this).closest('.mining-buttons').find('.number-mining-btn');
        var currentValue = parseInt(numberInput.val());
        if (currentValue > 0) {
            numberInput.val(currentValue - 1);
            var walId = $(this).attr('data-id-down');
            $('.balance__ghs[data-id="' + walId + '"]').text(numberInput.val() + ' GH/s');
        }
    });

    $('.all-btn').on('click', function () {
        var numberInput = $(this).closest('.mining-buttons').find('.number-mining-btn');
        var currentValue = parseInt(numberInput.val());
        var walId = $(this).closest('.mining-buttons').next('.balance__ghs').attr('data-id');
        // Здесь вы можете добавить логику для установки значения currentValue на основе вашего $wal->invested_power
        if (!isNaN(currentValue)) {
            $('.balance__ghs[data-id="' + walId + '"]').text(currentValue + ' GH/s');
        }
    });
});

// $('.mining-btn').on('click', function (e) {
//
//     var id_down = $(this).attr('data-id-down');
//     var id_up = $(this).attr('data-id-up');
//     var id_all = $(this).attr('data-id-all');
//     var name = $(e.currentTarget).attr('name');
//     var csrfToken = $('input[name="_token"]').val();
//
//     if (name === 'up') {
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': csrfToken
//             }
//         });
//         $.post('/update-invested-power', {id_up}, function (response) {
//             var numberInput = $('.mining-card[data-id="' + id_up + '"] .number-mining-btn');
//             numberInput.val(parseInt(numberInput.val()) + 1);
//         }).done(function (response) {
//             console.log(response);
//         }).fail(function (error) {
//             console.log(error);
//         });
//     }
//
//     if (name === 'down') {
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': csrfToken
//             }
//         });
//         $.post('/decrement-invested-power', {id_down}, function (response) {
//             var numberInput = $('.mining-card[data-id="' + id_down + '"] .number-mining-btn');
//             numberInput.val(parseInt(numberInput.val()) + 1);
//             numberInput = parseInt(numberInput.val()); // обновление numberInput
//         }).done(function (response) {
//             console.log(response);
//         }).fail(function (error) {
//             console.log(error);
//             // дополнительные действия при ошибке выполнения запроса
//         });
//     }
//
//     if (name === 'all') {
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': csrfToken
//             }
//         });
//         $.post('/invest-all', {id_all}, function (response) {
//             var numberInput = $('.mining-card[data-id="' + id_all + '"] .number-mining-btn');
//             numberInput.val(parseInt(numberInput.val()));
//             numberInput = parseInt(numberInput.val()); // обновление numberInput
//         }).done(function (response) {
//             console.log(response);
//             // дополнительные действия после успешного выполнения запроса
//         }).fail(function (error) {
//             console.log(error);
//             // дополнительные действия при ошибке выполнения запроса
//         });
//     }
// });


var balanceCryptoElements = document.querySelectorAll('.balance__crypto');
var balanceGhs = document.querySelectorAll('.balance__ghs');

balanceCryptoElements.forEach(function (balanceCryptoElement, index) {
    var currentAmount = parseFloat(balanceCryptoElement.textContent);
    var speed = parseFloat(balanceCryptoElement.getAttribute('data-speed')); // Скорость счетчика для данного дива

    if (parseFloat(balanceGhs[index].textContent) !== 0) { // Check if balanceGhs at the corresponding index is not equal to zero
        setInterval(function () {
            currentAmount += speed;
            balanceCryptoElement.textContent = currentAmount.toFixed(10) + ' ' + balanceCryptoElement.getAttribute('data-currency');
        }, 1000);
    }
});

// $(window).on('beforeunload', function () {
//     var balanceCryptoElements = document.querySelectorAll('.balance__crypto');
//     var balanceGhs = document.querySelectorAll('.balance__ghs');
//
//     balanceCryptoElements.forEach(function (balanceCryptoElement, index) {
//         var currentAmount = parseFloat(balanceCryptoElement.textContent);
//         var speed = parseFloat(balanceCryptoElement.getAttribute('data-speed'));
//         var currency = balanceCryptoElement.getAttribute('data-currency');
//
//         if (parseFloat(balanceGhs[index].textContent) !== 0) {
//             $.ajax({
//                 url: '/updateAmount', // Change this to your server-side script URL
//                 type: 'POST',
//                 data: {
//                     amount: currentAmount,
//                     currency: currency
//                 },
//                 success: function (response) {
//                     console.log('Data updated successfully for index: ' + index);
//                 },
//                 error: function (xhr, status, error) {
//                     console.error('Error updating data for index ' + index + ':', error);
//                 }
//             });
//         }
//     });
// });
