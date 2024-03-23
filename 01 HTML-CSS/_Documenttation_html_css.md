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

## 📘Position values
1. Static : Not Effected by Top, Bottom, Left, Right properties/values
2. Relative : tblr value cause element to be moved from its **normal position**
3. Absolute : Positioned relative to its parent element that is positioned **relative**. If we does not provide relative to its parent then it will take **body** is reference.
4. Fixed : Position relative to the **viewport**
5. Sticky : Positioned based on scroll position

---

## 📘Max-width & Min-Width

* Width create horizontal scrollbar

Example : 
* When we use **width** in **px** then it will fixed our image size hence responsiveness will not work
* When we use **width** in **%** then it will become responsive but in this case we cannot set fixed size of image upto a particular dimension

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


![Min-width](./images/max-width-min-width-4.mp4)
---

## 📘Responsive Design

Using HTML/CSS to make a website or app layout adapt to different screen size

* **Practice To use**

1. Set the viewport/scale
2. Use Fluid widths as oppose to fixed (max-widths)
3. Media-queries - different css styling for different screen sizes
4. Rem units over px
5. Mobile first methods

* **Concept of max-min width screen**

```js
// max-width
if(windowWidth < 500px) {
    body {
        background-color: red;
    }
}

// min-width
if(windowWidth > 500px) {
    body {
        background-color: green;
    }
}

// Width is between ((min-width : 500px) and (max-width : 780px))
if(windowWidth > 500px && windowWidth < 780px ) {
    body {
        background-color: green;
    }
}
```

* **Types of media** 

1. Screen : means it will work for screens only not for print etc

```css
@media only screen and (max-width:500px) {
    .smartphone {
        display: block;
    }
}

```

* **Screen Sizes (also called Break points)**

| Sr No | Device Name            | Screen size |
| ----- | ---------------------- | ----------- |
| 1.    | Mobile                 | 480-500px   |
| 2.    | Table                  | 768px       |
| 3.    | Laptop (small screens) | 1024px      |



Example

```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: grey;
            color: white;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-align: center;
            font-size: large;
            font-family: Arial, Helvetica, sans-serif;
        }

        .widescreen,
        .normal,
        .tablet,
        .smartphone,
        .landscape {
            display: none;
        }

        @media only screen and (max-width:500px) {
            .smartphone {
                display: block;
            }
        }

        @media(min-width : 500px) and (max-width : 768px) {
            .tablet {
                display: block;
                color: white;
            }
        }
    </style>
</head>

<body>
    <div class="widescreen">Wide Screen</div>
    <div class="normal">Normal</div>
    <div class="tablet">Tablet</div>
    <div class="smartphone">Smart Phone</div>
    <div class="landscape">Landscape</div>
</body>

</html>
```


---

## 📘Center Div

1. using margin auto

```css
 #container {
    margin: auto;
    max-width: 930px;
}
```