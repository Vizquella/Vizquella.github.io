function openPopup(title) {
    document.getElementById('popupTitle').innerText = title;
    document.getElementById('popupBox').style.display = 'flex';
}

function closePopup() {
    document.getElementById('popupBox').style.display = 'none';
}

function toggleDetail(detailId) {
    const detailSections = document.querySelectorAll('.detail');

    detailSections.forEach(section => {
        if (!section.classList.contains('hidden')) {
            section.classList.add('hidden');
        }
    });

    const detailSection = document.getElementById(detailId);
    detailSection.classList.remove('hidden');
}

