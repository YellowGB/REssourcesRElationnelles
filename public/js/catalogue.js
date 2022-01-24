//Sidebar
const menuItems = document.querySelectorAll('.menu-item');
//Messages 
const messagesNotifications = document.querySelector('#notification-message');
const messages = document.querySelector('.messages');
const message = messages.querySelectorAll('.messages');
const messageSearch = document.querySelector('#message-search');
//---------------------------- Side Bar ---------------------------------- //


const changeActiveItem = () => {
    menuItems.forEach(item => {
        item.classList.remove('active');
    })
}

menuItems.forEach(item => {
    item.addEventListener('click', () => {
        item.classList.add('active');
        if(item.id != 'notifications'){
            document.querySelector('.notification-popup').
            style.display = 'none';
        }
        else{
            document.querySelector('.notification-popup').
            style.display = 'block';
            document.querySelector('#notifications . notification-count').
            style.display = 'none';
        }
    })
})


//---------------------------- Messages ---------------------------------- //
/*

const searchMessage = () => {
    const val = messageSearch.ariaValueMax.toLowerCase();
    message.forEach(chat => {
        let name = chat.querySelectorAll('h5').textContent.toLowerCase();
        if(name.indexOf(val) != -1)
        {
            chat.style.display = 'flex';
        }
        else{
            chat.style.display = 'none';
        }
    })
}
messageSearch.addEventListener('keyup', searchMessage);
// Surligne la partie message quand on clique sur le menu messages 
messagesNotifications.addEventListener('click', () => {
    messages.style.boxShadow = '0 0 1rem var(--color-primary)';
    messagesNotifications.querySelectorAll('.notification-count').
    style.display = 'none';
    setTimeout(() => {
        messages.style.boxShadow = 'none';  
    }, 2000)
})

*/
