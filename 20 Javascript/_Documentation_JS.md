## Hoisting




## This
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

## Functions
### IIFE
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

### Closure
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


### Currying
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