## 📘Creating and Loading Modules

* Exporting with using Object
```js
// app.js
function sayHello(name) {
    console.log('Hello ' + name)
}

module.exports.sayHello = sayHello;
```

```js
// script.js
var app = require('./app');

app.sayHello('Deepinder Singh')
```
* Exporting with names
```js
// app.js
function sayHello(name) {
    console.log('Hello ' + name)
}

module.exports= sayHello;
```

```js
// script.js
var app = require('./app');

app('Deepinder Singh')
```

```
node script.js
```
