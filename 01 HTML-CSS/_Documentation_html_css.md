### 📘Information
1. HTML : Content Display/ Structure

2. CSS : Style & Design

3. Always follow Separation of concern like write css in css files and js in js files for good practice

4. **kebab case** mostly use in CSS example **main-heading**

5. Real world we mostly use classes instead of id for future use

6. Always use Vector Images (SVG)

7. For Icons [PhosphorIcons](https://phosphoricons.com/) [HeroIcons](https://heroicons.com/)

8. Fallback Mechanism : means if one thing is fail then other will handle example

```css
* {
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
/* if first font  does not exist then it will check for next and so on... */
```
9. Intrinsic Sizing Vs Extrinsic Sizing
```css
div {
    width : auto    /* This is Intrinsic*/
}

div {
    width : 100px;  /* This is Extrinsic  */
}
```
10. Some Extensions to determines css font properties
    1.  What font - font finder
    2.  Font finder (best one)

11. Best font-families

```css
body {
    /* Best when want to show simple text */
    font-family: 'Courier New', Courier, monospace;
}
```

---


## 📔VS Code ShortCut

![Vs-Code](./images/vs-code.png)

![alt text](./images/vs-code-2.png))


## 📔Html

1. Basic Structure : html, head, title, body and extension
2. Tags : refer to individual tags like pair or un-pair tag
3. Elements : is entire line (these are components)
4. Attribute : Are use to alter the behavior of elements
5. Block/Inline element
   * **Block Element** : Which takes **100% width or auto width ** example **form, div, header, footer, section, aside, nav, main, article or all Semantic tags**
   * **InLine Element** : which takes **content width** example **a , span, button, all inputs**
   * **⚠️Note :** To check the weather element is block or inline use **Border Style Property**

6. Topography and Tags with their attributes:
   1. Heading
   2. paragraph tags
   3. Strong and em
   4. comments
   5. List : Order List and Un-ordered list with attributes.
   6. Hyperlinks : with attributes and path system.
   7. Id Attribute : is selector to select element and use example to redirect to particular section.
   8. image : alt, height, width attributes
   9. table
   10. forms: labels, various inputs, textarea, buttons and their attributes

7. **Page layout** :
   1. Semantics tags : Relating to meaning in language or logic. It help to make group contents like header,footer etc its a good practice and always use
      1. Search engine and SEO optimization
      2. Accessibility
      3. Readability
      4. Cleanliness (no need to write to many comments)
   2. Non-semantic tags : like div or span

8.  **Paths**
   1.  **Absolute Path** : cdn links is called absolute path.
   2.  **Relative Path** : Reference to current files/folder is called relative path.

9.  **Number System** :
   1. Decimal : Means Dec means 10 digits (0-9), in mathematic we use decimal system example 2534161 etc
   2. Binary : Means Bin means 2 digits (0-1), in computer sci we use Binary system example 1001001010
   3. Hexadecimal : Means Hex means 6 and dec mean 10, means 16 digits [0-9, A-F] so we can write from 00 to ff example #00ff00 (green)  #ff0000 (red) #0000ff (blue)
---



## 📔CSS

### 📘How we select and style element

![Syntax](./images/syntax.png)

---

### 📘Various types of CSS

1. Inline
2. Internal
3. External

---

### 📘Styling-Text
* Serif : Has Edges
* Sans Serif : has not Edges (best one)

```css
h1 {
    font-family: sans-serif;
    font-size: 18px;
    text-transform: uppercase;
    text-decoration: none;
    line-height: 10px;
    font-style: italic;
}
```
---

### 📘Aligning Only Text

* it will only align the text not the other elements like div etc

```css
h1 {
    text-align: right;
    text-align: center;
    text-align: left;
    text-align: justify;
}
```

---

### 📘Selectors

**1. Simple Selectors**

| Sr No | Name               | Selection Criteria                                                                                           |
| ----- | ------------------ | ------------------------------------------------------------------------------------------------------------ |
| 1     | Universe Selector  | * (asterisk symbol)                                                                                          |
| 2     | Class Selector     | . (dot symbol)                                                                                               |
| 3     | id Selector        | # (hash symbol)                                                                                              |
| 4     | Element Selector   | name of element (body, p, h1)                                                                                |
| 5     | Multiple Selectors | h1, h2, h3, p, li {  color: green;} (very use full when you want to write single css for multiple selectors) |


**2. Advanced Selectors**

| Sr No | Name                              | Selection Criteria                                                                                                                                                                                                                                                                                                                    |
| ----- | --------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| 6     | Attribute Selectors               | **input\[type="text"]** will select on  the basis of attribute                                                                                                                                                                                                                                                                        |
| 7     | Nested Element                    | 1. **div p** (selecting  all p element which exist in div) <br/> 2. **p .my-class** (select all elements which has my-class in p element)                                                                                                                                                                                             |
| 8     | Direct Child                      | 1.  **div > p** (it will select only those elements which are direct)  <br/> 2. **div > \*** means selecting every thing with in div                                                                                                                                                                                                  |
| 9     | Adjacent Selectors (like sibling) | 1. **h1 + p**  (Adjacent selector, it will select all only those p elements which are immediately after h1 element)  <br/> 2. **h1 ~ p** (Subsequent sibling selector,  it will select all p elements which are after h1 element) <br/> 3. **p.my-class** (Compound selector, it will select all p elements which has my-class class) |
| 10    | Pseudo-Classes                    | : (colon symbol)  select on the basis of state in which state element it is example hover, active state etc                                                                                                                                                                                                                           |
| 11    | Pseudo Element                    | :: (double colon) ,   it will insert new element after or before the selected element                                                                                                                                                                                                                                                 |


