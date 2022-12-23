// when click edit button, change input with type=text to editable
document.getElementById("edit-btn").addEventListener("click", function () {
    let inputs = document.querySelectorAll("input[type=text]:not(#search-input)");
    inputs.forEach((input) => {
      input.style.pointerEvents = "auto";
      input.style.fontStyle = "normal";
    });
    // display save button and hide edit button
    document.getElementById("edit-btn").style.display = "none";
    document.getElementById("save-btn").style.display = "unset";
  });

  // when click save button, change input with type=text to original
  document.getElementById("save-btn").addEventListener("click", function () {
    let inputs = document.querySelectorAll("input[type=text]:not(#search-input)");
    inputs.forEach((input) => {
      input.style.pointerEvents = "none";
      input.style.fontStyle = "italic";
    });
    // display edit button and hide save button
    document.getElementById("edit-btn").style.display = "unset";
    document.getElementById("save-btn").style.display = "none";
  });