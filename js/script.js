function showIngredientsList(event) {
    event.preventDefault();
    document.querySelector('.choose-ingredients').classList.toggle('show');
}

document.querySelector('.add-ingredients').addEventListener('click', showIngredientsList);