1. **Attribute Selector**

```html
<style>
    /* Selecting all elements which contains target attribute */
    a[target] {
        background-color: red;
    }

    /* Selecting all elements which has exact target="_blank" attribute */
    a[target="_blank"] {
        background-color: skyblue;
    }

    /* all attribute which contains google word */
     a[href*="google"] {
        background-color: green;
    }

    /* all attribute which contains google word at starting*/
     a[href^="https"] {
        background-color: yellow;
    }

    /* all attribute which contains google word at end */
     a[href$=".com"] {
        background-color: purple;
    }
</style>
<a href="www.google.com">Click Here</a>
<a href="http://www.google.com" target="_self">Click Here</a>
<a href="https://www.google.com" target="_blank">Click Here</a>
```


2. **Nested Selectors**

```html
<style>
   /* background color will apply on all p elements */
    div p {
        background-color: #f4f4f4;
    }
</style>


<div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, inventore.</p>
    <ul>
        <li>
            <p>item 1</p>
        </li>
        <li>item 2</li>
        <li>item 3
        </li>
    </ul>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, inventore.</p>
</div>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, inventore.</p>
```

3. **Direct Child**
```html
<style>
   /* background color will apply on all p elements */
    div > p {
        background-color: #f4f4f4;
    }
</style>


<div>
<!-- Background Color apply here -->
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, inventore.</p>
    <ul>
        <li>
            <p>item 1</p>
        </li>
        <li>item 2</li>
        <li>item 3
        </li>
    </ul>
    <!-- Background Color apply here -->
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, inventore.</p>
</div>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, inventore.</p>
```

4. **Adjacent Selector** (Like a sibling)

    **1. Select Immediately sibling**
    ```html
    <style>
        div+p {
            background-color: #f4f4f4;
        }
    </style>
    <div>
        <!-- It will not work here because its a child not a sibling -->
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, inventore.</p>
        <ul>
            <li>
                <p>item 1</p>
            </li>
            <li>item 2</li>
            <li>item 3
            </li>
        </ul>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, inventore.</p>
    </div>
    <!-- It will work here only -->
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, inventore.</p>
    ```
    **2. Select All Sibling**

    ```html
    <style>
            div~p {
                background-color: red;
            }
        </style>
        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt impedit debitis tempora explicabo dicta
            commodi magnam et, repudiandae quod voluptas.</div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, laboriosam.</p>
        <div>
            <!-- It will not work here because its a child not a sibling -->
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, inventore.</p>
            <ul>
                <li>
                    <p>item 1</p>
                </li>
                <li>item 2</li>
                <li>item 3
                </li>
            </ul>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, inventore.</p>
        </div>
        <!-- It will work here only -->
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, inventore.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, inventore.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, inventore.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, inventore.</p>
    ```

5. **Pseudo-Classes**
* **:nth-child()** selects items from a general group of elements.
* **:nth-of-type()** selects items from a specified group of elements.
```html
<style>
/*Selecting First element*/
li:first-child {
    color: red;
}

/*Selecting last element*/
li:last-child {
    color: red;
}

/*Selecting nth/any element

selecting first
*/
/* Select first */
li:nth-child(1) {
    color: red;
}

/* Every Odd */
li:nth-child(odd) {
    color: red;
}

/* Every even */
li:nth-child(even) {
    color: red;
}

/* Every 3 */
li:nth-child(3n+0) {
    color: red;
}

/* Every 3 after 7 */
li:nth-child(3n+7) {
    color: red;
}

li:hover {
    color: green;
}

/* Elect  */
</style>

<ul>
    <li>items 1</li>
    <li>items 2</li>
    <li>items 3</li>
    <li>items 4</li>
    <li>items 5</li>
</ul>
```

6. **Pseudo Elements :**
* use to create before or after content
* use to create new element also before or after the selected element
  1. **::after or ::before** : application use
     1. Make astrict for form labels
     2. Make overlays

    ```html
    <!-- Make astrict for labels -->
    <style>
        .is_required::after {
            content: "*";
            color: red;
        }
    </style>
    <label for="first-name" class="is_required">First Name</label>
    <input type="text" name="firstName" id="first-name">
    ```
    ```html
    <!-- Making overlays -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #333;
            color: #fff;
        }

        header {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 100vh;
            position: relative;
        }

        header>h1 {
            font-size: 4rem;
            margin: 1rem;
        }

        header::before {
            background: url("./1.jpg") no-repeat center center/cover;
            content: "";
            opacity: 0.4;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
    </style>
    <header>
    <h1>Hello World</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
    </header>
    ```


   2. **::first-line or ::first-letter**
   3. Other
      ```css
      ::selection{
        background-color : black;
        color : #fff;
      }

      li::marker{
        color : red;
      }
      ```

