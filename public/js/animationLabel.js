
const inputs = document.querySelectorAll('.input-box input');
const labels = document.querySelectorAll('.input-box label');
for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('focus', evt => {
        labels[i].classList.add('stay');
    });
    inputs[i].addEventListener('blur', evt => {
        if (inputs[i].value !== "") {
            labels[i].classList.add('stay');
        } else {
            labels[i].classList.remove('stay');
        }
    });
    if (localStorage.getItem(`input-${i + 1}`) !== null) {
        inputs[i].value = localStorage.getItem(`input-${i + 1}`);
        if (inputs[i].value !== '') {
            labels[i].classList.add('stay');
        }
    }
    inputs[i].addEventListener('input', evt => {
        localStorage.setItem(`input-${i + 1}`, inputs[i].value);
    });
}
const div = document.getElementById("container");
window.addEventListener('DOMContentLoaded', function() {
    div.classList.remove("hidden");
    div.classList.add("visible", "fade-in-on-load");
});
