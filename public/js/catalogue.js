// Sidebar 
const menuItems = document.querySelector('.menu-items');

//remove active class from all menu items

const changeActionItem = () => {
    menuItems.forEach(item => {
        item.classList.remove('active');
    })
}

menuItems.forEach(item => {
    item.addEventListener('click', () => {
        changeActionItem();
        item.classList.add('active');
    })
})