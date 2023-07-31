
 # 📔Javascript Tricks
## 📘Destructuring

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
* Swaping numbers

```js
var a = 10;
var b = 20;
[a, b] = [b, a];

console.log(a, b);  
```
## 📘Console

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
console.log("%c Hello %cWorld", "color:yellow;", "background-color: red;")
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
## 📘Operators

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
* This **+** operator is use for 
  * concatinate the strings
  * Converting into Number
  * Adding the Numbers

```js
console.log("a" + "b");     // ab
console.log("a" + +"b");    // aNaN
console.log(+"a" + +"b");   // NaN
console.log(+"a" + "b");    //NaNb
```
* Short circuit **|| or &&**
```js
var number = 10 || '';          // 10
var name = true && 'Deepinder'  // 'Deepinder'
```

---
## 📘Strings

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
## 📘Arrays

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
* Index Value

```js
var test = ['Deepinder', 'Deepu', 'Deepi', 'Dp'];

console.log(test[0]);
console.log(test.at(0));

console.log(test[test.length - 1]);
console.log(test.at(3));
```
---
## 📘Objects

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
* 3 best features of Object

```js
const firstName = "Deepinder";
const key = 'lastname';
let obj = {
    firstName,           // key and value name same
    [key]: 'Singh',      // create dynamic key
    getFullName() {      // do not write to function keyword
        return this.firstName + ' ' + this[key]
    }
}
console.log(obj.getFullName());
```


---
## 📘Loops
* Use **For in** always on **Objects**
* Use **For of** always on **Array**
---

## 📘If-else

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
* if you have **very large if-else** statments then use **switch-case** code

## 📘International

* Currency

```js
// Simple Representation
const number = 1111122223333444.1;
const f = new Intl.NumberFormat("en-us", {
    currency: 'USD',
    style: "currency"
})

console.log(f.format(number));  // $1,111,122,223,333,444.10


// Compact Representation

const number = 11133444.1;
const f = new Intl.NumberFormat("en-us", {
    notation: "compact"
})

console.log(f.format(number));          // 11M  (Million)
```
* Date Format

```js
// Simple 
const f = new Intl.DateTimeFormat('en-us', {
})
console.log(f.format());        //  6/17/2023

// Simple 
const f = new Intl.DateTimeFormat('en-us', {
    dateStyle: "full",
    timeStyle: "full"
})
console.log(f.format());        // Saturday, June 17, 2023 at 7:30:41 PM India Standard Time

// Complex One
const today = new Date();
console.log(today.toLocaleString());    // 17/6/2023, 7:21:53 pm

const f = new Intl.DateTimeFormat('en-us', {
    dateStyle: "full",
    timeStyle: "full"
    // dayPeriod: "long"
})

console.log(f.format(today));   // Saturday, June 17, 2023 at 7:22:03 PM India Standard Time
```
* Relative Time
```js
const f = new Intl.RelativeTimeFormat('en-us', {
    style: "long"
})
console.log(f.format(-4, "days"))
```
* Adding Or Subtracting Days from Current date

```js
const date = new Date("june 21 2017");

// Adding One Day in given Date
date.setDate(date.getDate() + 1)

// Subtracting One Day in given Date
date.setDate(date.getDate() - 1)

date.toDateString()
```

---

## 📘Extra Features

* **Generate Random Numbers** in javascritp

```js
console.log(crypto.randomUUID());   // 1d35cbb8-e3ff-47b0-a9dc-8d0c499b9a56
```
* use of **use strick** mode
  * Not allowed to make unwanted variables (like created after spelling mistake) 
```js
const superLongVariable = "hi";
superLongVariables = "bye";        
console.log(superLongVariables);    // bye

// Correct one 
"use strict"
const superLongVariable = "hi";
superLongVariables = "bye";        
console.log(superLongVariables);    // bye
```

```html
<!-- using by Module -->
<script type="module">
    const superLongVariable = "hi";
    superLongVariables = "bye";         // error
    console.log(superLongVariables);    // bye
</script>
```