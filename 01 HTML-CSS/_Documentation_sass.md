
## 📔SASS

* Syntactically Awesome Stylesheets
* CSS Preprocessor/ Precompiler
* Easy to manage
* Cross browser compatible

How does Sass work

* Sass uses .scss or .sass file extensions
* The browser does not read sass, it must be compiled
* Sass files are complied to normal css files
* There are many different types of sass compilers (cli & gui)

What Does SASS offer ?
* Variables
* Nesting
* Partials & imports
* functions & mixins
* Extends
* Conditions
* inheritance
* Operators & calculations
* color functions
* Loops

**⚠️ Note :** .scss is usually preferred over .sass as it uses the same syntax as regular css

```scss
/* css syntax */
nav ul {
    margin : 0;
    padding : 0;
    list-style : none;
}

nav li {
    display : inline-block
}

nav a {
    display : block;
    padding : 6px 12px;
    text-decoration : none;
}

/* Scss Syntax */
nav {
    ul {
        margin : 0;
        padding : 0;
        list-style : none;
    }

    li {
        display : inline-block
    }

    a {
        display : block;
        padding : 6px 12px;
        text-decoration : none;
    }
}


/* Sass syntax (best one)*/
nav
    ul
        margin : 0;
        padding : 0;
        list-style : none;

    li
      display : inline-block

    a
        display : block;
        padding : 6px 12px;
        text-decoration : none;
```




### 📘Installation and Execution

1. Package name
```
npm i node-sass
```

2. create scss folder and add file

```scss
$color : red;

body {
    background-color: $color;
}
```

3. Package.json

```js
"scripts": {
    "sass": "node-sass -w scss/ -o dist/css/ --recursive"
},
```

4. Run-Command

```
npm run sass
```

5. now create index.html file in dist-folder after above command (when ever you save the file it automatically create new main.js file)


### 📘Variables and Partials-import
* Partials means parts, it like separating your code into a different files like button, modal, navigation code etc but at the end merge into single compiled file.
* using under-score, this tell to SCSS compiler that i don't want to compile this file that we don't want variable.css file in my dist folder.
* Major difference between css and scss is that you have to making extra HTTP Requests to the server to fetch these regular css files with scss, it just kind of takes them and builds them on the top of each other.


1. Create Partial-file

```scss
/* _variables.scss */
$primary-color : steelblue;
$secondary-color :skyblue;
$light-color : #f4f4f4;
$danger-color : #333;

/* _box.scss */
div {
    display : inline-block;

    &:hover{
        background-color : red;
        color : #fff;
    }
}

/* main.scss */
@import "variables";

body {
    background-color: $primary-color;
}

@import "box";
```

### 📘Mixins
* Work as functions and also with parameters (no parameter, required, default)
* Allow you to reuse-code
*

```scss
// main.scss
@mixin bgColor($color : red) {
    background-color: $color;
}

body {
    @include bgColor(steelblue);
}

div {
    @include bgColor(red);
}

p {
    @include bgColor(green);
}

h1 {
    @include bgColor(blue);
}
```

### 📘Extend and Placeholder
* its like combine selectors

```scss
// Only Extend key word
.div {
    color: red;
    font-size: 5px;
    line-height: 5px;
    text-transform: capitalize;
}

#test {
    background-color: blue;
}

.h1 {
    color: green;
    @extend .div;
    @extend #test;
}
```

```scss
// Place Holder (its like creating dummy code)
%div {
    color: #fff;
    background-color: #000;
    font-family: sans-serif;
    line-height: 1.5;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


* {
    // consuming that dummy code
    @extend %div;
}
```

### 📘Operators
1. Equality (== , !==)
2. Relational (<, >, <=, >=)
3. Numeric (+, -, *, /, %)
4. String (concatenation +, )
5. Boolean (and, or, not)

### 📘Interpolation

```scss
// Simple Example
@mixin margin($position, $unit) {
    // Interpolation
    margin-#{$position}: $unit;
}

body {
    @include margin(top, 10px);
}

//Good example (Creating dynamic class)
@mixin input-class($type) {
    .input-#{$type} {
        background-color: #fff;
        color: #000;
        padding: 10px;
        border-radius: 5px;
    }
}

@include input-class(primary);
```
### 📘Functions
* Major difference between mixins and functions that functions have return values.

```scss
// Syntax
@function function-name($value) {
    @return ($value / 2) + px;
}

// Example
@function half($width) {
    @return $width / 2+px;
}

.half-width {
    width: half(800);
}
```

### 📘Inbuilt Functions
1. Numbers

    ```scss
    .test {
        margin: abs(-10px); // 10px
        margin: ceil(4.3px); // 5
        margin: floor(4.3px); // 4
        margin: round(4.3px); // 4
        margin: max(3px, 7px, 10px, 5px); // 10
        margin: min(3px, 7px, 10px, 5px); // 3
        margin: percentage(50px/100px); // 50
    }
    ```
2. Strings
3. Colors
4. Lists
5. Selectors
6. Introspection

