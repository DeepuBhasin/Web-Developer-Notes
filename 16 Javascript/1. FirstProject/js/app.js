showNotes();
let addBtn = document.getElementById("addBtn");
addBtn.addEventListener("click", function () {
  let addTxt = document.getElementById("addTxt");
  if (addTxt.value.trim().length != 0) {
    let notes = localStorage.getItem("notes");
    if (notes == null) {
      notesObj = [];
    } else {
      notesObj = JSON.parse(notes); // converted into object or array
    }
    notesObj.push(addTxt.value);
    localStorage.setItem("notes", JSON.stringify(notesObj)); // converted into string
    addTxt.value = "";
    showNotes();
  } else {
    alert("Please Add some Items");
  }
});

function showNotes() {
  let notes = localStorage.getItem("notes");
  if (notes == null) {
    notesObj = [];
  } else {
    notesObj = JSON.parse(notes); //converted into array
  }
  let html = "";
  notesObj.forEach(function (elemnt, index) {
    html += `
         <div class="noteCard card my-2 mx-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Order No. ${index + 1}</h5>
                    <p class="card-text">${elemnt}</p>
                    <button id="${index}" onclick="deleteNote(this.id)" class="btn btn-danger">Delete Order</button>
                </div>
            </div>
            `;
  });
  let noteElm = document.getElementById("notes");
  if (notesObj.length != 0) {
    noteElm.innerHTML = html;
  } else {
    noteElm.innerHTML = `No Order Placed yet. Use "Add Order" section above to add Order.`;
  }
}

function deleteNote(index) {
  let notes = localStorage.getItem("notes");
  if (notes == null) {
    notesObj = [];
  } else {
    notesObj = JSON.parse(notes);
  }
  notesObj.splice(index, 1);
  {
    localStorage.setItem("notes", JSON.stringify(notesObj));
  }
  showNotes();
}
let search = document.getElementById("searchTxt");
search.addEventListener("input", function () {
  let inputVal = search.value.toLowerCase();
  let noteCards = document.getElementsByClassName("noteCard");
  Array.from(noteCards).forEach(function (element) {
    let cardTxt = element.getElementsByTagName("p")[0].innerText.toLowerCase();
    let orderTxt = element
      .getElementsByTagName("h5")[0]
      .innerText.toLowerCase();
    if (cardTxt.includes(inputVal) || orderTxt.includes(inputVal)) {
      element.style.display = "block";
    } else {
      element.style.display = "none";
    }
  });
});
