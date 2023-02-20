## Understanding Solid Principles in Javascript
|Letter|Function|
|-|-|
|S :|Single Responsibility|
|O :|Open/Close|
|L :|Liskov Substitution|
|I :|Interface Segregation|
|D :|Dependency Inversion|

> These Principles help us to understand 
* How to structure the code so the code will be robust
* Maintainable
* Flexible easy to test

## S : Single Responsibilty Principle
* *Only execute single task at a time*


* Wrong Impementation 
  * validating and Creating User in single function

```javascript
validateAndCreate = (name, password, email) => {
  const isFormValid = testForm(name, password, email);
  if (isFormValid) {
    User.Create(name, password, email)
  }
}

```
* Correct way : Divide the functions Separately
  * Only Validate
  * Only Creating New User
```javascript
validateRequest = (req) => {
  const isFormValid = testForm(name, password, email);

  //Form is valid
  if (isFormValid) {
    createUser(req);
  }
}

// only create user in the database
createUser = (req) => User.Create(req.name, req.password, req.email);
```
## O : Open/Close Principle
* *Open for extention, but closed to modification*
* *The idea of this priinciple is our system, it should provide a way to add the new functionalities by adding the new code in instead rather than modifying the existing code and not to break the existing functionalities*

```javascript
const roles = ["ADMIN", "USER"];
checkRole = (user) => {
  if (roles.includes(user.role)) {
    return true;
  } else {
    return false;
  }
}

checkRole('ADMIN') // true
checkRole('Foo') // false
```
* suppose we want to add one more role in future so instead of modifying pervious function we will create new function for adding array element

```javascript
// extention for modification
addRole(role) {
  roles.push(role)
}
addRole("SUPERUSER");

// do not touch old code
const roles = ["ADMIN", "USER"];
checkRole = (user) => {
  if (roles.includes(user.role)) {
    return true;
  } else {
    return false;
  }
}

checkRole('ADMIN') // true
checkRole('Foo') // false
checkRole('SUPERUSER') // true;

```

## L : Liskov Substitution Principle
* Simply put, the Liskov Substitution Principle (LSP) states that objects of a superclass should be replaceable with objects of its subclasses without breaking the application. 
* In other words, what we want is to have the objects of our subclasses behaving the same way as the objects of our superclass.

* Wrong way
  * as per this principle for example you have a __Bird Class__ , so in this bird class you have a fly method so this eagle class is extending this bird class so __Eagle class__ will have the __dive__ and __fly__ both the methods will be having to this eagle class, so bird is base class and eagle extending base class and it has two funtions now eagle can use both these two functions this is fine.
  * But so far so good so now if you have a __Penguin class__ and which is extending the bird class but *penguin can't fly as a bird*, Bird has a fly method penguin can't fly so here is the problem so this type of things we should not do.
  * As per this principle is doing is, how it helps us if we have a base class so fly is a base class it has a method and we should not extend base class to any of the other methods which are are not related, so penguin has no relation or it cannot extend or it cannot write function to the flight method so in this cases what exactly we need to do is we need to a scope  we need to again redesign the limited scope of the classes so the bird should be the base class , since __it should have the very specific nature of the bird instead of fly__ so wehave  to divide the classes in a such way that we have to scope of dividing the classes in specific way

```javascript
class Bird {
  fly() {
    //.....
  }
}

class Eagle extends Bird {
  dive() {
    //..
  }
}

const eagle = new Eagle();
eagle.fly();
eagle.dive();

class Penguin extends Bird() {
  // problem: Can't fly! 
}
``` 

* Correct Way
```javascript
class Bird {
  layEgg() {
    //...
  }
}

class FlyingBird {
  fly() {
    //...
  }
}

class SwimmingBird extends Bird {
  swim() {
    //...
  }
}

class Eagle extends FlyingBird { }
class Penguine extends SwimmingBird { }

const pengiun = new Penguine();
pengiun.swim();
pengiun.layEgg();
```  
## I : Interface Segregation Principle
* Clients should not be forced to depend on methods they do not use.
* Like pure vegetarian peron does not need for non-vegetarian menu and vice versa.

```javascript
// wrong 
// validation in class
class User {
    constructor(username, password) {
        this.username = username;
        this.password = password
        this.initiateUser();
    }
    initiateUser() {
        this.username = this.username;
        this.validateUser();
    }
    validateUser = (user, pass) => {
        console.log('validating.....')
    }
}

const user = new User("Deepinder", "123456");
//correct 
//ISP : validate only if it is necessary
class UserISP {
    constructor(username, password, validate) {
        this.username = username;
        this.password = password;
        this.validate = validate;
        // on the basis of true/false this function will work
        if (validate) {
            this.initiateUser(username, password);
        } else {
            console.log("no validation required");
        }
    }
    initiateUser() {
        this.validateUser(this.username, this.password);
    }
    validateUser = (username, password) => {
        console.log("validating ....");
    }
}
console.log(new UserISP("Deepu", "12345", true));
```
## D: Dependency Inversion Principle
* The general idea of this principle is as simple as it is important: High-level modules, which provide complex logic, should be easily reusable and unaffected by changes in low-level modules, which provide utility features. To achieve that, you need to introduce an abstraction that decouples the high-level and low-level modules from each other.

* Based on this idea, Robert C. Martin’s definition of the Dependency Inversion Principle consists of two parts:
  * High-level modules should not depend on low-level modules. Both should depend on abstractions.
  * Abstractions should not depend on details. Details should depend on abstractions.

```javascript
// wrong
http.get("http://address/api/examples", (res) => {
    this.setState({
        key1: res.value1,
        key2: res.value2,
        key3: res.value3
    });
});

// correct

//Abstract
const httpRequest = (url, setState) => {
    http.get(url, (res) => setState.setValues(res));
};

//State set in another function

// low level module
const setState = {
    setValues: (res) => {
        this.setState({
            key1: res.value1,
            key2: this.value2,
            key3: this.value3
        })
    }
}

// high level module
httpRequest("http://address/api/examples", setState);
```
