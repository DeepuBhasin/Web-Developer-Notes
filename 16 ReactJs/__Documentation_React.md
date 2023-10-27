## 📘Informatics Things

* Type **React.new** in Address bar for open react code panel
* Values Persist
```js
// useState
const [total,setTotal] = useState(0)

//useRef
const inputRef = useRef(0)

// Normal Variable
let total = 0;

// On every render normal total variable value get reset to zero but in useState and useRef value will not reset on every render it will persist the value
```

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

![Image](./images/style.png)

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
# 📔Thinking in React State Management

## 📘Local Vs Global State

![Image](./images/local-vs-global.png)

---

## 📘When and Where State Use
![Image](./images/when-where-state-use.png)


---
## 📘Lift-Up-State

![Image](./images/lift-up-state.png)

---

## 📘Derived State

* More you have **states** more you have **re-rendering**

![image](./images/driver-state.png)

---

## 📘Children Props

* when we avoid to pass to many props then we use **children props**

```js
import React from 'react';
import "./App.css"

function Button({ onClick, backgroundColor, color, children }) {
  return <button style={{ backgroundColor, color }} onClick={onClick}>{children}</button>
}

function App() {
  return <div className='App'>
    <Button onClick={() => alert('Hello World')} color={'black'} backgroundColor={'white'}>
      Alert
    </Button>

    <Button onClick={() => alert('Alert with emojis')} color={'black'} backgroundColor={'white'}>
      Hello 😁
    </Button>

  </div>
}

export default App;
```
![Image](./images/children-prop.png)

# 📔Thinking in React Components, Composition, and Reusability
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

---
## 📘Props Drilling

* When we passing props down up to nth child is called props drilling

---

## 📘Composition Component

![Image](./images/composition-component-1.png)

![Image](./images/composition-component-2.png)

![Image](./images/composition-component-3.png)

* Simple Example of Composition (Removing Prop-Drilling)

```js
import React from 'react'
import './App.css';


function Main({ children }) {
  return (
    <div>
      <h1>Main Component</h1>
      {children}
    </div>
  )
}

function ChildComponent({ userList }) {
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
  return (
    // using composition 
    <Main>
      <ChildComponent userList={array} />
    </Main>
  )
}
export default App
```
## 📘Passing Elements as Props (Alternative to children)
* mostly use in React-Router 
```js
import React from 'react';
import "./App.css"

function MyRender({ element }) {
  return <div>
    {element}
  </div>
}

function Button({ onClick, backgroundColor, color, children }) {
  return <button style={{ backgroundColor, color }} onClick={onClick}>{children}</button>
}

function App() {
  return <div className='App'>
    <MyRender element={<Button onClick={() => alert('Hello World')} color={'black'} backgroundColor={'white'}>
      Alert
    </Button>}>
    </MyRender>
  </div>
}

export default App;
```
---
## 📘PropTypes
* Best use with **Typescript**
* **prop-types** this package automatically comes with **react-create-app**

```js
import PropTypes from "prop-types";
```

```js
// in example sending wrong data type for background property
import React from 'react';
import PropTypes from "prop-types";
import "./App.css";

function Button({ onClick, backgroundColor, color, children }) {
  const buttonStyle = {
    backgroundColor,
    color,
  };

  return <button style={buttonStyle} onClick={onClick}>{children}</button>;
}

Button.propTypes = {
  onClick: PropTypes.func,
  backgroundColor: PropTypes.string,
  color: PropTypes.string.isRequired,
  children: PropTypes.node
};

function App() {
  return (
    <div className='App'>
      <Button onClick={() => alert('Hello World')} color={'red'} backgroundColor={111}> 
        Alert
      </Button>
    </div>
  );
}

export default App;
```

![Image](./images/propstype.png)

---

# 📔How React Works Behind the Scenes

## 📘Components Vs Instances Vs Elements

![Image](./images/component-instance-element.png)

![Image](./images/component-instance-element-2.png)

![Image](./images/component-instance-element-3.png)

![Image](./images/component-instance-element-4.png)

---
## 📘Re-Rendering (Complete process)
* Component -> Component Instance -> Rect Element -> Dom Element


![Image](./images/re-rendering.png)

* Render Means = Render Phase + Commit Phase

![Image](./images/re-rendering-2.png)

* Two Situations that Render Triggers

![Image](./images/re-rendering-3.png)

* The Render Phase - Creating virtual Dom

![Image](./images/the-render-phase.png)

* How Virtual Dom get create behind the scene

