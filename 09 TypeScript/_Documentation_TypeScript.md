
## 📔Getting Started with Typescript

* **TypeScript :** 
1. Helps us catch errors during development  (i.e before the code gets **compiled**) which force you to write Filter, cleaner and better code.
2. **Uses 'type annotations' to analyze our code.**
3. Our active during development.
4. Doesn't provide any performance optimization.
5. It fix all errors on **run-time**.

![Image](./images/what-typescript.jpeg)

![Image](./images/converting-typescript-into-javascript.png)

📚 **Conceptual Example :** 

```javascript
 function add(num1, num2) {
    if (typeof num1 === 'number' && typeof num2 === 'number') {
        return num1 + num2;
    } else {
        return +num1 + +num2;
    }
}
console.log(add(1, 2));
console.log(add('1', '2'));
```
---
### 📘Environment Setup 
* Command for installing Typescript on Globally
```
npm install -g typescript ts-node
```

* To check 
```
npx tsc --help
```

* TypeScript is *Programming language* hance need **complier** for execute the codes.
* Extension is **.ts**

Example 

```javascript
// index.ts
const btn = document.querySelector('#button')! as HTMLButtonElement;
const num1 = document.querySelector('#num1')! as HTMLInputElement;

function add(num1 : number, num2 : number) {
    return +num1 + +num2;
    
}
console.log(add(1, 2));
```

Command to execute File
```
npx tsc index.ts
```
This command will create a new file **index.js** and convert your whole typescript code into javascript code

```javascript
var btn = document.querySelector('#button');
var num1 = document.querySelector('#num1');
function add(num1, num2) {
    return +num1 + +num2;
}
console.log(add(1, 2));
```
⚠️ **Note :** always import javascript files in *html files* *because* browser can only understand *javascript* not the *typescript*

![Image](./images/typescript-overview.png)
---

## 📔TypeScript Basics Basic Types

## 📘Core Types

![Image](./images/core-typescript.png)

* Core javascript Example for **type checking**, but we are checking Error on **Run Time**, which effect our speed 

```js
function add(n1, n2) {
    if (typeof n1 !== 'number' || typeof n2 !== 'number') {
        throw new Error('Invalid Input');
    }
    return n1 + n2;
}

console.log(add(2, 3.5));   // 5.5
console.log(add('2', 3));   // Error
```
⚠️ **Note :** The key difference is: **Javascript use "dynamic types"** (resolved at runtime), **TypeScript uses "static types"** (set during development)

---

### 📘Various types in TypeScript

1. Number Type
```javascript
let age : number = 1;

function add (n1:number, n2:number) {
    return n1 + n2;
}
```
2. Boolean Type 
```javascript
let isLogin : boolean = true;
```
3. String Type

```javascript
let fullName : string = 'Deepinder Singh';
```
4. Object Type 
```javascript
// 1. Defining data type only
type Person = {
  name: String;
  age: Number;
};

let person: Person = {
  name: "Deepu",
  age: 30,
};
console.log(person.name);

//2. Defining value only
type Person = {
  name: String;
  age: 30 | 31 | 32;    // defining 3 values only
};

let person: Person = {
  name: "Deepu",
  age: 33,  // this line will cause error
};
console.log(person.name);

```
5. Array of String & Nested Array

```javascript
type PersonDetails = {
  hobbies: string[];
  speedOfCar: number[];
  loggedInHistory: boolean[];
  jobInCompanies: { companyName: string; timeSpent: string }[];
};

let person: PersonDetails = {
  hobbies: [],
  speedOfCar: [],
  loggedInHistory: [],
  jobInCompanies: [],
};

```
6. Tuple
```javascript
type Person {
    name : String;
    age : Number;
    role : [Number, String];    // only can add two types with fixed length
}

let person : Person = {
    name : 'Deepinder',
    age : 19,
    role : [2, 'Admin']
}

// Because in tupal we cannot add more than two element
person.role.push('operator')    // Error
```
7. Enum Type
  
```javascript
enum Role {
  ADMIN = "admin",
  READ_ONLY = "read_only",
  AUTHOR = "author",
}
let person = {
  name: "Deepinder",
  age: 19,
  role: Role.ADMIN,
};

if (person.role === Role.ADMIN) {
  console.log("Admin");
}
```
9. Any
  
```javascript
type Person {
    role : any[];
}

let person : Person = {
    role : [2, 'Admin', true]
}
```
10. Union Type (means or type)
  
```javascript
let age : number | string;

```
11. Literal Type (matching with exact value)
```javascript
function test (name : 'Deepu' | 'Dp') {
    return name
}

test('Dp');
test('ok'); // cause error because value not in option
```

12. Types Aliases Custom Types

```javascript
type Role = number | string;
type ValidUser = boolean | number;

let role: Role; 
let isLogin  : ValidUser;
```
13. Function Return Type

```javascript
// returning number
function add(n1 : number, n2 : number) : number {
    return n1 + n2;
}

// returning void
function printValue () : void {
    console.log('Hello World')
} 

add(1,2);
```
---

### 📘Functions Type
1. Return Type

```js
function sum(n1 : number, n2 : number) : number {
    return n1 + n2;
}

sum(1, 2);
```
2. Void Type

```js
function printValue (n1: number, n2 : number) : void {
    console.log(n1 + n2);
}

printValue(1, 2);
```
**⚠️Note :** like in above example if do like this *console.log(printValue(1, 2))* then we get *undefined* because *console.log()* has return type is *undefined* and we cannot set return type as *undefined* for any **function** use always *void* instead of *undefined*

```js
function sum() {
    return;     // undefined
}

sum()
```
4. Function as type

```js
let sumOfTwoNumber = (a: number, b: number): number => {
  return a + b;
};
let subtractOfThreeNumber = (a: number, b: number, c: number): number => {
  return a + b + c;
};

let commonFunction: (a: number, b: number) => number;

commonFunction = sumOfTwoNumber;

commonFunction(1, 2);

commonFunction = subtractOfThreeNumber; // cause error
```
![Image](./images/function-as-type.png)


5. Callback Type

```javascript
function cal(n1 : number, n2 : number, cb : (res : number) => void) : void{
    let result  = n1 + n2;
     cb(result);
}

cal(1, 2, (result) => console.log(result));
```


### 📘Error Type
1. Never Type

```javascript
// These type are use when we want to throw errors

function generateError(message : string, code : number) : never {
    // through types error are never type
    throw {message: message, errorCode : code}
}

const result = generateError('An error occured !', 500);

console.log(result) // not print undefined
```

⚠️ **Note :** 
* Where to use or not
```javascript
// its not a good practice
let age : number = 1; 


// Good practice
let age : number;
age = 10;
```
* Avoid **any** type as much you can