---

### 📘Specificity (Associativity)
1. Order & position base (positioning of internal css and external css)
```css
button  {
    color : red;
}

button {
    color : blue;
}
```

2. Selector base

![Associativity](./images/associativity.png)

```html
<!-- Good Example (points example of from leela web dev)-->
<style>
    /* Specificity  according to ascending numbers */
    /* 1 */
    button {
        color: red;
    }

    /* 3 */
    body button.btn {
        color: yellow;
    }

    /* 4 */
    body button[class="btn"] {
        color: orange;
    }

    /* 5  (this will apply)*/
    html body button[class="btn"] {
        color: pink;
    }

    /* 2 */
    .btn {
        color: blue;
    }
</style>
<button class="btn">Click Me</button>
```


---

### 📘Inheritance

Inheritance like be if we apply font property on parent element then child element will automatically get property (majorly font related properties) example if we apply color property on html then html become parent body become child then other element become grand child and so on. In below example red color will inherit by its all child automatically.

```html
<!-- Simple example of inheritance -->
<style>
    .container {
        color: red;
    }
</style>
<div class="container">
    <h1>Hello World</h1>
    <p class="text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, repellat?</p>
</div>
```

**⚠️Note :** Some of the style properties are applied by the browser to various elements, like a div element which has a display: block property, coming from the user agent stylesheet.


1. Inheritance by using **body element**

![Inheritance](./images/inheritance.png)

```css
body {
    color: red;
    font-family: sans-serif;
    font-size: 10px;
    /* This will not apply on all elements, it will apply on body element */
    border : 2px solid red;
}
```

![Inheritance](./images/inheritance-2.png)

2. Inheritance by using **Universal Multi-Selector**

```css
* {
    color: red;
    font-family: sans-serif;
    font-size: 10px;
    /* this property will applied*/
    border: 2px solid red;
}
```
![UniversalProperty](./images/inheritance-3.png)


3. inherit, initial & unset properties

* **inherit** : it will inherit property from its parent.
* **initial** : it will set to default values.
* **unset** : It will do two things: first, it will take all inheritable values that are going to be inherited, and second, values that are not inheritable will be reset to their initial/default state.
* **revert** : it will take the value from the browser stylesheet.
```html
<style>
    .container {
        color: red;
        border: 4px solid grey;
        padding: 20px;
    }

    .text {
        box-sizing: border-box;
        /* border Property get inherited */
        border: inherit;
        padding: inherit;
    }

    .container button {
        all: unset;
    }

    .container .rvt button {
        all: unset;
        background-color: revert;
    }
</style>
<div class="container">
    <h1>Hello World</h1>
    <p class="text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, repellat?</p>
    <button onclick="alert('Hello World')">Click me</button>
    <div class="rvt">
        <button>Click me again</button>
    </div>
</div>
```

![Image](./images/inheritance-property.png)

1. To Reset value

```css
.text {
    /* it will reset property to initial */
    color : initial;
}
```


---

### 📘Color
* We always use **hexadecimal** colors, and rgb when we need **transparency**
```css
body {
    /* Names */
    color: red;

    /* Regular REB Model*/
    color: rgb(1, 1, 1);

    /* RGB with transparency ("alpha")*/
    /* opacity : 0.6        values from 0 - 1 */
    background-color: rgba(255, 0, 0, 0.6);

    /* OR */
    background-color: rgba(255, 0, 0, 60%);

    /* Hexadecimal Notation*/
    color: #474638;
}
```

**⚠️ Note :** **rbg(0, 0, 0) / #000000 / #000** are same thing

---


### 📘Background

```css
body {
    background-image: url("./test.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
}
```

### 📘Box-shadow

```css
/*offset-x | offset-y | blur-radius | spread-radius | color*/
box-shadow: 10px 10px 10px 1px rgba(0, 0, 0, 0.3);
```


---

### 📘Box-Model and Box-sizing

![BoxModel](./images/box-model.png)

![BoxModel](./images/box-model-2.png)


For Width

![With-Out-Box-Sizing](./images/without-box-sizing.png)

For Height

![With-Out-Box-Sizing](./images/without-box-sizing-2.png)

* There is always **margin and padding** by default on elements such as h1, p, etc., in every browser.
* To Eliminate this issue we us **CSS Reset**.
* After using this we have to set margin and padding for each elements.
```css
/* Called CSS Reset */
*,
*::after,
*::before {
     /* to reset all width (best one)*/
    box-sizing: border-box;
}

* {
    /* Removing padding in body*/
    padding: 0;

    /* removing margin from view port/ Browser Window*/
    margin: 0;

    /* setting line height (it will take 150% of font-size by inheritance, don't allow line-height into px)*/
    line-height: 1.5;
}
```

![boxSizing](./images/box-model-with-border-box.png)


**⚠️ Note :** All above properties are placed in **multi-selector** instead of body because it will apply on each and every element otherwise it will apply to body only, as we know only **text-properties** are inheritance.


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
1. ul/ol element has by default **40px padding**

2. When we have two margins that occupied the same space only one of them is actually visible on the page and that is usually the larger of the two and this phenomena is called **collapsing margins** lets say one element has 40px margin-top and one has 20px margin bottom then distance between two margin will be 40px not 65px
---

