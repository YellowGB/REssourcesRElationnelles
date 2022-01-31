//Sidebar
// var homeId = document.getElementById('home-id');
// var palette = document.getElementById('palette');
// var notification = document.getElementById('notification');

var menuItems = document.querySelectorAll('.menu-item');

//---------------------------- Side Bar ---------------------------------- //


var changeActiveItem = () => {
    menuItems.forEach(item => {
        item.classList.remove('active');
    })
}

menuItems.forEach(item => {
    item.addEventListener('click', () => {
        changeActiveItem();
        item.classList.add('active');
    })
})

// homeId.addEventListener('click', (e) => {
//     homeId.classList.add('active');
// });
// notification.addEventListener('click', (e) => {
//     notification.classList.add('active');
// });
// palette.addEventListener('click', (e) => {
//     palette.classList.add('active');
// });
