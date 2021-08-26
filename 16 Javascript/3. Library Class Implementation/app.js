class Library {
  constructor(bookList) {
    this.bookList = bookList;
    this.issueBook = {};
  }
  getBooklist() {
    this.bookList.forEach((element) => {
      console.log(element);
    });
  }
  issueBook(bookname, user) {
    if (this.issueBook[bookname] != undefined) {
      this.issueBook[bookname] = user;
    } else {
      console.log("this book is already issued");
    }
  }
  returnBook(bookName) {
    delete this.issueBook[bookName];
  }
}
