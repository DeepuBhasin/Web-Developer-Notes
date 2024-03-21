## 📘Information
1. HTML : Content Display/ Structure
2. CSS : Style & Design
3. Always follow Separation of concern like write css in css files and js in js files for good practice


# 📔Html

* **Block Element** : Which takes **100% width** example **Div, header, footer, section, aside, nav, main, article or all Semantic tags**
* **InLine Element** : which takes **content width** example **a , span**

**⚠️ Note :** To check the weather element is block or inline use **Border Style Property**

---

# 📔CSS

## 📘Selectors

1. Id : #
2. Class : .
3. Element : body, h1 div etc
4. Nested : in below example it will select all **p** elements in **about** id

```css
#about p {
    color: red
}
```
```html
 <div id="about">
    <h2 id="about-heading">About</h2>
    <!-- Apply here -->
    <p>Hello</p>
    <!-- Apply here -->
    <p>Hello</p>
    <!-- Not here -->
    <span>Hello</span>
</div>
```



---


## 📘Group Selections

1. Multiple Selectors
```css
#welcome-heading, #about-heading {
    color: green;
}
```


---

## 📘Units

* px
* % : to parent element
* em : font size of parent element
* rem : to font size of root element
* vw : to 1% of viewport width
* vh : to 1% of viewport height

---
## 📘Block-Inline

* **Block Elements :** 
1. are those elements which takes whole width example **li, div, p, h1**
2. We can apply margin, padding, positions like top, right etc

```css
#box{
    display : block;
}
```

* **Inline Elements :** 
1. are those elements which does not take
whole width instead only takes element/content width example **img, a**
2. We cannot apply margin, padding, positions etc

```css
#box {
    display: inline
}
```

* **Inline-Block** : 
1. this will create element block and inline element in which will not take whole width
2. We can also apply margin, padding, positions like top, right etc

```css
#box {
    display: inline-Block;
}
```

---


## 📘Font-Properties
* Serif : Has Edges
* Sans Serif : has not Edges

```css
body {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 18px;
    line-height: 10px;
    font-style: italic;
}
```

## 📘Aligning Only Text
* it will only align the text not the other elements like div etc
```css
#btn {
    text-align: right;
    text-align: center;
    text-align: left;
    text-align: justify;
}
```
---


## 📘Color

```css
body {
    color: red;
    color: rgb(1, 1, 1);
    color: #474638;
}
```

## 📘Background

```css
body {
    background: url("./test.jpg");
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
}
```


---

## 📘Box-Model
* There is always **margin and padding** by default on elements such as h1, p, etc., in every browser.
* To Eliminate this issue we us **CSS Reset**.
* After using this we have to set margin and padding for each elements.
```css
/* Called CSS Reset */
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
```
* Padding & Margin Short-Hand
```css
body {
    /* Top Left Bottom Right */
    padding: 10px 20px 10px 20px;

    /* Top/Bottom Left/Right */
    padding: 10px 20px;
}
```

**⚠️ Note :**
1. Ul li element has by default **40px padding**


---

## 📘Max-width

* Always use max-width instead of width.
* Width create horizontal scrollbar

```css
.container {
  max-width: 600px;
}
```
Example : In this example, the .container element can be any width up to 600 pixels. If the viewport or container is less than 600 pixels wide, the element will adjust accordingly. However, it will not exceed a width of 600 pixels, even if the container or viewport is wider.



---

## 📘Center Div

1. using margin auto

```css
 #container {
    margin: auto;
    max-width: 930px;
}
```