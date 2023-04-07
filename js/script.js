// ingredients

function showSection(event) {
    event.preventDefault();
    const clickedButton = `.${event.srcElement.id}`;
    const element = document.querySelector(clickedButton);
    element.classList.toggle('show');
}

document.getElementById('ingredients').addEventListener('click', showSection);
document.getElementById('garnish').addEventListener('click', showSection);



