## 📘use strict

__Main Purpose :__ Enforce stricter parsing and error handling in your code.
1. Prevents the use of global variables 

```javascript
city = 'London';    // become global variable

console.log(city);

// after using 'use strict'

'use strict'

city = 'London';    // cause error

console.log(city);


// another example 
'use strict'

function test(){
    var a = b = 10;
}

console.log(a); // error
console.log(b); // error

test();

```


## 📘Hoisting

In javascript __variables and functions__ are all hoisted to the top of the scope in which they are declared. The scope is usually either global scope or a function scope.
 
 * varibles are always __partially hoisted__ and set to __undefined__.
 * functions are always __fully hoisted__.

Javascript Execution Context has two phase<br/>
1. Creation Phase
2. Execution Phase

so during the creation phase javascript engine moves your variables and function decelarations of the top their respective scope 
```javascript
console.log(number1);
var number1 = 10;

// javascript is doing this process in background
var number1;

console.log(number1);

number1 = 10;
```

```javascript
var num = 50;

function logNumber() {
    console.log(num);   // undefined
    var num = 10;
}

logNumber();
```

⚠️ Note <br/>
* __let, const, function Expression and classes__ are not hosited.
* __Temporal Dead Zone__ : 
  * is the time between the __decelaration__ and __the initialization__ of _let_ and _const_ variables.
  * Temporal Dead Zone is the term to describe the state where variables are in the scope but they are not yet declared.
  


![Image](./images/1-hositing-scope.png)

```javascript
function logNumber() {
    var num1 = num2 = 10;
}

console.log(num1)   // error    
console.log(num2)   // 20 beacuse it become global variable

logNumber();
```


```javascript
function test() {
    let total = 0;
    if (true) {
        var numberOne = 10;
        let numberTwo = 20;
        total = numberOne + numberTwo;
    }
    numberOne; // 10 beacuse of function scope
    numberTwo; // error beacuse of block scope
    total; // 30 beacuse of test function block scope
}
test();
```

## 📘 This
The __this__ keyword is actually pretty straightforward to understand __what is does is it refers to whatever object it is directly inside (property) of.__

* On Global Level : __this === window object__
* On Object Level : __this === current Object__ 

```javascript
let obj = {
    firstName: 'Deepu',
    lastName: 'Singh',
    getFullName: function () {
        return this.firstName + ' ' + this.lastName;
    }
}

obj.firstName // Deepu
obj.getFullName() // Deepu Bhasin
```
### 📑Self and Scope (with This)
Problem 

```javascript
var firstName = "Deepinder";

let obj = {
    firstName: "Deepu",
    getFullName: function () {
        console.log('First Name', this.firstName);
        
        function test() {
        // here it 'this' will refere to the window object
            console.log('First Name', this.firstName);
        }
        test();
    }
}

obj.getFullName();    
```

Solution 

1. By Passing reference of current object

```javascript
var firstName = "Deepinder";

let obj = {
    firstName: "Deepu",
    getFullName: function () {
        console.log('First Name', this.firstName);
        
        // passing reference 
        var self = this;
        
        function test() {
            console.log('First Name', self.firstName);
        }
        test();
    }
}

obj.getFullName();    
```
2. By binding 'this' with bind function

```javascript
var firstName = "Deepinder";

let obj = {
    firstName: "Deepu",
    getFullName: function () {
        console.log('First Name', this.firstName);
        
        function test() {
            console.log('First Name', this.firstName);
        }
        test.bind(this)();
    }
}

obj.getFullName();    
```

1. By using Arrow function

```javascript
var firstName = "Deepinder";

let obj = {
    firstName: "Deepu",
    getFullName : () => {
        console.log('First Name', this.firstName);
        
        function test() {
            console.log('First Name', this.firstName);
        }
        test();
    }
}

obj.getFullName();    
```
## 📘 Call, Apply and Bind Methods

These methods are used to __manipulate__ the __this__ keyword.

```javascript

functionObject.call(object, argument1,agrgument2, argument3, ...argumentn);

functionObject.apply(object,[argument1,agrgument2, argument3, ...argumentn]);

// it will return new copy of function
functionObject.bind(object, argument1,agrgument2, argument3, ...argumentn); 

```

Mostly used cases <br/>
1. __Function Borrowing__ : Taking function from other


```javascript
let obj1 = {
    firstName: "Deepu",
    lastName: "Bhasin",
    getFullName() {
        return this.firstName + ' ' + this.lastName
    }
}

let obj2 = {
    firstName: "Deepinder",
    lastName: "Singh"
}

obj1.getFullName.apply(obj2);

```

2. __Partial application__ : Partial refers to partially giving function parameter and then provide all parameter later.

```javascript
function multiply(a, b) {
    return a * b;
}

// window == this

let multiplyByTwo = multiply.bind(window, 2);
multiplyByTwo(4)    // 8

let multiplyByTen = multiply.bind(this, 10);
multiplyByTwo(5)    // 50
```

## 📘Functions
### 📑IIFE
__Immediately Invoked Function Expression__ - A function that is executed right after it is created.

```javascript
(function doubleNumber(num){
    return num * 2;
}(5));  // 10
```

Why are they used ? <br/>

The main reason to use and IIFE that, its __preserve a private scope with in your function__ which help to not overridding any global variables. 

```javascript
let firstName = 'Deepinder';
let lastName = 'Singh';

const student = (function(firstName,lastName){
    
    // You can write function also
    const getFullName = () => {
        return firstName + ' ' + lastName; 
    }
    
    return {
        firstName,
        lastName,
        getFullName
    }
})('Deepu','Bhasin');

firstName   // Deepinder  
student.firstName   // Deepu 
```

### 📑Closure
A __closure__ is an inner function that has access to the scope of an enclosing function.<br/>

A Closure has access to __variables__ in 3 separate Scopes : 
1. Variables in its own scope.
2. Variables in the scope of the outer function.
3. Variables in the global scope.

The closure also has access to __parameters__ :
1. Its own Parameters.
2. Parameters of outer function(s).

```javascript
const globalVariable = 'global var';

function outterFunc(param1) {
    
    const variable1 = 'var one';

    function innerFunc(param2) {
        const variable2 = 'var two';
        console.log('globalVariable: ', globalVariable);
        console.log('variable1: ', variable1);
        console.log('variable2: ', variable2);
        console.log('param1: ', param1);
        console.log('param2: ', param2);
    }
    
    innerFunc('param one');
}

outterFunc('param two');
```


### 📑Currying
This is technique in which, __function can take multiple parameters and__ instead using __currying , modify it into a function that takes one parameter at a time__

```javascript
function tripleAdd(num1, num2, num3) {
    return num1 + num2 + num3;
}

// converted into currying function

const tripleAdd = num1 => num2 => num3 => num1 + num2 + num3;

tripleAdd(10)(20)(30); // 60
```
Why is this usefull ? <br/>

Beacuse now i can create __mulitple utility functions__ out of this For example:

```javascript
const carriedMultiple = (number1) => number2 => number1 * number2;

const carriedMutipleBy5 = carriedMultiple(5);

carriedMutipleBy5(4); // 20
```

```javascript
// Write a function that keep track of how many times it was called and return that number
function myfunction() {
    let count = 0;
    return function () {
        count++;
        return count;
    }
}

let output = myfunction();

console.log(output());  // 1
console.log(output());  // 2
console.log(output());  // 3
console.log(output());  // 4
console.log(output());  // 5
```

## 📘Array Methods
1. .push
2. .pop