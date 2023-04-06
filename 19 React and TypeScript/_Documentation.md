### Command
```
npx create-react-app <appname> --template typescript
```
### Rules for TypeScript in React
![Image](./images/1-typescript-rules.png)

### Types in Props
![Image](./images/2-typesofprops.png)

### Basic Example of PropType (String)

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
> Problem in Above approach
* Here is problem in this approach beacuse its basically strictly tight to only _TypeScript_ not _React_.

![Image](./images/3-problem-simple-approach.png)

* We did not get various options according to React

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
```
* Best Apporach for React with TypeScript

![Image](./images/5-react-typescript-approach.png)
