// ingredients

let ingredientCount = 3;

function addIngredientTextBox(event) {
    event.preventDefault();
    console.log(event);
    let textbox = document.createElement("input");
    textbox.type = "text";
    textbox.name = `ingredient${ingredientCount}`;
    textbox.className = `ingredient${ingredientCount}`;
    document.querySelector('.ingredients-list').appendChild(textbox);
    let removeButton = document.createElement("button");
    removeButton.className = `ingredient${ingredientCount}`
    removeButton.innerText = '- Remove';
    document.querySelector('.ingredients-list').appendChild(removeButton);
    document.querySelector(`button.ingredient${ingredientCount}`).addEventListener('click', removeIngredientTextBox);
    ingredientCount++;
    if (ingredientCount > 10) {
        document.querySelector('.add-ingredient').disabled = true;
    }
}

function removeIngredientTextBox(event) {
    event.preventDefault();
    let remove = event.target.className;
    document.querySelectorAll(`.${remove}`).forEach(e => e.remove());
    ingredientCount--;
    if (ingredientCount <= 10) {
        document.querySelector('.add-ingredient').disabled = false;
    }
}

document.querySelector('.add-ingredient').addEventListener('click', addIngredientTextBox);


// garnishes

let garnishCount = 1;

function addGarnishTextBox(event) {
    event.preventDefault();
    let textbox = document.createElement("input");
    textbox.type = "text";
    textbox.name = `garnish${garnishCount}`;
    textbox.className = `garnish${garnishCount}`;
    document.querySelector('.garnish-list').appendChild(textbox);
    let removeButton = document.createElement("button");
    removeButton.className = `garnish${garnishCount}`
    removeButton.innerText = '- Remove';
    document.querySelector('.garnish-list').appendChild(removeButton);
    document.querySelector(`button.garnish${garnishCount}`).addEventListener('click', removeGarnishTextBox);
    garnishCount++;
    if (garnishCount > 3) {
        document.querySelector('.add-garnish').disabled = true;
    }
}

function removeGarnishTextBox(event) {
    event.preventDefault();
    let remove = event.target.className;
    document.querySelectorAll(`.${remove}`).forEach(e => e.remove());
    garnishCount--;
    if (garnishCount <= 3) {
        document.querySelector('.add-garnish').disabled = false;
    }
}

document.querySelector('.add-garnish').addEventListener('click', addGarnishTextBox);


// instructions

let instructionCount = 2;

function addInstructionTextBox(event) {
    event.preventDefault();
    console.log(event);
    let textbox = document.createElement("input");
    textbox.type = "text";
    textbox.name = `instruction${instructionCount}`;
    textbox.className = `instruction${instructionCount}`;
    document.querySelector('.instructions-list').appendChild(textbox);
    let removeButton = document.createElement("button");
    removeButton.className = `instruction${instructionCount}`
    removeButton.innerText = '- Remove';
    document.querySelector('.instructions-list').appendChild(removeButton);
    document.querySelector(`button.instruction${instructionCount}`).addEventListener('click', removeInstructionTextBox);
    instructionCount++;
    if (instructionCount > 5) {
        document.querySelector('.add-instruction').disabled = true;
    }
}

function removeInstructionTextBox(event) {
    event.preventDefault();
    let remove = event.target.className;
    document.querySelectorAll(`.${remove}`).forEach(e => e.remove());
    instructionCount--;
    if (instructionCount <= 5) {
        document.querySelector('.add-instruction').disabled = false;
    }
}

document.querySelector('.add-instruction').addEventListener('click', addInstructionTextBox);