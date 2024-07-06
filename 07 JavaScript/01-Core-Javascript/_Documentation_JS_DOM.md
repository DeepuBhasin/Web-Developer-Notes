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

### 📘 DOM vs Html Vs Javascript Vs BOM

1. HTML (HyperText Markup Language)

    * What it is: The standard language used to create and structure web pages.
    
    * Purpose: Defines the structure and content of a web page (e.g., paragraphs, headings, links, images).
    
    * Example: \<p>This is a paragraph.\</p>


2. JavaScript
    
    * What it is: A programming language used to create interactive and dynamic content on web pages.
   
   * Purpose: Adds functionality and behavior to web pages (e.g., form validation, animations, responding to user actions).
   
   * Example: document.getElementById("myButton").onclick = function() { alert("Button clicked!"); };

3. DOM (Document Object Model)
    * What it is: A programming interface for HTML and XML documents.
   
   * Purpose: Represents the structure of a document as a tree of objects, allowing JavaScript to access and manipulate the content, structure, and styles of a web page.
   
   * Example: document.getElementById("myDiv").innerHTML = "Hello, World!";

4. BOM (Browser Object Model)
   * What it is: A set of objects provided by the browser to interact with the web browser itself (outside of the document content).
   
   * Purpose: Allows JavaScript to interact with the browser (e.g., control the browser window, manage cookies, retrieve browser information).
   
   * Example: window.alert("This is a BOM example!");

Summary

* HTML defines what elements appear on a web page.

* JavaScript makes those elements interactive.

* DOM is the bridge that lets JavaScript interact with and modify the HTML content.
* BOM is how JavaScript interacts with the browser outside of the web page content (like alert boxes and browser navigation).

---



### 📘Whats is DOM API ?

* A DOM API (Document Object Model Application Programming Interface) is a set of tools that allows developers to interact with and manipulate the structure, style, and content of web pages using programming languages like JavaScript.

* It plays a role of bridge in between Javascript and Browser. 

---


### 📘DOM Vs Critical Render Vs CSSOM VS Node

1. DOM Tree

    DOM (Document Object Model) Tree:

    * It's a tree-like structure that represents the content of a web page.

    * The tree is made up of nodes, which can be elements, attributes, or text.

    Example:

    Imagine you have this HTML:

    ```html
    <html>
    <body>
        <h1>Hello World</h1>
        <p>This is a paragraph.</p>
    </body>
    </html>
    ```

    The DOM tree for this HTML looks like this:

    ```css
    html
    └── body
        ├── h1
        │    └── Text: "Hello World"
        └── p
            └── Text: "This is a paragraph."
    ```


2. Render Tree

    Render Tree:

    * It's another tree structure used by the browser to display the web page.

    * It combines the visual aspects (CSS) with the content from the DOM.

    * Only visible elements are included in the render tree (e.g., hidden elements in the DOM won't be in the render tree).

    Example:

    Using the same HTML with some CSS:

    ```html
    <html>
    <body>
        <h1 style="display:none;">Hello World</h1>
        <p>This is a paragraph.</p>
    </body>
    </html>
    ```

    The render tree will look like this:

    ```css
    body
    └── p
        └── Text: "This is a paragraph."
    ```

3. CSSOM
    
    CSSOM (CSS Object Model) Tree represents the styles for the document. It is built from all the CSS rules in the document and any styles applied directly to the elements

    ```css
    h1 {
        color: blue;
    }
    p {
        font-size: 14px;
    }
    ```
    CSSOM Tree:

    ```css
    h1 {
        color: blue;
    }
    p {
        font-size: 14px;
    }
    ```

4. Node in DOM

    Node in DOM:

    * A node is a single point in the DOM tree.

    * It can be an element (like \<p>), text within an element, or even an attribute.

    Example:

    In the HTML example above:

    * The \<html> tag is a node.

    * The \<body> tag is a node.

    * The text "Hello World" is a text node within the \<h1> element.

    * The style="display:none;" is an attribute node of the \<h1> element.

In summary:

* The DOM tree represents all the content of the web page.
* The render tree represents only the parts of the content that are visible and styled.
* A node in the DOM is any single item in the DOM tree, like an element, text, or attribute.

**⚠️ Note :** The DOM has to consists the HTML code and the HTML spec required that all content must be inside in body tag.

---

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
---

