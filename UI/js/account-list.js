  
const addBtn = document.getElementById("add-btn");
// add new row to account table
addBtn.addEventListener("click", () => {
const accountTab = document.querySelector(".account-tab");
const tbody = accountTab.querySelector("tbody");
const tr = document.createElement("tr");
tr.innerHTML = `
    <td></td>
    <td><input type="text" value="" /></td>
    <td><input type="text" value="" /></td>
    <td><input type="text" value="" /></td>
    <td>
    <a href="#"><i class="fas fa-trash-alt"></i></a>
    </td>
`;
tbody.appendChild(tr);
});