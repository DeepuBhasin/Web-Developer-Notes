## The Complete Web Developer
* Web Foundation
* HTML5
* CSS3
* Bootstrap
* CSS Grid
* Javascript (Core fundental)
* DOM Manipulation
* Developer Environment
* Git/Github
* NPM/NPM Scripts
* React.js (Redux  + Hooks)
* Node.js
* Api

## Browsing the Web
![Image](./images/1.1-browsing-the-web.png)

When we enter Google.com we press __Enter__ on key board we ask question who's ? this __Google.com fellow__ ? and that question gets asked all the way down to our __ISP__ (ISP is Internet Service Provider) and These ISP service like Internet service are provided by various companies and charges depends upon according countries, So they get that request and they send that off to something called the __DNS Server__ so Domain Name Server but essentially it's a phone book - a phone book that has the list of all these URL's like Google.com and it has the addresses of them, so exactly like a phone book, They know where Google.com is so they say "Hey you know, I don't know __Mr. Google.com__" personally, but I do know his address, so you should go check him out, so they send off the request back through the ISP and the website of the web browser, Google Chrome, in this case gets "172.217.7.23" alright cool, but nothing is shwoing up yet, There's no there's Google.com. I can't do any searches yet

![Image](./images/1.2-browsing-the-web.png)
Ok we receive - it's what we call an __IP Address__ so think of "172.217.7.23" as something that every single computer has one, anything that's connected to the internet has its own address so the laptop that i'm working on right now an IP Address, your laptop or computer. So this "172.217.7.23" IP Address allows the internet to work essentially, it knows out location our address. So what we do now with __Google.com__ we know this IP address - the browser sends off another request to the Google servers and it knows where the Google servers are beacuse, well because we have this address so we go seek it out and you can think of servers as computers essentially, my laptop could be a server, your computer could be server. Server are essentially computers that are sometimes in basements or in huge server farms and they have a piece of software running that just like at a restaurant where a server brings you food. It knows how to send you files when you request for them, So we send this "172.217.7.23" off and the google servers say oh yeah no problem let me give you my __HTML CSS and JavaScript__ and They are text files that Google is going to send to the browser so we can have google working. So we're copying these files and Google server's saying yeah no problem thank for asking for Google Here it is and the web browser receives the HTML, CSS and javascript
![Image](./images/1.3-browsing-the-web.png)
so if we go to the next section boom we have google.com and everything's working 
![Image](./images/1.4-browsing-the-web.png)
Now that sounded like a whole bunch of stuff that happened in between and when we're on the internet every thing is quite fast but yet underneath the hood all of that us happening and it's crazy to think how fast everything works __like if we know the address of google can we just you know go into "172.217.7.23" directly and just instead of putting Google.com, just put in this in our search bar and it automatically goes to the google servers__
![Image](./images/1.5-browsing-the-web.png)

---
## HTML
> What is HTML 
* Hyper Text Markp Language
* HTML is a markup language that web developers use to __structure and descibe the content of a webpage (not a programming language)__ 
* HTML consists of __elements__ that describe different types of content : paragraphs, links, headings, images, video etc.
* Web Browsers understand HTML and __render HTML code as websites__

### Basic Syntax

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
```
* __lang__ attribute is used for language type of the _Document_
* __meta__ tag is used for Defining _data about the data_, example __charset__ said should be _UTF-8_ which basically is all the simple characters that we use in the _English Language_

### Heading tags
```html
<h1>Headding h1</h1>
<h2>Headding h2</h2>
<h3>Headding h3</h3>
<h4>Headding h4</h4>
<h5>Headding h5</h5>
<h6>Headding h6</h6>
```

### Paragraph 
```html
<p>This is Paragraph tag </p>
```

### Comment

```html
<!--This is Comment -->
```
### Bold

```html
<b>This is used in HTML4</b>
<strong>This is used in HTML5</strong>
```
* we should always use the __strong__ elemnt instead of __b__ beacuse the __b__ doesn't have any so-called __semantic meaning__
* __Strong__ represent the meaning that its has more _important text_. That is essentially the idea of semantic HTML.   

### Itallic
```html
<i>This is used in HTML4</i>
<em>This is used in HTML5</em>
```
* we should always use the __em__ elemnt instead of __i__ beacuse the __i__ doesn't have any so-called __semantic meaning__ 
*  __em__ represent the meaning that its _Emphasize text_. That is essentially the idea of semantic HTML. 

### List
> Order List
```html
<ol>
    <li> Item 1 </li>
    <li> Item 2 </li>
    <li> Item 3 </li>
</ol>    
```
> Unorder List

```html
<ul>
    <li> Item 1 </li>
    <li> Item 2 </li>
    <li> Item 3 </li>
</ul>    
```

### Image

```html
<img src="path" alt="alternativ text" width="500" height="500"/>
```
### Links

```html
<a href="hyperlink" title="Click me">Click Me </a>
<a href="hyperlink" title="Click me" target="_blank">Click Me </a>
```
### Semantics Tags
* Semantics means is that we have certain elements that have actually a meaning or a purpose attached to them. So when we think about a certain HTML element, we should actually not think about what that element looks like as it's rendered on the page. but instead we should think about what the element actually means and what it stands for. 
* Main big advantage of Semantics tags is __Search Engine Optimization (SEO)__
1. strong
2. em
3. nav
4. header
5. article
6. aside

### Structuring (Grouping)
* we can structures using semantic tags

> Link
```html
<nav>
    <a href="#">Click Me </a>
    <a href="#">Click Me </a>
    <a href="#">Click Me </a>
    <a href="#">Click Me </a>
