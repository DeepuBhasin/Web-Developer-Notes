## 📘What is DOM
* *In Simple words DOM is basically a connection point between HTML documents and Javascript Code. *
* DOM is automatically created by the browser as soon as the HTML page loads and it's stored in a tree structure like in the given image, in this each html element is one object

![Image](./images/dom-what-is-dom.png)

![Image](./images/dom-tree.png)


* **DOM** and **DOM Methods** are actually part of something called the **web APIs**. so the web API are like **libraries** that browsers implement and that we can access from our javascript.
* Web Api are basically libraries that are also written in javascript and that are automatically available for us to use.
* And there is actually an official DOM specification that browser implement, which is the reason why DOM manipulation works the same in all browsers.
* There are various API like timer, fetch 

![Image](./images/dom-not-part-of-javascript.png)

---
# 📔DOM Manipulation Api's

## 📘Selectors

* **querySelector**
* use to select particular element
* for **class** use **'.'** and for **id** use **#**
```html
<div id="message">Hello World ...</div>
<script>
    console.log(document.querySelector('#message'));
</script>
```
![Image](images/dom-query-selector.png)

---
## 📘Assigner

* **textContent**
* use to **get** the text content in the element
* use to **set** the text content for the element
```js
const msg = document.querySelector('#message');1
// Hello World ...
console.log(msg.textContent);

// setting new test 
msg.textContent = 'testing ....';

// to select Body element
const bodyElement = document.querySelector('body');

```
---

## 📘Event Listeners
* An Event is something that happens on the page for example a mouse click, or a mouse moving or a key press or many other events Then with an event listener we can wait for a certain event to happen and then react to it.

```html 
<button id="btn"> Click Me</button>
<script>
    let btn = document.querySelector("#btn");
    btn.addEventListener("click", function () {
        alert("Hello World")
    })
</script>
```
⚠️ **Note :** when ever you get *any value* from DOM  the *type* of that value is always **string**

## 📘Style

```html
<button id="btn">Change</button>
<div id="message">Hello World</div>
<script>
    let btn = document.querySelector("#btn");
    btn.addEventListener("click", function () {
        const msg = document.querySelector('#message');
        msg.style.color = 'red';
        msg.style.fontStyle = 'italic';
        msg.style.fontSize = '50px';
        msg.style.backgroundColor = 'yellow';
        msg.style.marginTop = '20px'
        msg.style.marginLeft = '20px';
    })
</script>
```
![Image](./images/dom-style.png)