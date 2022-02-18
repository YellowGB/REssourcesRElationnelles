function copyToClipboard(text) {
    var inputc = document.body.appendChild(document.createElement("input"));
    inputc.value = window.location.href;
    inputc.focus();
    inputc.select();
    document.execCommand('copy');
    inputc.parentNode.removeChild(inputc);

    var shareButton = document.getElementById('share');
    var copyMessage = document.createElement("span");
    copyMessage.id = "copyMessage";
    copyMessage.innerHTML = "Copié";
    shareButton.append(copyMessage);
    setTimeout(removeMessage, 1000);
}

function removeMessage() {
    var copyMessage = document.getElementById("copyMessage");
    copyMessage.remove();
}