### 📘Dimensions
1. Height : px, auto
2. width : Intrinsic Sizing Vs Extrinsic Sizing
   1. Extrinsic : controlling with manually.
   ```css
    div {
        width : 100px;          /* This is Intrinsic */
    }
   ```
   2. Intrinsic : controlling width by browser.
       1. min-content : take width which has longest word
       2. max-content : whole statement
       3. auto
       4. fit-content




---

### 📘Units
* unit less

```css
div {
    font-size : 14px;
    /* unit less, it will become 28px automatically by font property inheritance concept */
    line-height : 2;
}
```

* Pixel (px) : fixed value.
* Percentage (%) : depend upon parent element properties.
* em : font size of parent element. (font size of the parent, in the case of typographical like font-size, and font size of the element itself, in the case of the other properties like width)

```html
<style>
    html {
        /* default value of font size */
        font-size: 16px;
    }

    body {
        font-size: 2em;
    }

    #container {
        /* This is depend upon parent, now become 24px */
        font-size: 1.5em;
    }

    #btn-1 {
        /* This io depend upon parent, now become 48px */
        font-size: 2em;

        /* This is depend upon itself, now become 480px */
        width: 10em;
    }

    #btn-2 {
        /* This is depend upon root, now become 160px */
        width: 10rem;
    }
</style>
<div id="container">
    <h1>Hello World</h1>
    <button id="btn-1">Click Button</button>
    <button id="btn-2">Click Button</button>
</div>
```
![Image](./images/units.png)


* rem : to font size of root element (mostly use this and belongs to  root element : html)
* vw : to 1% of viewport width
* vh : to 1% of viewport height


**⚠️Note :**
* em and rem units depends upon font-size property
* by default **font-size** of html is **16px**

---
## 📘Block-Inline

In Previous years design created using table elements and layout history is written below

| No  | years   | css version    | Css Properties                   |
| --- | ------- | -------------- | -------------------------------- |
| 1   | 1996    | css1 introduce | floats property                  |
| 2   | 1998    | css2 introduce |                                  |
| 3   | 2010    | css2           | Responsive web designing         |
| 4   | 2012    | css3           | Media Queries, Flex              |
| 5   | 2017    | css3           | Grid                             |
| 6   | 201   9 | css3           | Intrinsic web design             |
| 7   | 2021    | css3           | container                queries |

<br/>




* **Block Elements :**

1. Are those elements which takes **whole** width example **li, div, p, h1** and create line breaks after them.
2. We can apply margin, padding, positions like top, right etc.

```css
#box {
    display : block;
}
```
![BlockLevelElement](./images/block-element.png)


* **Inline Elements :**

1. Are those elements which does not take whole width instead only takes element/content width example **img, a, strong**
2. We cannot set width height for these elements.
3. We cannot apply margin-top/bottom, padding-top/bottom, positions like top, right etc

```css
#box {
    display: inline
}
```

![InlineElement](./images/inline.png)


* **Inline-Block** :
1. this will create element block and inline element in which will not take whole width
2. We can also apply margin-top/bottom, padding-top/bottom, positions like top, right etc

```css
#box {
    display: inline-Block;
}
```
![InlineBlock](./images/inline-block.png)


**⚠️Note :** **img** elements are inline-block elements, so margie-top/bottom & padding-top/width also width-height will work on it


* **Table, table-row, table-cell**

```html
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #000;
    }

    td {
        padding: 10px;
        border: 1px solid black;

    }
</style>
<table>
    <tr>
        <td>Row 1, Cell 1</td>
        <td>Row 1, Cell 2</td>
    </tr>
    <tr>
        <td>Row 2, Cell 1</td>
        <td>Row 2, Cell 2</td>
    </tr>
</table>

<!-- Below is the same example of table -->
<style>
    .table {
        display: table;
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .row {
        display: table-row;
    }

    .cell {
        display: table-cell;
        padding: 10px;
        border: 1px solid black;
    }
</style>

<div class="table">
    <div class="row">
        <div class="cell">Row 1, Cell 1</div>
        <div class="cell">Row 1, Cell 2</div>
    </div>
    <div class="row">
        <div class="cell">Row 2, Cell 1</div>
        <div class="cell">Row 2, Cell 2</div>
    </div>
</div>
```
![Image](./images/display-table.png)

---

### 📘Position values

