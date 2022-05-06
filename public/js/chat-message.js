window.addEventListener('sentMessage', event => {

    alert('Name updated to: ' + event.detail.newName);
    
})