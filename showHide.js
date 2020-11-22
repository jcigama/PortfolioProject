let form = document.getElementById('guestForm');
let mailingListButton = document.getElementById('mailList');
form.onsubmit = validateNames;
mailingListButton.addEventListener("click", optionsChecked);

function optionsChecked() {
    let mailingList = document.getElementById('mailList').checked;
    let showContent = document.getElementById('emailChoice');

    if (mailingList) {
        showContent.classList.remove("d-none");
    }
    else {
        showContent.classList.add("d-none");
    }
}