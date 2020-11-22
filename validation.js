// Register the validate function for the form submit event
let form = document.getElementById('guestForm');
let mailingListButton = document.getElementById('mailList');

form.onsubmit = validateNames;
mailingListButton.addEventListener("click", optionsChecked);
otherText = addEventListener("click", optionsChecked);

function optionsChecked() {
    let mailingList = document.getElementById('mailList').checked;
    let showContent = document.getElementById('emailChoice');
    let metChoice = document.getElementById('choice').value;
    let otherText = document.getElementById('otherText');

    if (mailingList) {
        showContent.classList.remove("d-none");
    }
    else {
        showContent.classList.add("d-none");
    }

    if (metChoice === "other") {
        otherText.classList.remove("d-none");
    }
    else {
        otherText.classList.add("d-none");
    }

}

function clearErrors() {
    let errors = document.getElementsByClassName("text-danger");
    for (let i = 0; i < errors.length; i++) {
        errors[i].classList.add("d-none");
    }
}

function validateNames() {
    clearErrors();

    let isValid = true;
    let fname = document.getElementById('fname').value;
    let lname = document.getElementById('lname').value;
    let email = document.getElementById('email').value;
    let mailingList = document.getElementById('mailList').checked;
    let linkedIn = document.getElementById('linkedIn').value;
    let metChoice = document.getElementById('choice').value;


    if (fname.trimEnd() === "") {
        let errfname = document.getElementById("err-fname");
        errfname.classList.remove("d-none");
        isValid = false;
    }

    if (lname.trimEnd() === "") {
        let errlname = document.getElementById("err-lname");
        errlname.classList.remove("d-none");
        isValid = false;
    }

    if(mailingList || email.trimEnd() !== "") {
        if (!ValidateEmail(email)) {
            let errEmail = document.getElementById("err-email");
            errEmail.classList.remove("d-none");
            isValid = false
        }
    }

    if(linkedIn.trimEnd() !== "") {
        if(!linkedIn.includes("http") || !linkedIn.includes(".com")) {
            let errlinkedIn = document.getElementById("err-linkedIn");
            errlinkedIn.classList.remove("d-none");
            isValid = false;
        }
    }


    if(metChoice === "" || metChoice === "none") {
        let errOption = document.getElementById("errOption");
        errOption.classList.remove("d-none");
        isValid = false;
    }

    return isValid;
}

function ValidateEmail(mail)
{
    if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(form.email.value))
    {
        return true
    }
    return false
}