</nav>
```
> Header
```html
<header>
    <h1>Welcome To Page</h1>
    <nav>
        <a href="#">Click Me </a>
        <a href="#">Click Me </a>
        <a href="#">Click Me </a>
        <a href="#">Click Me </a>
    </nav>
</header>
```
> Article
```html
<article>
    <p>All modern websites and web applications are built using three <em>fundamental</em> technologies: HTML, CSS
        and
        JavaScript. These
        are the languages of the web.</p>
    <p>In this post, let's focus on HTML. We will learn what HTML is all about, and why you too should learn it.</p>
    <h3>What is HTML?</h3>
</article>    
```
> Footer
```html
<footer>
    Copyright &copy; Reserved
</footer>
```
---
## CSS
> What is CSS
* Cascading Style Sheets
* CSS describes the __visual style and presentation__ of the __content written in HTML__
* CSS consists of countless __properties__ that developers use to format the content: properties about font, text, spacing, layout, etc.

### CSS Rules
![Image](./images/3.1-css-rules.png)
### Types of CSS
> Inline CSS
```html
<h1 style="color:blue; font-style: italic;">📘 The Code Magazine</h1>
```
> Internal CSS 
```html
<style>
    h1 {
        color: blue;
        font-style: italic;
    }
</style>
```   
> External CSS

```html
<link rel="stylesheet" href="./style.css">
```
### Comments
```css
/*h1 {
    color: red;   
}*/ 
```
### Specity of CSS Selectors

> __Id > Class > Tag__

```html
<style>
#text {
    color: green;
}    
.text {
    color: green;
}
h1 {
    color: green;
}        
</style>

<h1 id="text" color="text">Hello World</h1>
```
* __color__ for __h1__ will be __green__ beacuse of _Specity_

### Selector
> Combine Selector
```css
h1, h2, h3, h4,  p, li {
    font-family: sans-serif;
}
```
> Descendent Selector
```css
footer p {
    font-family : 20px
}    
```
* it will select all __p__ tags with in __footer__ tag

> Id Selectore
```html
<style>
#heading {
    color:blue;
    font-size : 20px;
}
</style>    

<h1 id="heading">Hello World</h1>
```
> Class Selector
```html
<styl>
.heading-text {
    color:blue;
    font-size : 20px;
}
</style>    

<h1 class="heading-text">Hello World</h1>
```
* In real applications we mostly use __classes__ as compair to __id__ because of future use.

### Styling Font

```css
h1 {
    font-family:sans-serif;
    font-style: italic;
    font-size: 26px;
    font-weight : bold; /* to bold */
}
```
### Styling-Text
```css
h1 {
   text-decoration: underline dotted red;
    text-transform: uppercase;
    text-align: center;
}
```

### Line-Style
```css
p {
    line-height: 1.5;   /* font-size x 1.5*/
}
```
### Colors
![Image](./images/3.2-css-color.png)

![Image](./images/3.3-css-shades-of-grey.png)

> Color
```css
h1 {
    color : #1098ad;    
}

h2 {
    color : rgb(126,189,68,0.5);
}

h3 {
    color : blue;
}
```
> Background Color

```css
h1 {
    background-color : #1098ad;    
}
```

### Border

```css
h1 {
    border : 2px solid red;
}

h2 {
    border-top: 5px solid #1098ad;
    border-bottom: 5px solid #1098ad;
}
```

### Pseudo Class (:)
#### Pseudo Class for multiple elements 
* These __classes__ are use where __multiple elements__ exist like __li__ in ol,__tr__ in table, __p__ element _(but it should be direct elements to parent element and only __p__ elements should in parent element)_ in Semantics elements etc

```html
<ul>
    <li>1 Item</li>
    <li>2 Item</li>
    <li>3 Item</li>
    <li>4 Item</li>
</ul>

<article>
    <p>paragraph 1</p>
    <p>paragraph 2</p>
    <p>paragraph 3</p>
    <p>paragraph 4</p>
</article>
```


> First Child of selected element

```css
li:first-child {
    font-weight : bold;
}

article p:first-child {
    font-weight : bold;
}
```

> Last Child of selected element
```css
li:last-child {
    font-weight : bold;
}

article p:last-child {
    font-weight : bold;
}
```
> Nth Child of selected element

```css
li:nth-child(2) {           /* select only 2nd element*/
    font-weight : bold;
}

article p:nth-child(2) {    /* select only 2nd element*/
    font-weight : bold;
}
```

> All Odd Childs of selected element

```css
li:nth-child(odd) {           /* select all odd element*/
    font-weight : bold;
}

article p:nth-child(odd) {    /* select all odd element*/
    font-weight : bold;
}
```

> All Even Childs of selected element

```css
li:nth-child(even) {           /* select all even element*/
    font-weight : bold;
}

article p:nth-child(even) {    /* select all even element*/
    font-weight : bold;
}
```

> Using Formula

```css
li:nth-child(2n) {            /* select all even element*/
    font-weight: bold;
}

article p:nth-child(even) {   /* select all even element*/
    font-weight : bold;
}

li:nth-child(2n+1) {          /* select all odd element*/
    font-weight: bold;
} 

article p:nth-child(2n+1) {   /* select all odd element*/
    font-weight : bold;
}

```
#### Pseudo Class for Links

```css
a:link {         /* which have href attribute*/
    color : red;
}

a:visited {     /* when we visited already*/
    color : grey;
}

a:hover {
    text-decoration : yellow;
    color : red;
    font-weight : bold;
}    

a:active {      /* when we clicking*/
    color : green;
}

/* LVHA Order */
```

