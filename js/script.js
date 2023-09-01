const buttons = document.querySelectorAll(".buttons button");

const tables = document.querySelectorAll(".tables table");

const selectList = (element, index = 0) => {
    tables.forEach((table) => table.classList.remove("active"));
    tables[index].classList.add("active");

    if (element) {
        buttons.forEach((button) => button.classList.remove("active"));
        element.classList.add("active");
    }
};

selectList();

var i = 0;

var texts = [

  'Journals'

];

var initialSpeed = 150; // Speed between characters
var phraseDelay = 5000; // Delay between phrases
var staticText = 'New ';
var typedText = staticText;

 

function typeWriter() {
  if (i < texts.length) {
    if (typedText.length < staticText.length + texts[i].length) {
      typedText += texts[i].charAt(typedText.length - staticText.length);
      document.querySelector('.typewriter').innerHTML = typedText;
      setTimeout(typeWriter, initialSpeed);
    } else {
      setTimeout(() => {
        typedText = staticText;
        i = (i + 1) % texts.length; // Loop back to the first phrase
        document.querySelector('.typewriter').innerHTML = typedText;
        typeWriter();
      }, phraseDelay);
    }
  }
}

document.addEventListener("DOMContentLoaded", (event) => {typeWriter();});


