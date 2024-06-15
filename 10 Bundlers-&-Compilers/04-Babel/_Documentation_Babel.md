## 📔Babel
* Babel is used to convert modern JavaScript code into basic JavaScript (ES6 or earlier) so that older browsers can understand it.
* You can get all settings from babel documentation.
### 📘Difference between Babel & Webpack
* **Babel** is used to convert modern JavaScript code into basic JavaScript (ES6 or earlier) so that older browsers can understand it.
* **Webpack** is use to bundle all files into a single which includes minify, remove extra codes or unwanted codes etc.


### 📘Installation & configuration

**1. For basic packages**

* Create src folder and place js files

```js
let x = 10;
console.log(x)
```

* Packages (basic packages)
```
npm install --save-dev @babel/core @babel/cli
```

* packages.json

```js
"build": "babel src -d dist"
```

* Command
```
npm run build
```
![Image](./images/core-babel-package.png)


**2. To convert es2016+ code into es2015**

* Packages
```
npm install @babel/preset-env --save-dev
```
* Create **babel.config.json** (place the below code), on older version file name was **.babelrc**
```js
{
  "presets": ["@babel/preset-env"]
}
```
* packages.json

```js
"build": "babel src -d dist"
```

* Command
```
npm run build
```
![Image](./images/babel-settings-code.png)

### 📘Async-Await Conversion example

* No need to write type="module" for compiled code.

```html
<script src="dist/main.js"></script>
```

![Image](./images/async-await-compilation.png)

![Image](./images/async-await-compilation-output.png)


### 📘Babel Loader in webpack

* Already covered in webpack notes (in Js Loader and babel loader topic)