![Image](./images/re-rendering-3-virtual-dom.png)

* After creating Virtual Dom

![Image](./images/the-reneder-phase-2.png)

* Reconciliation

![Image](./images/re-rendering-5-reconciliation.png)

* Fiber Tree

![Image](./images/re-rendering-6-reconciliation-fiber.png)

> Reconciler
* Reconciliation is processed by a **reconciler** and we can say that the reconciler really is the **engine of react**. Its like **heart** of react. So its this reconciler that allows us to never touch the DOM directly and instead simply tell react what the next snapshot of the UI should look like based on state 
* and the current reconciler in React is called Fiber

> Fiber Tree 
* **Fiber Tree :** : so during the initial  render of the application fiber takes the entire React element tree. so the virtual Dom and based on it builds yet another tree, which is the fiber tree. The fiber tree is a special internal tree where for each component instance and DOM element in the app there is one so-called fiber. Now what's special about this tree is that unlike react element in the virtual DOM, fibers are not recrated on every render, So the fiber tree is never destroyed, instead, it's a mutable data structure And once it has created during the initial render, it simply mutated over and over again in the future reconciliation steps. and this makes fibers the perfect place for keeping track of things like the current component state, props, side effects, list of used hooks and more, So the actual state and props of any component instance that we see the screen are internally stored inside the corresponding fiber in the fiber tree. Now, each fiber also contains a queue of work to do like updating state updating refs, running registered, side effects, performing Dom updates and so on. This is why a fiber is also defined as a unit of work. 



![Image](./images/re-rendering-7-reconciliation-fiber.png)

![Image](./images/re-rendering-8.png)

![Image](./images/re-rendering-9-painting.png)

* **The once the commit phase is completed, the work in progress fiber tree becomes the current tree for the next render cycle that's because Fiber tree are never discard and never recreated from scratch, instead they are reused in order to save precious rendering time and with that, we close up the commit phase.**

![Image](./images/re-rendering-9-painting-2.png)

![Image](./images/react-putting-all-together.png)

## 📘How Diffing Works

![Image](./images/diffing-1.png)

* The below photo conveys message :  when an element is removed from the Document Object Model (DOM), its associated state values are also removed, resulting in a reset of all values.

![Image](./images/diffing-2.png)

* simple meaning of below photo : if the **attributes or props** of a component change, the component will retain its current state without resetting.

![Image](./images/diffing-3.png)

Example of **key & without Key**

```js
import React, { useState } from 'react';
import "./App.css";

function CountButton({ parentCount }) {
  const [count, setCount] = useState(0);

  return <div>
    <hr />
    <h1>Parent Count : {parentCount}</h1>
    <h1>Child Count : {count}</h1>
    <button onClick={() => setCount(e => e + 1)}>Child Click</button>
  </div>
}

function App() {
  const [parentCount, setParentCount] = useState(0);
  return (
    <div className='App'>
      <button onClick={() => setParentCount(e => e + 1)}>Parent Click</button>
      <CountButton parentCount={parentCount} />
      <CountButton parentCount={parentCount} key={parentCount} />
    </div>
  );
}

export default App;
```

## 📘Keys 

* Key help to re-render the component (reset values or state) Example : **When we are using Tabs**

![Image](./images/key-1.png)

![Image](./images/key-2.png)

![Image](./images/key-3.png)

![Image](./images/key-4.png)

## 📘Render Logics

![Image](./images/types-of-render-logic.png)

![Image](./images/rules-for-render-logic.png)

![Image](./images/functional-programming.png)

## 📘How state updates are batched

![Image](./images/how-state-updates-are-batched-1.png)

![Image](./images/how-state-updates-are-batched-2.png)

![Image](./images/how-state-updates-are-batched-3.png)

![Image](./images/how-state-updates-are-batched-4.png)

![Image](./images/how-state-updates-are-batched-5.png)

example

```js
import React, { useState } from 'react';
import "./App.css";
function App() {
  const [count, setCount] = useState(0);

  function updateCount() {
    setCount(e => e + 1);
    setCount(e => e + 1);
    setCount(e => e + 1);
  }

  return (<div>
    <h1>count : {count}</h1>
    <button onClick={updateCount}>Increment by 3</button>
  </div>)
}

export default App;
```

## 📘Event Propagation and Delegation

![Image](./images/event-propagation-event-delegation-1.png)

* As soon as the event fires, a new event object will be created, but it will not be created where the click actually happened. Instead, the object will be created at the root of the document, so at the very top of the tree. From there, the event will then travel down the entire tree during the so called capturing phase

