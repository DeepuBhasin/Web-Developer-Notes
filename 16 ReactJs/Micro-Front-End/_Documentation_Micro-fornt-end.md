## 📘Run-Time Intigration

![Image](./images/runtime-intigration.png)

## 📘Html Webpack Plugin

![Image](./images/htmlwebpackplugin.png)


![Image](./images/htmlwebpackplugin-2.png)

* This Plugin automatically add various **javascript files** which is generated from **webpack** into **html File**.

## 📘Various Steps
* Various Steps

![Image](./images/various-steps-for-mfe.png)

* Adding Module Plugin in **Remote**

![Image](./images/module-fedration.png)

* Adding Module Object in **Remote** plugin

![Image](./images/object-modul-fedration.png)

* Adding Module Object in **Host** plugin

![Image](./images/host-module.png)

```javascript
remotes : {
    products : "products@http:/localhost:8081/remoteEntry.js"
}
```
## 📘Network Call
1. Loading Files From Remote MFE

![Image](./images/remote-entry.png)

* **main.js :** Main file is created by bundler
* **remoteEntry.js :** This file is developed by ModuleFederationPlugin like **manifesto** which has list of all loading files from MFE example *componentIndex.tsx*, it provide direction to another MFE for which file you need to load.
* **src_index.js :** which have all the components files in it

2. Loading Files in Host MFE

* When container loads its first load **index.js** file and allow **webpack** to load other **MFEs** files in **Host** example 
```javascript
import {useStore} from "container/StoreModule"
```
this like will load all files from mfe

![Image](./images/conatiner-webpack.png)

3. Combining All things

![Image](./images/final-call.png)