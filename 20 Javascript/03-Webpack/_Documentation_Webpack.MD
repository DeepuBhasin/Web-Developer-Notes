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

## 📘Assets
* There are four types of assets
1. asset/resource : use when importing large files
2. asset/inline : use when importing small files
3. asset : webpack decide automatically select one from above conditions ( condition : asset/resource > 8 kilobytes > asset/inline )
4. asset/source : Read the string and injects that string directly into javascript bundles 

## 📘Importing Image through webpacks (Asset/Resource)

1. Write rules in webpack (because webpack cannot understand the image files)

```js
const path = require('path');

module.exports = {
    entry: './src/index.js',
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, './dist')
    },
    mode: 'none',

    // adding rules for loading images
    module: {
        rules: [
            {   
                // loading tff files
                test: /\.(ttf)$/,
                type: 'asset/resource'

            },
            {
                // loading png or jpg files
                test: /\.(png|jpg)$/,
                type: 'asset/resource'
            }
        ]
    }
}
```
2. writing a function for importing image file (add-images.js)

```js
import work from "./wok.jpg";

function addImage() {
    const img = document.createElement('img');
    img.alt = 'Work';
    img.width = 300;
    img.src = work;
    const body = document.querySelector('body');
    body.appendChild(img);
}

export default addImage;
```

3. importing files

```js
import helloWorld from './hello-world.js'
import addImage from "./add-image.js"

helloWorld();
addImage();
```

4. Run Command

```
npx webpack
```

5. You will get out put in **dist folder** with **bundle.js** and **ff034541606f59c6b4e5.jpg** (some random name)

## 📘 PublicPath
1. Adding Specific Folder
* this is use to load image from sepecific path like **local Path**, **CDN Path**
* this features only works in **webpaack5**
```js
const path = require('path');

module.exports = {
    entry: './src/index.js',
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, './dist'),
        
        // this is use to get the file from particular folder
        publicPath: './dist/'
    },
    mode: 'none',
    module: {
        rules: [
            {
                test: /\.(ttf)$/,
                type: 'asset/resource'

            },
            {
                test: /\.(png|jpg)$/,
                type: 'asset/resource'
            }
        ]
    }
}
```
![publicPath](./images/publicPath.png)

2. Adding CDN Link
* this link will **append to every images which will generated from webpack**
```js
// For CDN link
publicPath: 'https://some-random-url.com/'
```
![CDN-publicPath](./images/publicPath-cdn.png)

## 📘Importing Image through webpacks (Asset/Inline)
* Like Importing File like **base64**
* Main disadvantage is that it will **increase** js file size
* Main Advantage is that if the sizes if Normal images are very large our web page will make a **http request** to load images which is very expensive so converting into **base64** will save our **http request**

```js
const path = require('path');

module.exports = {
    entry: './src/index.js',
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, './dist'),
    },
    mode: 'none',
    module: {
        rules: [
            {
                test: /\.(png|jpg)$/,
                // creating base 64 images file
                type: 'asset/inline'
            }
        ]
    }
}
```
![base64-Image](./images/asset-inline-base64.png)

## 📘Importing Image through webpacks (Asset)
* webpack decide automatically and select one option from above conditions 
* ( condition : asset/resource > 8 kilobytes > asset/inline )

```js
const path = require('path');

module.exports = {
    entry: './src/index.js',
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, './dist'),
    },
    mode: 'none',
    module: {
        rules: [
            {
                test: /\.(png|jpg)$/,
                // asset type
                type: 'asset',
            }
        ]
    }
}
```

* Make condition for loading converting image upto a particular condition

```js
const path = require('path');

module.exports = {
    entry: './src/index.js',
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, './dist'),
    },
    mode: 'none',
    module: {
        rules: [
            {
                test: /\.(png|jpg)$/,
                type: 'asset',

                // Making condition
                parser: {
                    dataUrlCondition: {
                        maxSize: 300 * 1024         // 300 hunderd kilobytes
                    }
                }
            }
        ]
    }
}
```
## 📘Importing Image through webpacks (Asset)
* Asset source reads the contents of the file into a Javascript String and injects that string directly into the javascript bundle as is without any modfications similarly to asset in line
* This type of asset module doesn't generate any file in the output directory
* **Below we are reading text file**

1. Create **text** file
```js
// work.txt
Work image file
```

2. Webpack File

```js
const path = require('path');

module.exports = {
    entry: './src/index.js',
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, './dist'),
    },
    mode: 'none',
    module: {
        rules: [
            {
                test: /\.(png|jpg)$/,
                type: 'asset',
            },
            {
                test: /\.txt/,
                type: 'asset/source'
            }
        ]
    }
}
```
3. Command
```
npx webpack
```

![Image](./images/text-file.png)