![Image](./images/event-propagation-event-delegation-2.png)

*  all the way until it reaches the target element and the target element is simply the element on which the event was actually first triggered. So at the target, we can choose to handle the event by placing and event handler function on that element.
*  Then immediately after the target element has been reached, the event object travels all the way back up the entire tree during the so-called bubbling phase. 

![Image](./images/event-propagation-event-delegation-3.png)

> Now there are two very important things to understand about this process

* 1. The first is that during the capturing and bubbling phase, the event really goes through every single child and parent element one by one. in fact, it's as if the event originated or happened in each of these dom elements 
* The Second important thing is that by default, event handlers listen to events not only on the target but element also during the bubbling phase. so if we put these two things together, it means that every single event handler in a parent element will also be executed during the bubbling phase, as long as it's also listening for the same type of event **For example** *if we added another click event handler to the handler element, then during this whole process, both the handlers at the target and the header element would be executed when the click happens.*

* Now, sometimes we actually don't want this behavior and so in that case, we can prevent the event from bubbling up any further simply by calling the **stop propagation** method on the event object
* and this work in vanilla javascript and also in react, but it's actually very rarely necessary so only use this if there really is no other solution. 
* Okay, so this essentially how events work in the browser. 

![Image](./images/event-propagation-event-delegation-4.png)

![Image](./images/event-propagation-event-delegation-5.png)

## 📘Synthetic Events

![Image](./images/synthetic-events.png)

## 📘React Third Party Library

![Image](./images/react-3rd-party-library.png)


# 📔Effects and Data Fetching

## 📘Component lifecycle
* Major point is here that component life cycle is totally depend upon **useEffect**
* **useEffect** works only after the **painting on the browser** because if we Making an API request may cause the browser to become unresponsive until it receives a response from the server.


![Image](./images/component-life-cyle.png)

---

## 📘SideEffect

![Image](./images/side-effect-in-react.png)

![Image](./images/side-effect-in-react-1.png)

* Use **useEffect** with **async/await** method
```js
import React, { useEffect } from 'react';
import "./App.css";
function App() {

  useEffect(() => {
    (async function () {
      let data = await fetch('https://jsonplaceholder.typicode.com/posts');
      data = await data.json();
      console.log(data);
    }()
    )
  }, [])

  return null;
}

export default App;
```
---

## 📘Error Handling in useEffect
* when ever your do any kind of **api** call you always must do **Error Handling**, always use **try-catch**
* When ever user **Lost Internet Connection**
* **1xx, 2xx, 3xx, 4xx, 5xx** Errors
```js
import { useEffect, useState } from 'react';
import "./App.css";
function App() {
  const [loading, setLoading] = useState(false);
  const [posts, setPosts] = useState([]);
  const [error, setError] = useState('');

  useEffect(() => {
    (async function () {
      setLoading(true);

      try {
        let result = await fetch('https://jsonplaceholder.typicode.com/posts');

        if (!result.ok) throw new Error("Something went wrong with fetching posts")

        let data = await result.json();
        setPosts(data);
        setError('');
      } catch (error) {
        setError(error.message);
      } finally {
        setLoading(false);
      }
    }()
    )
  }, [])

  return <div>
    {loading && <h2>Loading...</h2>}
    {!loading && !error && posts.length > 0 ? <ul>
      {posts.map(item => {
        return (<li key={item.id}>{item.title}</li>)
      })}
    </ul> : null}

    {error && <h2> {error}</h2>}

  </div>;
}
export default App;
```
---



## 📘Dependency Array
![Image](./images/dependency-array.png)

![Image](./images/dependency-array-1.png)

![Image](./images/dependency-array-2.png)

![Image](./images/dependency-array-3.png)


Example : How useEffect Works after painting

```js
import { useEffect } from 'react';
import "./App.css";
function App() {

  // render on initial render
  useEffect(() => {
    console.log('A');
  }, [])

  // render on every sideEffect
  useEffect(() => {
    console.log('B');
  })

  // render on every render
  // it will print first because it render first in browser hence its a render logic
  console.log('C');
  return null;
}

export default App;

/*output
// initial render
C   
A
B

// on Every Render
C
B
*/
```

---

## 📘Clean-up Function

![Image](./images/cleanup-function.png)

* Clean-up function always works in two situation 
1. Unmount
2. Re-Rendering

