## 📔React with Typescript

### 📘Command
```
npx create-react-app <appname> --template typescript
```
---

### 📘Rules for TypeScript in React

![Image](./images/1-typescript-rules.png)

* There is no major change in react code like adding any special of fantastic code. 
* It only help in checking types
---

## 📔Types Around Props and State

### Changes with typescript

![Image](./images/changes-with-type.png)

----

### 📘Types in Props
![Image](./images/2-typesofprops.png)

Example

```javascript
import './App.css';

// creating interface 
interface ChildProps {
  color : string
}
function Child({color} : ChildProps) {
  return (
    <div>Hello World {color}</div>
  );
}

function App() {
  return (
    <div className="App">
        <Child color='red'/>
    </div>
  );
}

export default App;
```
---

### 📘Explicit Component Type Annotations

* Here is problem in this approach because its basically strictly tight to only *Typescript* not to *React*.

![Image](./images/3-problem-simple-approach.png)

* We did not get various options according to React like default value etc

![Image](./images/4-not-getting-various-option-according-to-react.png)

```javascript
interface ChildProps {
  color : string
}

const Child: React.FC<ChildProps> = ({color})=> {
  return (
    <div>Hello World {color}</div>
  );
}

// Or 

const Child: React.FunctionComponent<ChildProps> = ({color})=> {
  return (
    <div>Hello World {color}</div>
  );
}

```
* Best Approach for React with TypeScript and you will get all the various above options as well like default value etc.
* It also take care the children props automatically if we pass child elements in it (will not produce any error)

![Image](./images/5-react-typescript-approach.png)

![Image](./images/react-functional-component.png)
---


### 📘Annotations with Children(String, Function)
```javascript
import React from "react";

interface ChildProps {
  color: string;
  onClick: () => void;
}

const Child: React.FunctionComponent<ChildProps> = ({ color, onClick }) => {
  return (
    <div>
      Child {color} <br />
      <button onClick={onClick}>Click Me</button>
    </div>
  );
};

function Parent() {
  return (
    <div>
      <Child color="Red" onClick={() => console.log("Hello World")} />
    </div>
  );
}
export default Parent;
```
---

### 📘State with TypeScript UseState

```javascript

// string type
const [name, setName] = useState<string>('');

// Array of String
const [guest, setGuest] = useState<string[]>([]);

// Union Type
const [user, setUser] = useState<{name : string, age : number} | undefined>();

{user && user.name}
```

### 📘Event Handlers Events

```javascript
const EventComponent : React.FC= () => {
    
  const onChange = (event:React.ChangeEvent<HTMLInputElement>)  => {
          console.log(event.target.value);
  };

  const onClick = (event:React.MouseEvent<HTMLButtonElement>) => {
      console.log('Mouse Click')
  }

  const onDrag = (event : React.DragEvent<HTMLDivElement>) => {
      console.log('Drag Element');
      
  }

  return <div>
      <input onChange={onChange}/>
      <button onClick={onClick}>Click Me </button>
      <div draggable onDragStart={onDrag}>Drag Me !!!</div>
  </div>
}

export default EventComponent;
```

⚠️ Note : 
* You can get type of event by __Hovering__ on __Event Handler__ but its only work in __inline events__. 

![Image](./images/6-event-handling-types.png)

* You can get list of __Various Events__ by clicking on the __Event Interface__  and then click on __Go to Defination__
  
 ![Image](./images/7-event-interface.png)

![Image](./images/8-event-interface-go-to-defination.png)

### 📘useRef

```javascript
import { useEffect, useRef } from "react";
  const UseRefComponent : React.FC= ()=> {
  const inputRef = useRef<HTMLInputElement | null>(null);
    
  useEffect(()=>{
    if(!inputRef.current){
        return;
    }
    inputRef.current.focus();
  },[])
  
  return <div>
      <input ref={inputRef}/>
  </div>
}

export default UseRefComponent;
```
* __HTMLInputElement | null(null)__ this is line second parameter is used for checking null value beacuse we are providing __null__ value to it.
* in __useEffect__ we are checking the __inputRef__ is not ready do not render and wait untill it not created.

### 📘Redux
```
npm install @types/react-redux
npm install axios
npm install redux
npm install react-redux
npm install redux-thunk
```