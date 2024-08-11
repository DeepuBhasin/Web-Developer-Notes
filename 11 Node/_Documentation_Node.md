### 📘Information

1. For Node Documentations (all api's)

    ```
    https://nodejs.org/docs/latest/api/
    ```

2. Node is single threaded language but it is async in nature.


3. Data Can be store in following modules

   1. Json-File
   2. Mysql
   3. MondoDB

4. Node Vs Npm

   1. node and npm are different things npm stands for node package manager. This thing get install automatically to deal with packages while node is run time environment.

   2. node -v to check version of node & npm -v  to check version of npm (their version can be different from each other)

5. In Node first parameter in every function (callback) will be **error** parameter and second one will be **data**

    ```js
    // Example
    fs.readFileSync('./input.txt', 'utf-8', (error, data) => {
        console.log('data : ', data);
        console.log('error', error);
    })
    ```

6. In Node when every we pass any *callback* that means that function is asynchronous function. Example when *readFile* read file completely then it will call that callback function.



    ```js
    // Example
    fs.readFile('./input.txt', 'utf-8', (error, data) => {
        console.log('data : ', data);
        console.log('error', error);
    })
    ```
---

### 📘What is Node.js

![Image](images/what-is-node.jpg)

![Image](images/javascript-run-out-side.png)

---

### 📘Javascript on the server Side

* Node is not a language. Its a Server Environment but Code syntax of javascript and Node is same (but it is not exactly same).

* Build fast, highly scalable network applications (back-end) like create api, database connections but javascript not.

* Node.js can access file system but javascript not.

* Node can connect with Database but javascript not.

* Better networking capabilities.

* Node.js use chrome's V8 engine to execute code.

* Node.js mostly used for api and its is super fast, so we can connect the same database with web App, Mobile App. Node is super-fast for api's


![Image](./images/why-and-when-to-use-node-js.png)

---

### 📘REPL & Global variables,

1. Node terminal called REPL (Read Evaluate Print Loop)

2. type *node* to enter into REPL & type *.exit* to exit from REPL

3. Last result always store in *_* (underscore)

    ```js
        var a = 10;
        _  // 10

        var c = "Hello World";
        _  // "Hello World"

        var b = 10 + 10;
        _  // 20
    ```

4. Press **tab** key word you can see a list of global variables

5. You can see various methods in function constructor using **String.** then press tab


6.  We can write any thing in terminal like js example creating variable, print output etc

---

### 📘Modules

* There are 3 Types of Modules

  1. Inbuilt : fs. http etc

  2. User-defined : import or export type

  3. Third party modules : express

* Global & Non-Global Module : Global module are those module which we do not import and accessible all the time and Non-Global are those which we need to import to access.

    ```js
    console.log('Hello World')  // This is global module

    const fs = require('fs');   // This is non-global module
    fs.writeFileSync('hello.txt', 'Hello World');
    ```


---

### 📘UseFul Variables

* __dirname : to print current working directory.

* __filename : to print current working file name.

* path : to get current directory path (best one)

    ```js
    const path = require('path');

    const redirectToFolder = path.join(__dirname, '/any-folder-name');
    ```


## 📘Synchronous Vs Asynchronous

![Image](./images/sync-vs-async.png)

![Image](./images/sync-vs-async-1.png)

![Image](./images/sync-vs-async-2.png)

![Image](./images/sync-vs-async-3.png)

---

## 📘Reading and Writing Files in Synchronous way VS Asynchronous way

```js
// This 'fs' module allows us to read, write functions on files
const fs = require('fs');
```



**Synchronous Way**


* **input.txt**
```
Hello may name is Deep Singh. I am working as front end engineer. My Primary technology is React.
```

* **app.js**
```js
// default function for files
const fs = require('fs');

/*
    Read data from file
    1. First parameter is path name
    2. second parameter is character set
*/
const textIn = fs.readFileSync('./input.txt', 'utf-8');
console.log(textIn);

const textOut = `this is text which is adding through coding. ${textIn}\n Created on ${Date.now()}`;


/*
    writing content in file
    1. First parameter is path name (it wll generate new file)
    2. second parameter is write text to
*/
fs.writeFileSync('./output.txt', textOut);  // this file will generate automatically
```

```
node app.js
```

**Asynchronous Way**


* **Reading Data**

```js
console.log('Execute Start');

/*
    Read data from file
    1. First parameter is path name
    2. second parameter is character set
    3. Callback function
*/

const fs = require('fs');
fs.readFile('./input.txt', 'utf-8', (error, data) => {
    console.log('data : ', data);
    console.log('error', error);
})

console.log('Executed End');

/*
    Output

    Execute Start
    Executed End
    data :  Hello may name is Deep Singh. I am working as front end engineer. My Primary technology is React.
    error null */
```


**⚠️Note :** If we do not pass *'utf-8'* as parameter then it will return *Buffer* instead of text. This Buffer means its data is saved into temporary memory.


* **Reading and writing Data**

```js
console.log('Execute Start');

const fs = require('fs');
fs.readFile('./input.txt', 'utf-8', (error, data) => {
    if (error) {
        return console.log('Error !!! file not found')
    }
    console.log('data : ', data);
    console.log('error', error);

    fs.writeFile('./output.txt', data + ' Coming data from async code', 'utf-8', err => {
        console.log('Your fetch file and code written successfully');
    })
})

console.log('Executed End');
```
---

## 📘Creating a Simple Web Server with server response


This built-in http module, which allows you to create an HTTP server.

```js
const http = require('http');
```



* Steps to build server

  1. Create a server

  2. Start a server to consume



**Create Server**


* app.js
```js
const http = require('http');

/*
    use to create server
    1. First parameter will be request Parameter
    2. Second Parameter will be response Parameter
*/

const http = require('http');

// creating server
const server = http.createServer((request, response) => {

    // use to send response to client
    console.log(request)

    // use to send response to client
    response.end('Hello from server!');
});


/*
    use to create server
    1. First parameter will be Port Number
    2. Second Parameter will be Address
    3. Optional parameter for response
*/

// Listening request
server.listen(8000, '127.0.0.1', () => {
    console.log('Listening to request on port 8000');
});
```

* Run Command
```
node index.js
```

* Hit this address in google chrome
```
http://127.0.0.1:8000/
```

**⚠️ Note :** if you mention other the *80* then we have to write complete address example http://127.0.0.1:8000 otherwise we don't need to add port number

**📖 Theory :**

```js
const server = http.createServer((request, response) => {
    // use to send response to client
    console.log(request)

    // use to send response to client
    response.end('Hello from server!');
});
```

Here, an HTTP server is created using the http.createServer method. This method takes a callback function that will be executed every time a request is received. The callback function has two parameters: request and response.

* request: Contains information about the client's request (e.g., URL, headers, method).

* response: Used to send a response back to the client.

Inside the callback function:

* console.log(request): Logs the request object to the console.

* response.end('Hello from server!'): Sends a response back to the client with the message 'Hello from server!' and ends the response.



```js
server.listen(8000, '127.0.0.1', () => {
    console.log('Listening to request on port 8000');
});
```

This line starts the server, making it listen for incoming requests on port 8000 and the IP address 127.0.0.1 (localhost). The callback function inside server.listen will be executed once the server starts listening, logging 'Listening to request on port 8000' to the console.

---


### 📘Routing using Http Module & Returning json Data


```js
const http = require('http');
const fs = require('fs');


/* This code will run only once */
const data = fs.readFileSync('./product.json', 'utf-8');
$responseBody = data;


/* this code will run again and again because it is in callback function of http.createServer so when ever we hit request this call back function will be executed */
const server = http.createServer((request, response) => {

    const pathName = request.url;

    if (pathName === '/' || pathName === '/overview') {
        response.end('Welcome to our homepage');
    } else if (pathName === '/about') {
        response.end('Welcome to our about page');
    } else if (pathName === '/product') {
        // sending json data

        $statusCode = 200;
        $headers = {
            'Content-type': 'application/json',
        }

        response.writeHead($statusCode, $headers);
        response.end($responseBody);

    } else {
        // sending html data

        $statusCode = 404;
        $headers = {
            'Content-type': 'text/html',
            'my-own-header': 'hello-world'
        }
        $responseBody = '<h1>page not found</h1>';

        response.writeHead($statusCode, $headers);
        response.end($responseBody);
    }
});

server.listen(8000, '127.0.0.1', () => {
    console.log('Listening to request on port 8000');
});
```

---

## 📘Creating and Loading Modules

* In Node every single file ic called Module


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
* Export Everything 
  ```js
  // index.js
  exports.sum = (a, b) => {
    return a + b;
  };

  exports.isAdmin = true;

  exports.subtract = (a, b) => {
    return a - b;
  };
  ```

  ```js
  // app.js
  const d = require('./index');

  console.log(d.sum(1, 2));
  ```
---


### 📘Getting inputs from command line

* You can get parameters from terminal in node using ```process.argv``` (argument Vector). It will return array in which first two elements are predefined.

* index.js

    ```js
    // index.js
    const fs = require('fs');

    const action = process.argv[2];
    const fileName = process.argv[3];
    const fileContent = process.argv[4];

    if (action === 'add') {
        fs.writeFileSync(fileName, fileContent, (err) => {
            if (err) {
            console.log(err);
            } else {
            console.log('File created successfully');
            }
        });
    } else if (action === 'remove') {
        fs.unlinkSync(fileName, (err) => {
            if (err) {
            console.log(err);
            } else {
            console.log('File removed successfully');
            }
        });
    } else {
        console.log('Invalid action');
    }
    ```

* Command

    ```
    node index.js add hello.txt 'Hello World from react'

    node index.js remove hello.txt
    ```
---

---

### 📘Create Files and Directory

```js
const path = require('path');
const fs = require('fs');
const directoryName = 'files';

fs.mkdirSync(directoryName);

const dirPath = path.join(__dirname, directoryName);
for (let i = 1; i <= 5; i++) {
  fs.writeFileSync(`${dirPath}/file-${i}.txt`, 'hello world');
}

fs.readdir(dirPath, (err, files) => {
  if (err) {
    console.log(err);
  } else {
    files.forEach((file) => {
      console.log(file);
    });
  }
});
```

**⚠️Note :** When ever we run node in any folder it will create that folder as web server or kind of server therefore we cannot access any files outside of this server link in D drive, C Drive etc it is good other wise hacker can easily access your data.

---


### 📘Commands for Packages, Types of Packages, Version, Version Indicators

* **Commands**

    1. To Install specific Package : npm i \<package-name>

    2. Install package with specific version : npm i \<package-name>@\<version-number> example npm i @4.1.1 or npm i @4 (it will install best version related to 4)

    3. To Remove package : npm r or npm uninstall \<package-name>

    4. To update the packages : npm update

    5. To check outdate package : npm outdate (run this command in terminal directly)

    6. To check version of package : npm view \<package-name> version

    ![Image](./images/npm-outdate.png)

    **⚠️Note :** package-lock.json file is also very important file because it store the versions of the dependency packages.

* **Normal Dependency :** These are those packages which provide core functionality to run application, **without these packages we cannot run our applications**.

* **Dev Dependency :** These package are those packages which provide just additional features while developing application in development mode, **without these package we can run our applications as well.**


* **Versions** : This Indicate version of the package this will be like **MajorVersion.MinorVersion.PatchVersion** (12.3.11)

  * Patch Version : it defines that its only fix bugs.

  * MinorVersion : It defines that it introduce new feature but it does not include breaking changes

  * MajorVersion : It defines that its a huge change which can have breaking changes


* **Version Indicator :**

  * *: Matches any version of the package. It is the most permissive and allows any update, regardless of major, minor, or patch changes. (not good one can lead to breaking changes code)

  * ^ (caret): Allows updates that do not change the first non-zero number. For example, ^1.2.3 will allow updates to 1.x.x but not 2.x.x. It is more permissive.

  * ~ (tilde): Allows updates that do not change the minor version number. For example, ~1.2.3 will allow updates to 1.2.x but not 1.3.x. It is more restrictive.(this one is more save because its only accept patches)




**Some useful Packages**



1. **Slugify :** it is use to make readable url's. It is basically a function use to create slugs, slugs is basically just the last part of the url that contains a unique string that identify the resource that the website is displaying example 127.0.0.1:8000/product/**fresh-avocados** (in simple words use slugs instead of numbers like ?id=1 use this ?id=fresh-avocado).

    ```
    npm i slugify
    ```

    ```js
    const slugify = require('slugify');
    console.log(slugify('Some Title', { lower: true }));    // some-title
    ```


    Check the documentation for various options

2. **Nodemon :** It helps node js applications by automatically restarting when ever we change some files. (here index.js file will be server file)

    ```js
    "scripts": {
        "start": "nodemon index.js"
    },
    ```

    **⚠️Note :**

    1. when you want to run any thing locally you have to write command under **scripts** otherwise in case of global install you will write direct command example : *nodemon index.js*

    2. **start** is kind of default one for development you we can write *npm start* instead of *npm run start*

---

### 📘What Happen when we access a webpage

Now, in order to get a better understanding of how the web actually works, let's start by asking the question: ‫What does actually happen each time ‫that we type a URL into our browser ‫in order to open up a new webpage? ‫Or each time that we request data from some API? ‫Which is actually quite the same ‫and so let's just focus on a simple website example here. ‫Well, the most simple answer is that our browser ‫which is also called a client sends a request ‫to the server where the webpage is hosted. ‫And the server will then send back a response, ‫which is gonna contain the webpage that we just requested. **And this process is called the request-response model or also the client-server architecture**.

![Image](./images/what-happen-when-we-access-a-webpage-1.png)


Now let's say that we wanna access Google Maps by writing google.com/maps into our browser as the URL. ‫And every URL gets an HTTP or HTTPS, ‫which is for the protocol that will be used ‫on the connection. ‫‫Then we have the domain name here, ‫which is google.com in this case, ‫and also after a slash, the so-called resource ‫that we're going to access, ‫and in this case, /maps. ‫Now what you need to know here is that the domain name ‫like google.com is not actually the real address ‫of the server that we are trying to access ‫but just a nice name that is easy for us to memorize. ‫So we need a way of kind of converting the domain name ‫to the real address of the server ‫and that happens through a DNS. ‫So DNS stands for Domain Name Server, ‫which are special servers that are basically ‫like the phone-books of the internet.

![Image](./images/what-happen-when-we-access-a-webpage-2.png)



So the first step that happens when we open up a website is the the browser makes a request to a DNS and this special server will then simply match the web address that we typed into the browser to the server's real IP address. Actually this happens through your internet service provider or ISP ‫but the complete details don't really matter for us. What you need to retain from this part is that the domain is not the real address and that a DNS will convert it to that real IP address, which a browser can then call after it being sent back to our browser.

![Image](./images/what-happen-when-we-access-a-webpage-3.png)




![Image](./images/what-happen-when-we-access-a-webpage-4.png)


So this is how the real address looks like, so it still has the protocol, but then comes the IP address. And also the port that we accessed on the server. And the port number is really just to identify a specific service running on a server and so you can think of it like a sub-address. Remember how we listened to port 8000 on our web server when we set it up in the intersection that is exactly what this port is. Also please note that the port number has nothing to do with the Google Maps resource that we want to access. That resource will actually be sent over in the HTTP request as we will see in a moment.


![Image](./images/what-happen-when-we-access-a-webpage-5.png)

So once we have the real web address, ‫a TCP socket connection is established ‫between the browser and the server, ‫which are now finally connected. ‫And this connection is typically kept alive ‫for the entire time it takes to transfer ‫all the files of the website. ‫Now, what are our TCP and IP? ‫Well, TCP is the Transmission Control Protocol ‫and IP is the Internet Protocol, ‫and together they are communication protocols ‫that define exactly how data travels across the web. ‫So they're basically ‫the internet's fundamental control system, ‫because, again, they are the ones who set the rules about how data moves on the internet.

![Image](./images/what-happen-when-we-access-a-webpage-6.png)



Anyway, now it's time to finally make our request. And the request that we make is an HTTP request ‫where HTTP stands for HyperText Transfer Protocol. ‫So after TCP/IP, HTTP is yet another communication protocol. ‫And by the way, a communication protocol ‫is simply a system of rules ‫that allows two or more parties to communicate. ‫And in the case of HTTP, it's just a protocol ‫that allows clients and web servers to communicate ‫by sending requests and response messages ‫from client to server and back.

![Image](./images/what-happen-when-we-access-a-webpage-7.png)

So Now, a request message will look something like this. ‫So the beginning of the message is the most important part ‫called the start line, which contains the HTTP method ‫that's used in the request, ‫then the request target and the HTTP version. So about HTTP methods, there are many available ‫but the most important ones are get ‫for simply requesting data, post for sending data and put and patch to basically modify data.‫So you see an HTTP request to the server is not only for getting data but we can also send data. Anyway, about the request target, this is where the server is thought that we want to access the maps resource in this example. Remember that? So we had /maps in our URL and now it's sent as the target in the HTTP request so that the server can then figure out what to do with it. ‫And if this is empty, so if it was just a slash, basically, ‫then we would be accessing the website's root ‫which would be just google.com in this example. ‫Then the next part of the request are the request headers ‫which is just some information that we send ‫about the request itself, ‫and there are tons of different headers available ‫like what browser is used to make the request, ‫at what time, the user's language and many, many others. ‫Finally, in the case we're sending data to the server, ‫there will also be a request body containing that data, for example, coming from an HTML form.‫ So that is the HTTP request.

‫Now, of course, it's not us developers who manually write these requests but it's still extremely important that you understand what an HTTP request and also a response look like because you will be working with them a ton, okay? Also, I want to mention that there's also HTTPS as you probably know. And the main difference between HTTP and HTTPS is that HTTPS is encrypted using TLS or SSL, which are yet some more protocols but I'm not gonna bore you with these. But besides these additional encryption, the logic between HTTP requests and responses still applies to HTTPS. All right, so our request now hits the server, which will be working on it until it has our website ready to send back. And it will send it back using, as you can guess, an HTTP response.

![Image](./images/what-happen-when-we-access-a-webpage-8.png)

And the HTTP response message actually looks quite similar to the request. ‫So also with a start line, headers and a body. The start line has, besides the HTTP version, ‫a status code and a message. ‫So, basically, to let the client know ‫whether the request has been successful or not. ‫This 200, for example, means okay, ‫and the one that everyone knows is status code 404 ‫which means not found. ‫And so this is where this 404 code ‫that you already knew comes from. ‫Then the response headers or information ‫about the response itself. ‫So just like before, and there are a ton available ‫and we can also actually make up our own headers. ‫Now, what's different about response headers ‫is that it's actually the back-end developer like you ‫who specifies them and sends them back in the response. ‫All right. ‫Finally, the last part of the response ‫is, again, the body, which is actually present ‫in most responses. ‫And it's also the developer who specifically sends back ‫the body in the response. ‫And we actually already did this back in the intersection ‫using response.end, remember? ‫And the body should usually contain the HTML of the website ‫we requested or, for example, JSON data coming back ‫from an API or something like that. ‫So we talked in great detail ‫about the most important parts here, ‫which are the HTTP request and the response. ‫But in our imaginary example, we only just did one request ‫to google.com and got one response. ‫However, if it's a website that we're trying to access, ‫there will be many, many more requests and responses. ‫And that is because when we do the first request, ‫all we get back is just the initial HTML file, ‫that file will then gets scanned for all the assets ‫that it needs to build the entire website ‫like JavaScripts, CSS files, image files or other assets. ‫And for each of these different files, ‫the browser will then make a new HTTP request to the server. ‫So, basically, this entire back and forth ‫between client and server that it just explained ‫happens for every single file ‫that is included in the website. ‫There can, however, be multiple requests and responses ‫happening at the same time. ‫But the amount is actually limited ‫because, otherwise, the connection would start to slow down. ‫Okay, and then finally, when all the files have arrived, ‫the website is rendered in the browser ‫according to the HTML, CSS and JavaScript specifications that you might already know.

![Image](./images/what-happen-when-we-access-a-webpage-9.png)

here is what you need to know. First, the job of TCP is to break out the requests ‫and responses into thousands of small chunks called packets ‫before they are set. ‫Then once they get to their destination, ‫it will reassemble all the packets ‫into the original request or response ‫so that the message arrives at the destination ‫as quick as possible, which would not be possible ‫if we sent the website as one big chunk. ‫So that would be like trying to go ‫through dance traffic with like the biggest bus ‫that you can imagine. ‫So, not a good idea. ‫Now, at the second part, the job of the IP protocol ‫is to actually send and route all of these packets ‫through the internet. ‫So it ensures that all of them arrive at the destination ‫that they should go using IP addresses on each packet. ‫And again, this is just a very broad overview ‫of what really happens behind the scenes of the web, ‫because that is actually way too much information ‫than you actually need in order to become ‫a great back-end developer. ‫But I hope that you still found this information useful ‫and interesting, and also not all too confusing. ‫Now, in the next video, we will then actually do ‫some HTTP requests so that you become a bit more familiar ‫with the protocol.


![Image](./images/what-happen-when-we-access-a-webpage-9.png)


---

### 📘Static Vs Dynamic Vs API

![Image](./images/static-website-vs-dynamic-website.png)


![Image](./images/dynamic-websites-vs-api.png)

API : Application Programming Interface: a piece of software that can be used by another piece of software, in order to allow applications to talk to each other.


![Image](./images/one-api-many-consumer.png)

---

### 📘Node Architecture and Node Thread

![Image](./images/node-architecture.png)

![Image](./images/node-process-and-thread.png)

---

### 📘Asynchronous

This is same as in javascript

---

### 📘Whats is express and why use it and Basic Code

* You can check document for more details.

* Express is minimal **node.js framework**, a higher level of abstraction and it is built on the node.js

* Express contains a very  robust set of features: complex routing, easier handling of request and response, middlewares, server-side rendering etc.

* Express allows for rapid development of node.js application. we don't have to re-invent the wheel;

* Express makes it easier to organize our application into the MVC architecture.

Basic Code

* Install package name

    ```
    npm i express
    ```

* Package.json

    ```js
    "scripts": {
        "start": "node app.js"
    }
    ```

* app.js

    ```js
    const express = require('express');

    // call express
    const app = express();

    // Routes with http method
    app.get('/', (req, res) => {
        // return type of res.send() is string
        //   res.send('Hello World')

        // return type of res.json() is object with convert into string
        res.status(200).json({ message: 'Hello World' });
    });

    // listen to port
    const port = 3000;
    app.listen(port, () => console.log(`Server started on port ${port}...`));
    ```

* command

  ```
  npm run start
  ```
---

### 📘API and Rest Architecture

* Application Programming Interface: a piece of software that can be used by another piece of software, in order to allow applications to talk to each other.


* Why json is used

  * Its very light weight can easily transfer on internet.

  * Every one is using and readable for humans and computers as well.

  * Right now it is majorly use in every softwares.


Rest Architecture

1. Separate API into logic

2. Expose Structure resource-based URL's

3. Use HTTP methods (verb)

4. Send Data as JSON (usually)

5. Be Stateless

![Image](./images/rest-architecture-1.png)

![Image](./images/rest-architecture-2.png)

![Image](./images/rest-architecture-3.png)

![Image](./images/rest-architecture-4.png)

![Image](./images/rest-architecture-5.png)

---

### 📘Get Method with express (show json data and html page)

* user.json

    ```js
    {
        "firstName": "John",
        "lastName": "Doe",
        "email": "joe@doe",
        "password": "joe123"
    }
    ```

* app.js

    ```js
    const express = require('express');
    const fs = require('fs');

    const app = express();

    const user = JSON.parse(fs.readFileSync(`user.json`, 'utf-8'));

    // for json
    app.get('/', (req, res) => {
        res.status(200).json({
            status: 'success',
            data: {
            user,
            },
        });
    });

    // for html
    app.get('/', (req, res) => {
        res.status(200).send('<h1>Hello from express</h1>');
    });

    const port = process.env.PORT || 3000;
    app.listen(port, () => {
        console.log(`App running on port ${port}...`);
    });
    ```
    **⚠️Note :** you can create links as well using same href tag


* package.json

    ```js
    "scripts": {
        "start": "node app.js"
    }
    ```
---

### 📘Post Method with express

* app.js

  ```js
  const express = require('express');

  const app = express();

  // its a middleware to use body parser
  app.use(express.json());

  app.post('/', (req, res) => {
    // all data come into req.body object
    console.log(req.body);
    res.status(200).send('Hello World');
  });

  const port = process.env.PORT || 3000;
  app.listen(port, () => {
    console.log(`App running on port ${port}...`);
  });
  ```

* From postman

  ```js
  {
      "username" : "Deepinder"
  }
  ```

---

### 📘Params and Query Params in address-bar with express

```js
const express = require('express');

const app = express();

// its a middleware to use body parser
app.use(express.json());

app.post('/:id/:name/:age?', (req, res) => {

  // This is for normal params (age is optional parameter)
  console.log(req.params);      // { id: '1', name: 'jhon', age: '24' }
  // This is for query params
  console.log(req.query);       // { testing: 'true' }

  res.status(200).send('Hello World');
});

const port = process.env.PORT || 3000;
app.listen(port, () => {
  console.log(`App running on port ${port}...`);
});
```

```
http://127.0.0.1:3000/1/jhon/24?testing=true
```
---

### 📘Patch Request using express


* Put : is use for update the whole object.

* Patch : is use for update the some properties.


```js
const express = require('express');
const app = express();

app.use(express.json()); // Middleware to parse JSON bodies

// Sample data - a list of users
let users = [
  { id: 1, name: 'Alice', age: 25 },
  { id: 2, name: 'Bob', age: 30 },
  { id: 3, name: 'Charlie', age: 35 },
];

// PATCH endpoint to update a user's age
app.patch('/users/:id', (req, res) => {
  const userId = parseInt(req.params.id);
  const { age } = req.body;

  // Find the user by ID
  const user = users.find((u) => u.id === userId);
  if (!user) {
    return res.status(404).send('User not found');
  }

  // Update the user's age
  if (age !== undefined) {
    user.age = age;
  }

  res.send(user);
});

// Start the server
const port = 3000;
app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
```

```
http://127.0.0.1:3000/users/1
```

```js
// postman value
{
    "age" : "63"
}
```
---

### 📘Delete method using express

* use Delete method

---

### 📘All Methods with Route function

Use get, post and patch method. For post and patch use body props

```js
const express = require('express');
const app = express();

app.use(express.json()); // Middleware to parse JSON bodies

const getRequest = (req, res) => {
  res.status(200).send({
    message: 'Hello from the server',
  });
};

const postRequest = (req, res) => {
  res.status(200).send({
    message: { ...req.body },
  });
};

const putRequest = (req, res) => {
  res.status(200).send({
    message: { ...req.body },
  });
};

// without id
app.route('/api/v1/tours').get(getRequest).post(postRequest);

// with id
app.route('/api/vi/tours/:id').get('functionName').patch('functionName').put(putRequest);

const port = 3000;
app.listen(port, () => {
  console.log(`App running on port ${port}...`);
});
```

```js
// for post and patch
{
    "name" : "john"
}
```

```
http://127.0.0.1:3000/api/v1/tours
```

---

### 📘Middleware and Request-Response Cycle

* Middleware are functions which are only use with routes. With the help of middleware we can access or modify http request and response.

* It is very easy to create and can use easily.

![Image](./images/middleware-1.png)

![Image](./images/middleware-2.png)

![Image](./images/middleware-3.png)

**⚠️Note :** **route()** method is the last middleware of middleware stack


Various Types of Middlewares

1. Application-level : it apply on whole routes

2. Route-level : it will apply on specific route or group of route

3. Error-handling

4. Built-in

5. Third-party


**Example of Application-level middleware**

```js
const express = require('express');
const app = express();

app.use(express.json());

// first middleware
const firstCustomMiddleWare = (req, resp, next) => {
  console.log('Hello from the first middleware 👋');
  // without this next method next middleware will not be executed
  next();
};

const secondCustomMiddleWare = (req, resp, next) => {
  console.log('Hello from the second middleware 👋');

  // checking some conditions
  if (!req.query.age) {
    return resp.status(422).send({ error: 'You must provide an age' });
  }

  if (req.query.age < 18) {
    return resp.status(422).send({ error: 'You must be at least 18 years old' });
  }

  // without this next method next middleware will not be executed
  next();
};

// This is called application middleware
app.use(firstCustomMiddleWare);
app.use(secondCustomMiddleWare);

app.get('/', (req, resp) => {
  // route is our last middleware in chain
  console.log('Hello World');
  resp.status(200).send({ message: 'Welcome to the server' });
});

app.listen(3000, () => {
  console.log('Application is running on port 3000');
});
```

**Example of Route level middleware (single and group)**

```js
// Single level middleware

const express = require('express');
const app = express();

app.use(express.json());

const authentication = (req, resp, next) => {
  if (!req.query.admin) {
    return resp.status(401).send({ error: 'Unauthorized' });
  }
  if (req.query.admin !== '12345') {
    return resp.status(401).send({ error: 'Unauthorized' });
  }
  next();
};

const ageRequired = (req, resp, next) => {
  console.log('Hello from the second middleware 👋');

  if (!req.query.age) {
    return resp.status(422).send({ error: 'You must provide an age' });
  }

  if (req.query.age < 18) {
    return resp.status(422).send({ error: 'You must be at least 18 years old' });
  }
  next();
};

// This is called single middleware
app.get('/home', ageRequired, (req, resp) => {
  console.log('Hello World');
  resp.status(200).send({ message: 'Welcome to the server' });
});

// This is called single middleware
app.get('/admin', authentication, (req, resp) => {
  resp.status(200).send({ message: 'Welcome to the admin dashboard' });
});

// This is use for all routes
app.get('*', (req, resp) => {
  resp.status(404).send({ error: 'Page not found' });
});

app.listen(3000, () => {
  console.log('Application is running on port 3000');
});
```

```js
// Group level middleware

const express = require('express');
const app = express();

app.use(express.json());

// To create group routes (this is called real middleware)
const adminRoute = express.Router();
const userRoute = express.Router();

const authentication = (req, res, next) => {
  console.log('Hello from the authentication middleware 👋');
  if (!req.query.admin) {
    return res.status(401).send({ error: 'Unauthorized' });
  }
  if (req.query.admin !== '12345') {
    return res.status(401).send({ error: 'Unauthorized' });
  }
  next();
};

const ageRequired = (req, res, next) => {
  console.log('Hello from the age middleware 👋');

  if (!req.query.age) {
    return res.status(422).send({ error: 'You must provide an age' });
  }

  if (req.query.age < 18) {
    return res.status(422).send({ error: 'You must be at least 18 years old' });
  }
  next();
};

// Apply middleware to group routes
adminRoute.use(authentication);
userRoute.use(ageRequired);

// All admin routes
adminRoute.get('/home', (req, res) => {
  res.status(200).send({ message: 'Welcome to the admin dashboard' });
});

adminRoute.get('/profile', (req, res) => {
  res.status(200).send({ message: 'Welcome to your profile' });
});

adminRoute.get('/change-password', (req, res) => {
  res.status(200).send({ message: 'Change your password' });
});

// User route
userRoute.get('/home', (req, res) => {
  console.log('Hello World');
  res.status(200).send({ message: 'Welcome to the server' });
});

// Default path with middleware instance
app.use('/admin', adminRoute);
app.use('/user', userRoute);

// This is used for all other routes
app.get('*', (req, res) => {
  res.status(404).send({ error: 'Page not found' });
});

app.listen(3000, () => {
  console.log('Application is running on port 3000');
});

/*
Example URLs:
- http://localhost:3000/admin/home?admin=12345
- http://localhost:3000/user/home?age=18
*/

// OR

const express = require('express');
const app = express();

app.use(express.json());

// To create group routes
const adminRoute = express.Router();
const userRoute = express.Router();

// Apply middleware to group routes (called mounting routing)
adminRoute.use((req, res, next) => {
  console.log('Hello from the middleware 👋');
  next();
});

// Mount the admin routes under /api/v1
app.use('/api/v1', adminRoute);
app.use('/api/v1', userRoute);

// All admin routes (using route keyword)
adminRoute
  .route('/admin')
  .get((req, res) => {
    res.status(200).send({ message: 'Welcome to the admin dashboard' });
  })
  .post((req, res) => {
    res.status(200).send({ message: { ...req.body } });
  });

userRoute
  .route('/user')
  .get((req, res) => {
    res.status(200).send({ message: 'Welcome to the user dashboard' });
  })
  .post((req, res) => {
    res.status(200).send({ message: { ...req.body } });
  });

app.get('*', (req, res) => {
  res.status(404).send({ message: 'Page not found' });
});

app.listen(3000, () => {
  console.log('Application is running on port 3000');
});



```


---

### 📘Morgan

* It is very popular logging middleware, this is useful to show request data in console.

* Very useful package

```
npm i morgan
```

```js
const express = require('express');
const app = express();
const morgan = require('morgan');

// This is used to add Middleware stack
app.use(morgan('dev'));
app.use(express.json());

app.get('/', (req, res) => {
  res.status(200).send('Hello from express');
});

app.get('/about', (req, res) => {
  res.status(200).send('Hello from about');
});

app.get('/home', (req, res) => {
  res.status(200).send('Hello from home');
});

app.listen(3000, () => {
  console.log('Listening on port 3000');
});
```

![Image](./images/morgan-1.png)