[Position-Reference](https://www.youtube.com/watch?v=MxEtxo_AaZ4)

1. Static : Not Effected by Top, Bottom, Left, Right and z-index properties
2. Relative : tblr value cause element to be moved from its **normal position** (itself position)
3. Absolute : Positioned relative to its parent element that is positioned **relative**. If we does not provide relative to its parent then it will take **body** is reference.
4. Fixed : Position relative to the **viewport** (browser)
5. Sticky : Positioned based on scroll position

![PositionedValues](./images/positioned-example.png)

![positions](./images/positions.png)

**⚠️Note :** **z-index** property play role in positions. it decides the stack level of elements. It Does not work with static property.

```html
<!-- Good Example for model -->
<style>
    #root {
        position: absolute/fixed;
        top: 40%;
        left: 40%;
        right: 40%;
        bottom: 40%;
        background-color: red;
    }
</style>

<!-- Good Example for fixed header and footer -->
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        line-height: 1.5;
    }

    body {
        margin: 0;
        background-color: #aaa;
    }

    .container {
        width: 80%;
        margin: 0 auto;
        background-color: #fff;
    }

    header,
    footer {
        background-color: #000;
        color: #fff;
        text-align: center;
        padding: 20px 0px;
        position: fixed;
        z-index: 10;
        width: inherit;
    }

    header {
        top: 0px;
        width: 80%;
    }

    footer {
        bottom: 0px;
    }
</style>
<div class="container">
    <header>Header</header>
    <main> <!-- Add Code here --> </main>
    <footer>Footer</footer>
</div>

<!-- Good Example of Sticky -->
<style>
    * {
        background-color: #aaa;
        margin: 0 auto;
    }

    body {
        width: 80%;
    }

    .container {
        background-color: lightcoral;
        height: 400px;
        width: inherit;
        text-align: center;
    }

    #heading {
        position: sticky;
        top: 0px;
        background-color: red;
        width: 100%;
    }
</style>
<main>
    <!-- Add Too much content here -->
        <div class="container">
        <h1 id="heading">Hello World</h1>
    </div>
    <!-- Add Too much content here -->
</main>

<!-- Real Application Example -->
<style>
    * {
        background-color: #aaa;
        margin: 0 auto;
    }

    body {
        width: 80%;
        text-align: center;
    }

    h1 {
        background-color: red;
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        position: sticky;
        top: 0px;
    }
</style>
<section>
  <h1>Heading-1</h1>
  <p><!-- Add To much text here -->
</section>
<section>
  <h1>Heading-2</h1>
  <p><!-- Add To much text here -->
</section>
<section>
<h1>Heading-2</h1>
  <p><!-- Add To much text here -->
</section>
```



---

### 📘Page-Layouts

![layout](./images/layout.png)

1. **Float Concept** :
   1. Reference [Link](https://www.javatpoint.com/css-float)
   2. The CSS float property is a positioning property. It is used to push an element to the left or right, allowing other element to wrap around it. It is generally used with images and layouts.
   3. by using float the element will out of flow from normal flow just like absolute position concept.
   4. Main difference between float and position is float always take some space but position will not, it like floating image around the text same as in text book page image.

![FloatExample](./images/float.png)

Solution For this example : by clear float from both the sides

```html
<!-- Example-1 -->
<style>
    .image-1,
    .image-2 {
        width: 100px;
        height: 100px;
        background-color: red;
        border: 1px solid grey;
    }

    .image-1 {
        float: left;
    }

    .image-2 {
        float: right;
    }

    .clear {
        clear: both;
    }
</style>
<div class="container">
    <div class="image-1"></div>
    <div class="image-2"></div>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam suscipit ab deserunt officiis aperiam tempore
        odio vitae asperiores eos quaerat nam neque ipsum voluptas, numquam architecto libero facere reprehenderit
        rem.</p>
    <p class="clear">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse cumque expedita facere
        perspiciatis illo.
        Totam quis aspernatur sapiente accusamus fuga dolorum soluta dicta perferendis molestias saepe. Corporis
        odio harum quod.</p>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maxime pariatur voluptatibus, placeat
        iusto ex enim
        adipisci in voluptates unde magni laborum nemo quasi vero fuga sunt perspiciatis. Est, ipsam rerum.</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, quae dolorum numquam, odio, consectetur
        ullam obcaecati ducimus veniam omnis impedit error sunt fuga aliquid. Placeat minus perspiciatis aliquam
        atque beatae!</p>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. A quam iste eos placeat! Soluta quae harum dolor
        dolore eum voluptatem, laborum amet, culpa fuga, quas ducimus ipsam quidem enim laudantium.</p>
</div>


<!-- Real Application Example 1 -->
 <style>
    header {
        background-color: red;
        padding: 20px;
    }

    .heading-primary {
        float: left;
    }

    .heading-secondary {
        float: right;
    }

    /* This is use to fix the problem of flow out */
    .clear {
        clear: both;
    }
</style>

<header>
    <h2 class="heading-primary">Heading Primary</h2>
    <h2 class="heading-secondary">Heading Secondary</h2>

    <!-- We have to use this all the time to fix the out of flow issue-->
    <div class="clear"></div>
</header>


<!-- Real Application Example 2 -->
 <style>
    header {
        background-color: red;
        padding: 20px;
    }

    .heading-primary {
        float: left;
    }

    .heading-secondary {
        float: right;
    }

    .clearFix::after {
        content: "";
        clear: both;
        display: block;
    }
</style>

<header class="clearFix">
    <h2 class="heading-primary ">Heading Primary</h2>
    <h2 class="heading-secondary">Heading Secondary</h2>
</header>
```
---

2. **Flex-box**

[CSS-Best-Tutorial](https://www.youtube.com/watch?v=phWxA89Dy94)

![flexBox](./images/flex.png)

![flex-1](./images/flex-1.png)

![flexBoxCheatSheet](./images/flex-cheat-sheet.png)


**⚠️Note :**
1. if your flex-direct is row then flex-basis become width, and if your flex-direction is column then flex-basis become height.
2. If you donnot provide any width like width/flex-basis then it will take minimum width which will be of content width.
3. To distribute space between flex-items we use **justify-content, align-content, place-content (its is short cut of both justify-conent & align-content)**, to aliment of items in the flex-box **align-self, align-items**
4. **align-content** enables when we use **flex-wrap: wrap**, and default value of align-content os **stretch**

* **align-content :** alignment of space between and around the content along cross-axis
* **flex-grow, flex-shrink, flex-basis :** are use to controll space between flex items.
  * Flex-grow : 0 means items will not grow, 0 is intial value
  * Flex-shrink : 1 means items will shrink smaller than their flex-basis
  * flex-basis : auto means it should have base size of auto

```css
div {
    /* default values */
    flex-grow : 0;
    flex-shrink : 1;
    flex-basis : auto;

    /* OR */
    flex : initial;
}
```

* **flex-grow :** how much a flex item will grow relative to the rest of the flex items if space is available (use full when we items width is not exist or less than container width)
* **Flex-flow :** short hand property of flex-direction + flex-wrap.

```html
<!-- Flex Grow Example but with container width -->
<style>
    #container {
        background-color: #f4f4f4;
        /* this is initial width */
        width: 600px;
        height: 200px;
        display: flex;
        flex-direction: row;
    }

    .box {
        /* we are not providing any width to any items */
        padding: 10px;
    }

    .box1 {
        background-color: brown;
        /* box -1 will take automatically width according to ratio */
        flex-grow: 1;
    }

    .box2 {
        background-color: blue;
    }

    .box3 {
        background-color: green;
        /* setting width for box-3 */
        flex-basis: 200px
    }
</style>
<div id="container">
    <div class="box box1">Box - 1</div>
    <div class="box box2">Box - 2</div>
    <div class="box box3">Box - 3</div>
</div>
```
![Flex-grow](./images/flex-grow.png)

```html
<!-- Flex grow example but without container width  -->
 <style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .box {
        /* this is initial width for all boxes */
        width: 150px;
        height: 50px;
        background-color: #f4f4f4;
        border: 2px solid #ccc;
        border-radius: 6px;
        padding: 10px;
    }

    .container {
        display: flex;
        flex-direction: row;
    }

    .box-1 {
        /* In box-1 case it will take whole remaining width (because we use div element in container which is 100%) and while resizing the browser window it will adjust size */
        flex-grow: 1;
    }
</style>

<div class="container">
    <div class="box box-1">box-1</div>
    <div class="box box-2">box-2</div>
    <div class="box box-3">box-3</div>
    <div class="box box-4">box-4</div>
</div>
```



* **flex-shrink :** how much a flex items will shrink relative to the rest of the items if space is available (use full when items width is greater than container width)

```html
<!-- flex-shrink example with container width -->
<style>
    #container {
        background-color: #f4f4f4;
        /* here container width is 600 px which is less then items width */
        width: 600px;
        height: 200px;
        display: flex;
        flex-direction: row;
    }

    .box {
        padding: 10px;
        /* in flex-shrink case we need to provide width. here items width are greater then container width */
        width: 500px;
    }

    .box1 {
        background-color: brown;
        /* This property when item width is greater than container width, it will not allow to resize or shrink when we set to zero */
        flex-shrink: 0;
    }

    .box2 {
        background-color: blue;
    }

    .box3 {
        background-color: green;
    }
</style>
<div id="container">
    <div class="box box1">Box - 1</div>
    <div class="box box2">Box - 2</div>
    <div class="box box3">Box - 3</div>
</div>
```
![Flex-Shrink](./images/flex-shrink.png)

```html
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .box {
        width: 150px;
        height: 50px;
        background-color: aliceblue;
        background-color: #f4f4f4;
        border: 2px solid #ccc;
        padding: 10px;
    }

    .container {
        display: flex;
        flex-direction: row;

    }

    .box-1 {
        /* in box-1 case its width will not shrink but other will shrink while resizing browser window */
        flex-shrink: 0;
    }
</style>
<div class="container">
    <div class="box box-1">box-1</div>
    <div class="box box-2">box-2</div>
    <div class="box box-3">box-3</div>
    <div class="box box-4">box-4</div>
</div>
```

**⚠️Note :**
1. If the container width/height is smaller than the child width/height, the child will always remain fitted within the container until its content length becomes either too short or too long
2. align-self > align-items


![flex-2](./images/flex-2.png)

* Horizontally each of these elements takes up exactly the space that is necessary for its content. However, vertically things are little different so vertically by default all the flex items are tall as the tallest element
---

3. **Grid-Box**

![Grid](./images/grid-1.png)

![Grid](./images/grid-2.png)

![Grid](./images/grid-3.png)


1. Grid Lines : a grid is made up of lines, which run horizontally and vertically. If your grid has four columns, it will have five column lines including the one after the last column.
2. Grid Traks : A track is the space between two grid lines. A row track is between two row lines and a column track between two columns lines. when we create our grid these tracks by assigning a size to them.
3. Grid Cell : A grid cell is the smallest space on a grid defibed by the intersection of row and column tracks. Its just like a table cell in a spreadsheet.
4. Grid Area : Several grid cells together. Grid areas are created by causing an items to span over multiple trackes.
5. Gaps : A gutter or alley between tracks. for sizing purposes these act like a regular track. You can't place content into a gap but you can span grid items across it.

![Grid](./images/grid-4.png)


* Witdh
  1. fr : 1frm (fractional, use in grid) it will shrink and grow in same proportion its like flex-grow (will fill all the empty space)
  2. px
  3. %
  4. repeat

```css
/*
1fr 1fr 1fr 1fr = repeat(4, 1fr) = 1fr 1fr 1fr auto

1fr 1fr 1fr auto (the auto parameter will take remaining with automatically)

repeat(3, minmax(400px, 1fr)); (for fixing the minimum sizes)

*/

.container {
    grid-template-column : repeat(4, 1fr)
}
```
* For **Positioning** : (you can provide positive and negative values)
```css
.item-1 {
    grid-column-start: 1;
    grid-column-end: 4;
    grid-row-start: 1;
    grid-row-end: 3;

    /* OR */
    grid-column: 1/4;
    grid-row: 1/3;

    /* OR  */
    grid-column: 1/span 3;
    grid-row: 1/span 4;

    /* OR  best one*/
    /* row-start col-start row-end col-end */
    grid-area: 1/1/1/4;

    /* For gaps in rows columns*/
    grid-row-gap : 10px;
    grid-column-gap :10px

    /* OR */
    grid-gap : 10px 10px;

    /* OR  (best one)*/
    gap: 10px 10px;
}
```

* For **Align and Centering**

```html
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    #container {
        height: 600px;
        width: 600px;
        display: grid;
        grid-template-columns: repeat(2, 100px);
        grid-template-rows: repeat(2, 100px);
        margin: 10px;
        background-color: #ccc;

        /* To align item along grid */
        /* start | center | end | baseline |  space-between | space-around | space-evenly | center */
        justify-content: center;
        align-content: center;

        /* To make each item align along row/column axis */
        /* start | center | end | baseline |  space-between | space-around | space-evenly | center */
        justify-items: center;
        align-items: center;
    }

    .item {
        background-color: #e448a0;
        border: 2px solid rgb(232, 20, 73);
        opacity: 0.6;
        color: aquamarine;

        /* For aligning items */
        justify-self:center;
        align-self:center;
    }
</style>
<div id="container">
    <div class="item item-1">1</div>
    <div class="item item-2">2</div>
    <div class="item item-3">3</div>
    <div class="item item-4">4</div>
</div>
```
* Making responsive without using media query

```css
#container {
    /* while resizing the window it will stack on each other */
    grid-template-columns : repeat(auto-fit, minmax(100px, 1fr))
}
```

* Implicit Row/Columns

```css
#container {
    /* if row added automatically in column direction */
    grid-auto-flow: column;
    grid-auto-columns:100px ;

    /* if row added automatically in row direction */
    grid-auto-flow: row;
    grid-auto-rows:100px ;
}
```

---

### 📘Max-width Vs Width

```html
 <style>
.container {
    background-color: #fff;
    width: 500px;   /* Desired width */
    max-width: 200px; /* Maximum width allowed */
    height: 500px;
}
</style>
<div class="containr"></div>
```
Since the max-width is smaller than the width, the browser will render the element with the max-width of 200px, overriding the width of 500px. This is why you're seeing the element at 200px width in the browser.

### 📘Max-width & Min-Width

* Width create horizontal scrollbar

Example :
* When we use **width** in **px** then it will fixed our image size hence responsiveness will not work
* When we use **width** in **%** then it will become responsive but in this case we cannot set fixed size of image up to a particular dimension

```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-size: 24px;
        }

        .main {
            margin: 20px auto 0px auto;
            width: 700px;
        }

        .main img {
            width: 100%;
        }

        .main article {
            width: 100%;
            padding: 10px;
        }
    </style>
</head>

<body>

</body>
<div class="main">
    <img src="./test.jpg" alt="">
    <article>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas deserunt est culpa, nihil debitis incidunt
        facilis saepe. Atque, tempore praesentium doloremque minima ipsam maiores sunt officia molestiae sint, nam at?
    </article>
</div>

</html>
```
1. When we using px

![Min-width](./images/max-width-min-width-1.png)

![Min-width](./images/max-width-min-width-2.png)

2. When we using %

![Min-Width](./images/max-width-min-width-3.png)

3. When we using min/max width

```css
.main {
    margin: 20px auto 0px auto;
    min-width: 300px;
    max-width: 600px;
}
```

in this case our image wil not get bigger in size up to 600px and will not get smaller in size up to 300px  and in between it become responsive and can resize itself


---

### 📘Responsive Design

Using HTML/CSS to make a website or app layout adapt to different screen size

* **Practice To use**

1. Set the viewport/scale
2. Use Fluid widths as oppose to fixed (max-widths)
3. Media-queries - different css styling for different screen sizes
4. Rem units over px
5. Mobile first methods



* Max-width property works with desktop first and **Min-Width** property works with mobile first

![MediaQuery](./images/media-query.png)

* **Concept of max-min width screen**

```css
/* means width is = 600px */
@media(width:600px) {
    body{
        background-color : red
    }
}

/* means width is <= 600px */
@media(max-width:600px) {
    body{
        background-color : red
    }
}
/* means width is >= 600px */
@media(min-width:600px) {
    body{
        background-color : red
    }
}

/* means width is 600px - 700px (width >=600px and width <=700px)*/
@media(min-width:600px) and (max-width:700px) {
    body{
        background-color : red
    }
}
```


* Break Points & Types of media

![BreakPoints](./images/breakpoint.png)


**Screen Sizes (also called Break points)**

| Sr No | Device Name            | Screen size |
| ----- | ---------------------- | ----------- |
| 1.    | Mobile                 | 480-500px   |
| 2.    | Table                  | 768px       |
| 3.    | Laptop (small screens) | 1024px      |



1. Screen : means it will work for screens only not for print etc

```css
@media only screen and (max-width:500px) {
    .smartphone {
        display: block;
    }
}
```
---

### 📘CSS-Variables
* Only support by latest browsers only
```css
/* the variable which are define in root can access in any element like html body etc */
:root {
    --primary-color: steelblue;
    --secondary-color: skyblue;
    --light-color: #f4f4f4;
    --center-text: center;
}

body {
    background-color: var(--primary-color);
    text-align: var(--center-text);
}
```
---

### 📘keyframe
```html
<style>
    body {
        background-color: #000;
        height: 100vh
    }

    .box {
        position: relative;
        width: 100px;
        height: 300px;
        background-color: #fff;

        /* animation-name: animation1;
        animation-duration: 3s;
        animation-timing-function: ease-in-out;
        animation-delay : 0s;
        animation-iteration-count: infinite;*/

        /* OR */

        animation: animation1 3s ease-in-out 0s infinite;
    }

    @keyframes animation1 {
        from {
            top: 0;
            width: 100px;
            background-color: #fff;
        }

        to {
            top: 300px;
            width: 700px;
            background-color: red;
        }
    }

    /* OR */
        @keyframes animation1 {
        0% {
            top: 0;
            width: 100px;
            background-color: #fff;
        }

        100% {
            top: 300px;
            width: 700px;
            background-color: red;
        }
    }

    /* OR */
        @keyframes animation1 {
        25% {
            top: 0px;
            left: 300px;
            background-color: red;
            border-radius: 50% 0 0 0;
        }

        50% {
            top: 300px;
            left: 300px;
            background-color: blue;
            border-radius: 50% 50% 0 0;
        }

        75% {
            top: 300px;
            left: 0px;
            background-color: green;
            border-radius: 50% 50% 50% 0;
        }

        100% {
            top: 0px;
            left: 0px;
            background-color: skyblue;
            border-radius: 50% 50% 50% 50%;
        }
        }

</style>
<div class="box"></div>
```

Example Making a loader

```html
<style>
    .loader {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 10px solid #FFE66D;
        border-top: 10px solid #4ECDC4;
        animation: spinAnimate 1s ease-in-out infinite;
    }

    @keyframes spinAnimate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }
</style>
<div class="loader"></div>
```


---


### 📘Transitions
* it occurs only on events like hover, active etc


```html
<style>
    body {
        background-color: #000;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh
    }

    .box {
        width: 100px;
        height: 100px;
        background-color: #fff;
        /* transition-property: background-color, width, height;
        transition-duration: 2s;
        transition-timing-function: ease-in-out; */

        /* if we put all means we are targeting all properties during hover event */
        transition: background-color, width, height, 2s ease-in-out;

        /* if we put all means we are targeting all properties during hover event */
        transition: all 2s ease-in-out;
    }

    .box:hover {
        background-color: red;
        width: 200px;
        height: 200px;
    }

     .box:active {
        background-color: red;
        width: 200px;
        height: 200px;
    }
</style>
<div class="box"></div>
```
---

### 📘Transform
* Change Shapes or rotate
```html
<!-- transition + transform -->
<style>
    body {
        background-color: #000;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh
    }

    .box {
        width: 300px;
        height: 300px;
        background-color: #fff;

        /* Rhombus */
        /* transform: rotate(45deg); */

        /* Parallelogram */
        /* transform: skew(45deg); */

        /* inc*/
        /* transform: scale(3); */

        transition: all 3s ease-in-out;
    }

    .box:hover {
        transform: rotate(720deg);
    }
</style>
<div class="box"></div>
```
* **Move any thing on screen** (its use origin concept)

```css
.box:hover {
    transform: translateX(100px);
    transform: translateY(100px);

    /* OR */
    transform: translate(100px, 100px);
}
```

---

### 📘Center Div

1. using margin auto

```css
 #container {
    margin: auto;
    max-width: 930px;
}
```

2. Using Flex Box

```css
body {
    padding: 0;
    margin: 0;
    height: 100vh;
    width: 100vw;
    display: flex;
    justify-content: center;
    align-items: center;
}
```

3. Using grid

```css
body {
    padding: 0;
    margin: 0;
    display: grid;
    height: 100vh;
    width: 100vw;
    justify-content: center;
    align-items: center;
}
```

4. Using Position Absolute

```html
<style>
    #root {
        position: absolute/fixed;
        top: 40%;
        left: 40%;
        right: 40%;
        bottom: 40%;
        background-color: red;
    }
</style>
<div id="root"></div>
```

### 📘Basic BoilerPlate
```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
</body>

</html>
```
