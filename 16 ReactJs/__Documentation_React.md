## 📘Why we require React
* Server-Side-Rendering vs Client-Side-Rendering

![Image](./images/why-require-of-react.png)

* Example of UI in sync with Data

![Image](./images/ui-in-sync-data.png)

* Problem with Vanilla Javascript
  
![Image](./images/problem-with-vanilla-js.png)

* Why Do Front-End Frame-Works Exist ?

![Image](./images/why-do-front-end-exist.png)

## 📘What is react
* **React is Javascript Library for building user interfaces**

![1](./images/what-is-react.png)

* Based on Components

![2](./images/component-based.png)

* Declarative

![3](./images/declarative.png)

* State-Driven

![4](./images/state-driven.png)

* Javascript-library

![5](./images/react-library.png)

* React Summary

![6](./images/summary.png)

## 📘Pure React (CDN Links)
* Pure React means **writing react with react Objects and React Elements**

![7](./images/react-librar-react-dom.png)

* Getting useState and useEffect from React Object

![8](./images/pure-rect-code-cnd.png)

## 📘Create-React-App

![9](./images/react-app-vs-vite.png)

```
npx create-react-app project-name
```
## 📘Review of Essential javascript for React
* Destructuring, spread Operator, Template Literals, ternaries
* Short-Circuiting and Logical Operators (||, &&, ??)
  * falsy Values : **0, null, undefined, ''**   
```js
// && Operator
true && "some things"   //some things 
false && "some things"  // false

// || Operator
true || "Some thing" // true
false|| "Some thing" // Some thing 

// ?? Nullish coalescing Operator
CheckDataExist ?? "no Data exist" 

CheckDataExist == null      //  no data exist
CheckDataExist == undefined //  no data exist
CheckDataExist == 0         //  CheckDataExist means 0
CheckDataExist == false     //  CheckDataExist means false   
```
* Optional Chaining
```js
let obj = {};

obj?.employee?.firstname
```

* Promises
* Async/Await
* Map, Filter, Reduce, sort (in react you mostly work with immutable Arrays)

```js
const arr = [3, 7, 1, 9, 6];
const sorted = arr.sort((a, b) => a - b);
sorted  // [ 1, 3, 6, 7, 9 ]

const desc = arr.sort((a, b) => b - a)
desc    // [ 9, 7, 6, 3, 1 ]


const sorted = books.slice().sort((a , b) => a.pages - b.pages);
```

* Working with immutable Arrays

```js
const books = [
    {
        id: 1,
        title: "book 1",
        author: "book 1"
    },
    {
        id: 2,
        title: "book 2",
        author: "book 2"
    },
    {
        id: 3,
        title: "book 3",
        author: "book 3"
    }
]

const newBook = {
    id: 6,
    title: "Harry Potter and the Chamber of Secrets",
    author: "J.k Rowling"
}

const booksAfterAdded = [...books, newBook];

booksAfterAdded 
/*
[ { id: 1, title: 'book 1', author: 'book 1' },
  { id: 2, title: 'book 2', author: 'book 2' },
  { id: 3, title: 'book 3', author: 'book 3' },
  { id: 6,
    title: 'Harry Potter and the Chamber of Secrets',
    author: 'J.k Rowling' } ]
*/

// 2) Delete book object from array
const booksAfterDelete = booksAfterAdded.filter(item => item.id != 1);

booksAfterDelete
/*
[ { id: 2, title: 'book 2', author: 'book 2' },
  { id: 3, title: 'book 3', author: 'book 3' },
  { id: 6,
    title: 'Harry Potter and the Chamber of Secrets',
    author: 'J.k Rowling' } ]
*/

// 3) Update book object in the array
const booksAfterUpdate = booksAfterDelete.map(book => book.id == 2 ? {} : book);

booksAfterUpdate
/*
[ {},
  { id: 3, title: 'book 3', author: 'book 3' },
  { id: 6,
    title: 'Harry Potter and the Chamber of Secrets',
    author: 'J.k Rowling' } ]
*/
```