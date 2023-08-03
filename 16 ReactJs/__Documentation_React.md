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
---

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
const booksAfterUpdate = booksAfterDelete.map(book => book.id == 2 ? {...book, nickName : 'Deepu Bhasin'} : book);

booksAfterUpdate
/*
[ {id: 2, title: 'book 2', author: 'book 2', nickName : 'Deepu Bhasin'},
  { id: 3, title: 'book 3', author: 'book 3' },
  { id: 6,
    title: 'Harry Potter and the Chamber of Secrets',
    author: 'J.k Rowling' } ]
*/
```
----
## 📘Component as Building Blocks
* Component
* **Component has main three features :**
  1. Data
  2. Logic
  3. Appearance

![Image](./images/component-as-building-block.png)

* Component Tree

![image](./images/component-tree.png)
---
## 📘JSX
![Image](./images/jsx-1.png)

![Image](./images/jsx-2.png)

![Image](./images/jsx-3.png)

* For example if we want to update a simple text in DOM by using **javascript or jquery** we first select element by **getElementByQuery** etc then **append or replace** data, but in **React** we use **states** which automatically update our data after **re-rendering**


![Image](./images/jsx-4.png)

⚠️ **Note :** in Strict mode every thing print twice

## 📘 Separation of concern
* One Technology per File

![Image](./images/one-technolgy-perf-file.png)

* One Component per file

![Image](./images/one-component-perf-file.png)

* Separation Summary

![Image](./images/serparation-summary.png)

## 📘Style in JSX

```
<h1 style={{color : 'Red', height : '20px'}}>
    Hello World
</h1>
```

## 📘Props
* Definition about Props

![Image](./images/props-1.png)

* Props are Read Only

![Image](./images/props-2.png)

⚠️ **Note :** **Side Effect** means changing some data that's located outside of the current function. React How ever is all about pure functions, sp functions without side effects, at least when it's about a component's data.

![Image](./images/props-3.png)

* One way data Flow
![Image](./images/props-4.png)

## 📘Rules in JSX
![Image](./images/rule-of-jsx.png)

## 📘Conditional Rendering
1. && (Short circuit)

```js
// Good practice
{true && <Loading/> }

// Bad Practice
{propertyArray.length && <Loading/>}
```
2. ternary Operator ( true ? 'yes' : 'no')

```js
{ condition ? <h1>Hello yes</h1> : <h1>Hello No</h1> }
```

3. Element Variables

```js
let outPut;

if(condition){
    output = <h1>Hello yes</h1>
} else {
    output =  <h1>Hello No</h1>;
}

{outPut}
```
4. Multiple Rendering

```js
if(true) {
    return ()
} else {
    return ()
}

// if-else is not work in jsx
```
---
## 📗Section-Summary-1

![Image](./images/section-summary-one.png)
---

## 📘Event Handling

```js

<button onClick="()=>{alert('Hello World')}">Click Me</button>
```
---
## 📘What is state

* What is State

![Image](./images/state-in-rect.png)

* It give us Two Major things

![Image](./images/state-in-rect-2.png)

```js
const [total, setTotal] = useState(0);
```
* First parameter is **value**
* Second Parameter is **Setter Function** for updating value

⚠️**Note :** 
1. The value of **state** always preserve until it gets **unmount**
2. we can only call hooks like use state on the top level of the function, not inside an if statement or inside another function or inside of loop.

* Update the current state

```js
const [count, setCount] = useState(0);

const eventHandlerCount() => {

    // passing here callback function for update value with asynchronously
    setCount(old => old  + 1)
}
```

![Image](./images/use-state-rule.png)

![Image](./images/use-state-rule.-1png.png)

![Image](./images/use-state-rule-practicle-use.png)

---
## 📘Controlled Elements

* In Normal cases Every inputs maintain their own states like **values** in **DOM**
* *In **Controlled Elements** react can controls and owns the states of input fields no longer by the DOM,* So since we want to keep to now keep **input field** data inside the application so we **create states**. because that form data of course changes over time and we also want to maintain out application in sync with it.

---
## 📘State Vs Props
![Image](./images/state-vs-props.png)

---
## 📘Lift-Up-State

![Image](./images/lift-up-state.png)

---

## 📘Derived State

* More you have **states** more you have **re-rendering**
![image](./images/driver-state.png)

---
## 📘How to Split a UI into component

![Image](./images/component-size-matter.png)

![Image](./images/how-to-split.png)

![Image](./images/new-component.png)

![Image](./images/some-more-guidlines-1.png)

![Image](./images/app-component.png)

---
## 📘Key

```js
import React from 'react'
import './App.css';


function ChildComponent({ userList, name }) {
  console.log(userList);
  console.log(name);

  return (
    <ol>
      {userList.map(item => {
        return (<User key={item.id} id={item.id} name={item.name} />)
      })}
    </ol>)
}

function User({ id, name }) {
  return (<li> id : {id} & name : {name}</li>)
}

function App() {
  const array = [
    {
      id: 1,
      name: 'Deepinder'
    },
    {
      id: 2,
      name: 'Prerana Mam'
    },
    {
      id: 3,
      name: 'Pramlila Mam'
    }
  ];
  return <div>
    <ChildComponent userList={array} name="Hello World" />
  </div>
}

export default App
```
![Image](./images/key.png)

---

## 📘Component Categories

![Image](./images/component-category.png)
