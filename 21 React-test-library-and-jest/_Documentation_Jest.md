### Testing Libraries
![Images](./images/1-various-pacakages.png)

### Extention of Test Files
![Images](./images/2-extention-of-test-files.png)

### Syntax and Explaination
![Images](./images/3-1-syntax-explanation.png)

![Images](./images/3.2-syntax-explanation.png)

## Complete Explaination

![Images](./images/4-1-render.png)

in this image, when ever we __render__ a __component__ a __Fake Browser Environment__ is created in __NodeJs Environment__ by library called __JS Dom__ it like create html elements over there.  

![Images](./images/4-2-screen.png)

in this image, we can access the element that are created in Fake Browser Environment by using __screen__ object and that is imported from __react-testing-library__ 

![Images](./images/4-3-aria-roles.png)

These are the various roles used while testing

> Various Queries

|Sri|Query|Detail|
|---|-----|------|
|1. |getAllByRoles|Will find mutilple elements in fake environment|
|2. |getByRoles|Will find exact Single elements in fake environment if it found more then one or less than one it will return error|

![Images](./images/4-4-expect.png)

These are the various expect (matchers) use while testing

![Images](./images/4-5-simmulating.png)

```javascript
    import users from "@testing-library/user-event";
```

You will get all simulates in user Object.