```js
import { useEffect, useState } from 'react';
import "./App.css";

function List() {
  const [count, setCount] = useState(0);

  useEffect(() => {
    return function () {
      console.log('unmount count :', count);
    }
  }, [count])
  return (<div>
    <h3>count : {count}</h3>
    <button onClick={() => setCount(n => n + 1)}>Count</button>
  </div>)
}

function App() {
  const [show, setShow] = useState(true);

  return (<div>
    <button onClick={() => setShow(n => !n)}>{show ? 'Hide' : 'Show'}</button>
    {show && <List />}
  </div>)
}

export default App;
```

```js
// clean up function for http request

import { useEffect, useState } from 'react';
import "./App.css";

function UserDetails({ post }) {
  return (<div>
    <h3> Id : {post.id}</h3>
    <h3> User Id : {post.userId}</h3>
    <h3> Title : {post.title}</h3>
    <h3> Body : {post.body}</h3>
  </div>)
}


function App() {
  const [loading, setLoading] = useState(false);
  const [post, setPost] = useState({});
  const [error, setError] = useState('');
  const [id, setId] = useState('');

  useEffect(() => {
    const controller = new AbortController();
    (async function (id) {
      if (id) {
        setLoading(true);
        try {
          let result = await fetch('https://jsonplaceholder.typicode.com/posts/' + id, { signal: controller.signal });
          if (!result.ok) throw new Error("Something went wrong with fetching posts")

          let data = await result.json();
          setPost(data);
          setError('');
        } catch (error) {
          console.log('name', error.name);
          console.log('message', error.message);
          if (error.name !== "AbortError") {
            setError(error.message);
          }
        } finally {
          setLoading(false);
        }
      }
    }(id)
    )
    return function () {
      controller.abort();
    }
  }, [id])

  return <div>
    <input type='text' name='id' onChange={(e) => setId(e.target.value)} value={id} />
    {loading && <h2>Loading...</h2>}
    {!loading && !error && <UserDetails post={post} />}
    {error && <h2> {error}</h2>}

  </div>;
}
export default App;

```



---

















































## 📘Hooks

![Image](./images/react-hooks-1.png)

![Image](./images/react-hooks-2.png)
![Image](./images/react-hooks-3.png)
![Image](./images/react-hooks-4.png)

* we can initialize the values in useState Hooks by **callback function** as well
* It only works on **initial render**
* we cannot send parameters in **callback function**
* best use when we are getting values from local storage and try to initialize in first render.

```js
import React, { useState } from 'react'
import './App.css';

const App = () => {
  const [data, setData] = useState(() => {
    const data = [{ id: 1, body: 'ok' }, { id: 2, body: '22' }, { id: 3, body: '33' }];
    return data;
  });

  return (<div>
    {data.map(item => {
      return (<li key={item.id}>id : {item.id} &  body : {item.body}</li>)
    })}
  </div>
  )
}

export default App
```
![Image](./images/sumarry-usestate-hook.png)

## 📘UseRef
![Image](./images/useRef-1.png)

![Image](./images/useRef-2.png)

```js
import React, { useEffect, useRef } from 'react'
import './App.css';

const App = () => {
  //1. creating reference like creating element or class in vanilla javascript
  const inputRef = useRef(null);

  useEffect(() => {

    // printing the selected element which is in current property
    console.log(inputRef.current);
    
    // make focus on selected element
    inputRef.current.focus();
  }, [])

  return (<div>
    <input
      type='text'
      name=''
      //2. attaching that reference which is provided by useRef by react, because react is declarative in nature
      ref={inputRef}
    />
  </div>
  )
}

export default App
```

![Image](./images/useRef-3.png)

```js
import React, { useRef } from 'react'
import './App.css';

const App = () => {
  const inputValue = useRef('test');
  const inputHandler = (e) => {
    inputValue.current = e.target.value

    // it will print 
    console.log(inputValue.current);
  }

  // it will print only in install render after that it will not work
  console.log(inputValue.current);

  return (<div>
    {inputValue.current}
    <br />
    <input
      type='text'
      name=''
      onChange={inputHandler}
    />
  </div>
  )
}

export default App
```
---
## 📘Custom Hooks
![Image](./images/custome-hook.png)

## 📘Functional Vs Class Component
![Image](./images/functional-vs-class.png)


## 📘useReducer
![Image](./images/user-reducer-1.png)
![Image](./images/user-reducer-2.png)
![Image](./images/user-reducer-3.png)
![Image](./images/user-reducer-4.png)
![Image](./images/user-reducer-5.png)

## 📘Router
![Image](./images/router-1.png)
![Image](./images/router-2.png)
![Image](./images/router-3.png)
