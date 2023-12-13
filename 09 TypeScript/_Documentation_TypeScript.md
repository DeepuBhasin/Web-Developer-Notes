
## 📔Getting Started with Typescript

* **TypeScript :**
1. Helps us catch errors during development  (i.e before the code gets **compiled**) which force you to write Filter, cleaner and better code.
2. **Uses 'type annotations' to analyze our code.**
3. Our active during development.
4. Doesn't provide any performance optimization.
5. It fix all errors on **run-time**.



![Image](./images/what-typescript.jpeg)


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
![Image](./images/runtime-compile-time.png)

---

### 📘Informatics for typeScript
1. After putting colons **:** we enter into the *typeScript* world.



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

---

## 📔TypeScript Basics Basic Types

### 📘Core Types

![Image](./images/core-typescript.png)

Core javascript Example for **type checking**, but we are checking Error on **Run Time**, which effect our speed

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
4. Object Type : you can use with *type* and *interface*
```javascript
// 1. Defining only object type
let Person : Object {
  name : 'Deep',
  age : 30
}


// 2. Defining Object type with defined properties
type Person = {
  name: String;
  age: Number;
};

let person: Person = {
  name: "Deepu",
  age: 30,
};
console.log(person.name);


//3. Defining Object type with defined properties with specific values
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
**⚠️Note :** Difference between *type* and *interface*

```js
// In General we always use type keyword

/*
For type
1 it also allow you create other types other than object type (custom type  )
*/

type UserType = "Admin" | "Viewer";
type AddFn = (a: number, b: number) => number;

/*
for Interfaces
1. Implement in Classes
*/

interface Credentials {
  email: string;
  password: string;
}

let cred: Credentials;
cred = {
  email: "dp",
  password: "dp",
};

class AuthCredentials implements Credentials {
  email: string = "ok";
  password: string = "ok";
  username: string = "ok";
}

function Login(credentials: Credentials) {
  return;
}

Login(cred);
Login(new AuthCredentials());

// 2. Extend Interface
interface Credentials {
  mode: string;
}
```


5. Array of String & Nested Array

```javascript
type PersonDetails = {
  hobbies: string[];  // Array<string>
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
8. Any

```javascript
type Person {
    role : any[];
}

let person : Person = {
    role : [2, 'Admin', true]
}
```
9. Union Type (means or type)

```javascript
let age : number | string;

```
10. Literal Type
```javascript
// Example with values
type MyName = "Deepu" | "Dp";

function test(name: MyName) {
  return name;
}

test("Dp");
test("ok"); // cause error because value not in option

// Example with data types

type Admin = { permission: string[] };

type AppUser = { userName: string };

type MobileApp = Admin | AppUser;

type AppAdmin = Admin & AppUser;

let admin: AppAdmin;
let addMobile: MobileApp;

admin = { permission: ["login"], userName: "Admin" };
addMobile = { permission: ["Local"] };

interface newAdmin {
  permission: [];
}

interface newAppUSer {
  userName: string;
}
interface NewAppAdmin extends newAdmin, newAppUSer {}

interface NewMobileApp extends newAdmin {}
```

11. Types Aliases Custom Types

```javascript

let role : number | string;

// instead of above we can use the below statement

type Role = number | string;
type ValidUser = boolean | number;
type AddingTwoNumber = (a: number, b: number) => number;

let role: Role;
let isLogin: ValidUser;
let sum: AddingTwoNumber = (a, b) => {
  return a + b;
};

sum(3, 3);
```
---
12. Making Sense Of Generic Types

```js
// 1. For Type
type DataStorage<T> = {
  // here T is called place holder
  storage: T[];
  add: (data: T) => void;
};

type User = {
  name: string;
  age: number;
};

let textStorage: DataStorage<string> = {
  storage: ["f", "g"],
  add: (d) => console.log(d),
};

let userStorage: DataStorage<User> = {
  storage: [{ name: "dp", age: 30 }],
  add: (user) => console.log(user),
};

//2. For Functions
function merge<T, U>(a: T, b: U) {
  return {
    ...a,
    ...b,
  };
}

const userFn1 = merge<{ name: string }, { age: number }>(
  { name: "Dp" },
  { age: 29 }
);

// type script is intelligent enough that what parameter you are sending and where we have to bind it
const userFn2 = merge({ name: "Dp" }, { age: 29 });
```

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

---

## 📔The TypeScript Compiler and its Configuration

### 📘Using Watch Mode (for single file)
```js
"scripts": {
  "compile": "npx tsc index.ts --w"
}
```
```
npm run compile
```

---
### 📘Using Watch Mode (for Multiple file/Complete Folder)
* this command will create *tsconfig.json* file which only use during setup only
```
npx tsc --init
```

* After set up *tsconfig* file, then this command will compile whole ts files in folder

```
npx tsc
```

* now this command will watch all ts files in the folder

```
npx tsc --watch
```

### 📘Exclude and Include Files
* Add this property in *tsconfig.json*

```js
"exclude": ["./node_modules", "./sending.ts", "*.proposal.ts"],
"include": ["./index.ts"],
"files": ["./index.ts"]   // same like include
```
---

### 📘Setting a Compilation Target
*  Set the JavaScript language version for emitted JavaScript and include compatible library declarations like *let const & var*.

```js
"target": "es2016",
```

---
### 📘Understanding TypeScript Core Libs

*  Specify a set of bundled library declaration files that describe the target runtime environment.

```js
"lib": [
  "DOM",
  "ES6",
  "DOM.Iterable",
  "ScriptHost"
]
```
---

### 📘Working with Source Maps

* Create source map files for emitted JavaScript files, this will help to debug our code on the browser
* This files help use for *Debugging and Development* like for example *just in case we want to see js files in our browser (source tab) in that case we are not able to understand that code because it get minified or compiled version*

```js
"sourceMap": true
```

![Image](./images/source-map-1.png)

![Image](./images/source-map-2.png)