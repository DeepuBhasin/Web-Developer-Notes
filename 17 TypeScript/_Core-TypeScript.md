## 📘What is TypeScript
![Image](./imags/what-typescript.jpeg)

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

Command for installing Typescript on Globally

```
npm install -g typescript
```
* TypeScript is *Programming language* heance need **complier** for execute the codes.
* Extention is **.ts**

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
⚠️ **Note :** always import javascript file *beacuse* browser can only understand *javascript* not the typescript