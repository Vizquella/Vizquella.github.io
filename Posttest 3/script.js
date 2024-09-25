function openPopup(title) {
    document.getElementById('popupTitle').innerText = title;
    document.getElementById('popupBox').style.display = 'flex';
}

function closePopup() {
    document.getElementById('popupBox').style.display = 'none';
}