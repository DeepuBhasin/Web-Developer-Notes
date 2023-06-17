
 ## 📔Javascript Tricks
1. Destructring

* Converting Array into object
```js
var teckBrand = [
    "Facebook",
    "Apple",
    "Amazone",
    "Netflix",
    "Google"
]

var object = { ...teckBrand };
console.log(object);
```
* Bases on condition

```js
const state = true;
const student = {
    sid: 101,
    ...(state && { grade: 'pass' })
}

console.log(student);
```

2. Console

* console.time
```js
console.time();
var arr = Array(1000).fill('Hello world')
console.timeEnd();
```
* console.table
```js
// Array Example
var teckBrand = [
    {
        id: 1,
        name: 'Deepinder',
        job: 'Web developer'
    },
    {
        id: 2,
        name: 'Deepu',
        job: 'Web developer'
    },
    {
        id: 3,
        name: 'Dp',
        job: 'Web developer'
    }
];
console.table(teckBrand);

// Object Example

var response = {
    approvedPrograms: [
        { id: 1, name: 'Deepu' },
        { id: 2, name: 'Deepinder' },
        { id: 3, name: 'Deepi' }
    ],
    recomendedPrograms: [
        { id: 1, name: 'Deepu' },
        { id: 2, name: 'Deepinder' },
        { id: 3, name: 'Deepi' }
    ]
}
console.table(response)
```
* Color in Console

```js
console.log("%c Hello World", "color:yellow")
```
* console.group

```js
console.group("New Group");
console.log('Hello world 1');
console.log('Hello world 2');
console.log('Hello world 3');
console.log('Hello world 4');
console.groupEnd();
```
3. Operators

* use the **!!** operator to convert the result of an **expression into Boolean value**
```js
const grade1 = 'Pass';
console.log(!!grade1);

const grade2 = '';
console.log(!!grade2);
```

* use the **??** operator to check whether a variable is **null or undefined**
```js
var test;
console.log(test ?? 'undefined');

var test = null;
console.log(test ?? 'null');

var test = 'Deepu';
console.log(test ?? 'undefined or null');
```

* Return Expression

```js
function isAdult(age) {
    return age >= 18;       // true or false
}
```

4. Strings

```js
var str = 'Hello My name is Deepinder singh and I am working as React Engineer. I am working in various componies. I workimg very hard to learn new things. I am also woring in backend some time';

// exist
var sub = 'name';
var result = str.includes(sub)
console.log(result);            // true

//exist where 
var sub = 'name';
var result = str.indexOf(sub);
console.log(result);

//exist how many times
var sub = 'working';
var result = str.split(sub).length - 1;
console.log(result);
```
---

5. Arrays

* Flatten Array
```js
var arr = [1, [2, [3, [4, [5, [6, [7, 8, [9, 10]]]]]]]];
var result = arr.flat();
console.log(result);

var result = arr.flat(Infinity);
console.log(result);
```
* Remove Duplicate Value from Array

```js
var arr = [1, 1, 1, 1, 2, 2, 2, 3, 3, 3, 4, 4, 4, 5, 5, 5, 6, 6, 6, 6, 7, 7, 7, 8, 8, 8];
console.log(...new Set(arr));
```
---
6. Objects

* Getting Both key and values

```js
let obj = {
    name: 'Deepu',
    age: 29,
    phone: '9915099247',
    job: 'Developer'
}

for (const [key, value] of Object.entries(obj)) {
    console.log(`${key} : ${value}`);
}
```
---
1. Loops
* Use **For in** always on **Objects**
* Use **For of** always on **Array**

1. If-else

* Avoid nested simple if-else and use **ternary Operator**
* Avoid if-else ledder and use **Guard Clauses Technique**
```js
// wrong
function test() {
    if(wifi) {
        if(login){
            if(admin) {
                seeAdminPanel();
            }else {
                console.log('Must be Authorised')
            }
        }else {
            console.log('Must be Login')
        }
    }else {
        console.log('must be wifi')
    }
}

// correct one
function test() {
    if(!wifi) {
        console.log('must be wifi')
        return;
    }
    if(!login){
        console.log('Must be Authorised')
        return;
    }
    if(!admin) {
        console.log('Must be Login')
        return;
    }
    seeAdminPanel();
}
```
---