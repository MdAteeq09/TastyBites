let utterance;

function readRecipe() {
    window.speechSynthesis.cancel();

    const ingredients = document.querySelector(".section ul");
    const instructions = document.querySelector(".section + .section ol");

    let textToRead = "Here are the ingredients: ";
    if (ingredients) {
        textToRead += [...ingredients.children].map(li => li.textContent).join(". ") + ". ";
    }

    textToRead += "Now the instructions: ";
    if (instructions) {
        textToRead += [...instructions.children].map(step => step.textContent).join(". ");
    }

    utterance = new SpeechSynthesisUtterance(textToRead);
    utterance.rate = 1;
    utterance.lang = "en-UK";

    speechSynthesis.speak(utterance);
}

function stopReading() {
    speechSynthesis.cancel();
}