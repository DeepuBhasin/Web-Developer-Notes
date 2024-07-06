### 📘Information

* The DOM is often referred as DOM Tree (the tree contains thousand of object called as nodes example head node body node etc)

* If you want to work in a browser environment, it's essential to understand the DOM (Document Object Model). However, on the Node.js side, understanding the DOM is not necessary.

---

### 📘What is the DOM? & How the DOM Works


**What is the DOM?**

The DOM (Document Object Model) is a way to represent a web page as a tree of objects.

**How it Works**

1. **Loading**: When a browser loads a web page, it reads the HTML and creates a tree-like structure called the DOM.
2. **Structure**: This tree has nodes for each part of the page (e.g., elements like \<div>, \<p>, attributes, and text).
3. **Manipulation**: JavaScript can use the DOM to change the page. For example, it can add or remove elements, change text, or modify styles.
In simple terms, the DOM lets you use JavaScript to make your web page dynamic and interactive by changing the content and structure on the fly.

---

### 📘Document Object

The window object is the global object in a web browser. The document object, which is part of the window, contains all the properties and methods needed to access and manipulate HTML elements.

To access the document object, you can use:

```js
window.document

// OR

document
```
Both references point to the same object, making it easy to work with the structure and content of a webpage.

---

### 📘console.log() vs console.dir for document
* **console.log()**: Displays the element in a readable format, showing its HTML structure.

* **console.dir()**: Displays the element as a JavaScript object, showing its properties and methods.

Use console.log() to see the element as it appears in the HTML, and use console.dir() to explore its detailed JavaScript object structure.

```js
document

// or

console.log(document)
```

![console](./images/dom-part-console.log-1.png)


```js
console.dir(document)
```

![console](./images/dom-part-console.dir-2.png)

---

### 📘DOM Api

The DOM (Document Object Model) API is a set of tools provided by the browser that lets you interact with and manipulate the content and structure of a webpage using JavaScript. It allows you to add, remove, or change elements and their attributes, and to respond to user interactions like clicks and key presses.

---


### 📘Difference between DOM and BOM

**DOM (Document Object Model)**

* What it is: The structure of a web page.
* What it does: Lets JavaScript change the content and layout of the page (e.g., adding or removing elements).

**BOM (Browser Object Model)**
* What it is: The browser window and its features.
* What it does: Lets JavaScript control the browser (e.g., opening new windows, navigating history).

So, the DOM deals with the page content, and the BOM deals with the browser itself.

---
### 📘What is the difference between DOM and the javascript

* The Document Object Model (DOM) is created by the browser when it loads a web page. The browser parses the HTML and generates the DOM, which represents the structure of the document as a tree of objects. **The DOM object is created by browser only** and this allows JavaScript and other scripts to interact with the document's content and structure.



* The DOM (Document Object Model) is indeed a structured representation of the HTML in a webpage and it is manipulated using JavaScript objects. While it can be interacted with using regular JavaScript objects and methods, the DOM itself is a separate API (Application Programming Interface) provided by the browser, not a regular JavaScript object.

**Here’s a more detailed comparison:**

1. **DOM Objects:**

    * Structure: Represents the structure of the webpage as a tree of objects.

    * Interaction: Provides methods and properties to manipulate the structure and content of a webpage (e.g., getElementById, querySelector, appendChild).

    * Interface: Designed to interact with and manipulate HTML documents.

2. **Regular JavaScript Objects:**

    * Structure: General-purpose data structures used to store key-value pairs.
   * Interaction: Used for a wide variety of programming tasks, not limited to DOM manipulation.

   * Interface: Includes standard JavaScript methods and properties for object manipulation (e.g., Object.keys, Object.assign, dot notation for accessing properties).

In summary, while DOM objects and regular JavaScript objects can sometimes be used in similar ways, the DOM provides a specialized API tailored specifically for working with the structure and content of web documents, whereas regular JavaScript objects are more generic and versatile.

### 📘HTML vs DOM

HTML (HyperText Markup Language) and DOM (Document Object Model) are related but different.

**HTML:**

1. It's the language used to create and structure web pages.

2. It uses tags like \<div>, \<p>, \<h1>, etc., to define elements on a page.

**DOM:**

1. It's a programming interface for web documents.

2. It represents the structure of a web page as a tree of objects.

3. It allows scripts to update the content, structure, and style of a document.

Simple Explanation:

* HTML is the code you write to build a webpage.

* DOM is how the browser understands and interacts with that code.

### 📘What is Render tree

* The render tree is a structure used by browsers to display a web page on the screen. Render tree only consists of what will eventually be paint on the screen. So it make sense that the render tree will exclude certain elements that are not meant to be displayed. 

* We have paragraph element set to display none, the render tree will excluded it from being painted on the screen, but it exist in DOM






It's created by combining two things:

**DOM (Document Object Model):**

This is a tree-like representation of the HTML structure of a web page.

**CSSOM (CSS Object Model):**

This is a tree-like representation of the CSS styles that apply to the HTML elements.

Simple Explanation:

* The DOM tells the browser what elements are on the page.
* The CSSOM tells the browser how those elements should look.
* The render tree combines this information to figure out what to actually show on the screen.

### 📘Whats is DOM API ?

* A DOM API (Document Object Model Application Programming Interface) is a set of tools that allows developers to interact with and manipulate the structure, style, and content of web pages using programming languages like JavaScript.

* It plays a role of bridge in between Javascript and Browser. 

### 📘Difference DOM Code and Javascript Code

![Image](./images/dom-code-vs-javascript-code.png)


**Various DOM methods to access elements**
| Sr No | Method Name                         | Return type                                                                                 | notes                                                                                                                                                                                                                                 |
| ----- | ----------------------------------- | ------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| 1.    | document.getElementById();          | element object                                                                              |                                                                                                                                                                                                                                       |
| 2.    | document.getElementByClassName();   | HtmlCollection (its like an array but not an array but only native for loop will work here) |                                                                                                                                                                                                                                       |
| 3.    | document.getElementByTagName();     | HtmlCollection (its like an array but not an array but only native for loop will work here) | Avoid as much you can because it create performance issue                                                                                                                                                                             |
| 4.    | document.getElementBySelector();    | element Object                                                                              | **Always return single element** <br/> **#id**: select Id <br/> **.className** : select class <br/>      **a : hover** : select pseudo classes <br/> **#text.className** : Select that element which have text id and className class |
|       |
| 5.    | document.getElementBySelectorAll(); | NodeList                                                                                    | **Always return multiple elements**                                                                                                                                                                                                   |

**⚠️ Note :** on HtmlCollection forEach loop will not work only native for-loop will work, but on NodeList both will work 

**Apply JS on the fly**

![Image](./images/apply-js-on-fly.png)


**Example**

```html
<div id="first-name">Deep</div>
<div class="header">header 1</div>
<div class="header">header 2</div>
<script>
    const firstName = document.getElementById('first-name');
    firstName.style.background = 'red';
    firstName.style.color = 'white'

    const headers = document.getElementsByClassName('header');
    for (let i = 0; i < headers.length; i++) {
        headers[i].style.border = '1px solid black';
        headers[i].style.padding = '10px';
    }
</script>
```