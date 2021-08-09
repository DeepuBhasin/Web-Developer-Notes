class Book {
  constructor(bookName = null, author = null, type = null) {
    this.bookName = bookName;
    this.author = author;
    this.type = type;
  }
}

class Display {
  add(book) {
    let tableBody = document.getElementById("tableBody");
    let uiString = ` <tr>
                      <td>${book.bookName}</td>
                      <td>${book.author}</td>
                      <td>${book.type}</td>
                  </tr>`;
    tableBody.innerHTML += uiString;
  }
  clear() {
    let libraryForm = document.getElementById("libraryForm");
    libraryForm.reset();
  }
  show(color, message) {
    let messageid = document.getElementById("message");
    messageid.innerHTML = `<div class="alert alert-${color}"> ${message}</div>`;
    setTimeout(function () {
      messageid.innerHTML = "";
    }, 2000);
  }
}

let libraryForm = document.getElementById("libraryForm");
libraryForm.addEventListener("submit", libraryFormSubmit);

function libraryFormSubmit(e) {
  e.preventDefault();
  let bookName = document.getElementById("bookName").value.trim();
  let author = document.getElementById("author").value.trim();

  let fiction = document.getElementById("fiction");
  let computerProgramming = document.getElementById("computerProgramming");
  let cooking = document.getElementById("cooking");
  let type;
  if (fiction.checked) {
    type = fiction.value;
  } else if (computerProgramming.checked) {
    type = computerProgramming.value;
  } else if (cooking.checked) {
    type = cooking.value;
  }

  let display = new Display();
  if (bookName.length == 0 || author.length == 0 || type.length == 0) {
    display.show("danger", "Please Fill out the Mandotory Fields");
    return false;
  } else {
    let book = new Book(bookName, author, type);
    display.show("success", "Book Added Successfully");
    display.add(book);
    display.clear();
  }
}
