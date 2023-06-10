import './bootstrap';
// import $ from 'jquery';

onload = (event) => {
    showSuccesMessage('homeLoginNotification');
    setTimeout(() => {
        showSuccesMessage('showRows');
    }, 1000)
    setTimeout(() => {
        showSuccesMessage('notification');
    }, 2000)

    var pusher = new Pusher('888bccb6e4ad4050a87f', {
        cluster: 'eu'
    });

    var channel = pusher.subscribe('rows-channel');
    channel.bind('job-processed', function(data) {
        if(data.message) {
            document.getElementById('SocketMessage').innerText = data.message
            showSuccesMessage('notificationSocket')
        }
    });
};

$(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
});

const showSuccesMessage = (id) => {
    let hiddenBlock = document.getElementById(id);
    if(hiddenBlock) {
        hiddenBlock.classList.remove('hide');
        hiddenBlock.classList.add('show');
    }
}
