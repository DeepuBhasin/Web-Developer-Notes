## 📘Syllabus
1. Simple configuration
2. loaders and asset modules
3. webpack plugins
4. code spliting
5. integration with Expresson.js
6. Module Federation

---

## 📘Why do we need
1. Eliminate the sequence of including javascript

```html
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <script src="./index.js"></script>
    <script src="./hello-world.js"></script>
</body>
</html>
```
```javascript
// hello-world.js
function helloWorld() {
    console.log('Hello world')
}
```

```javascript
//index.js
helleWorld();
```
![Image](./images/order-issues.png)

## 📘 Install Package

1. Run Commands
```
npm inti -y
```

```
npm install webpack webpack-cli --save-dev
```
* webpack-cli : its a tool which allow you to run webpack from terminal

2. Create **src Folder** and Place all js files over there
* hello-world.js

```javascript
export default function helloWorld() {
    console.log('Hello world')
}
```

* Index.js
```javascript
import helloWorld from './hello-world.js'
helloWorld();
```
3. Create **index.html** as same level of **src folder** and include only singel file

```html
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <script src="./src/index.js"></script>
</body>
</html>
```
4. Run command

```
npx webpack
```
* this command will create **dist** folder and create **main.js** file in it

## 📘 Custom Configuration (Basic)
* create **webpack.config.js** 
```js
// to get the absolute path, it is available in node automatically
const path = require('path');

module.exports = {
    entry: './src/index.js',
    output: {

        // file name
        filename: 'bundle.js',

        // it will create bundler file in dist folder 
        path: path.resolve(__dirname, './dist')
    },
    mode: 'none'
}
```

* Then run this command

```
npx webpack
```
![Basic-Custom-Configuration](./images/custom-configuration-basic.png)