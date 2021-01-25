window.addEventListener("load", function() {
  document.getElementById('add').addEventListener("click", function() {

    let option = 1;

    //retrieve first option row container
    let initial_option = document.getElementById('initial_option');

    //new row div
    let newRow = document.createElement('div');
    newRow.classList.add('row');

    //clone the option container
    let div = document.getElementById('initial_option');
    let clone = div.cloneNode(true);

    //hide buttons for each additional option created
    let c = clone.querySelector("#add_button");
    c.style.visibility = "hidden";
    
    insertAfter(clone, initial_option);
    switchText();
  });
  switchText();
});

function insertAfter(newNode, referenceNode) {
  referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

function switchText() {
    let randomWords = 
      [
        "Rust Protection", 
        "Paint Glossifer", 
        "30 inch GPS screen",
        "Rear door ashtrays",
        "Additonal cupholders",
        "***Lifetime warranty",
        "Advanced laser air con",
        "VGA reverse camera"
      ];

    let randomIndex = Math.floor(Math.random() * 8);//creates random No. from 1 - 3

    document.getElementById("random_option_item").value = randomWords[randomIndex];
}
