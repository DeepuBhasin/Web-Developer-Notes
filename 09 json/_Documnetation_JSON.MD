## 📘JSON 
* json : javascript object notation (its nothing just data exchange format)
* used : used to store and exchange data (its a universal data to exchange data)
* there is no realtion of javascript between json , while desiging of json its format is look like javascript object (also Called javascript object notations or javascript object literals)
* Extention is : .json
* its **text format** written with javascript object notation and it can easily be sent and from a server and used as a data format by any programming language

📖Advantage
1. Human Readable Format (means any body can read easily)
2. Language Independetnt (there is no need for any specific/particulr language to execute)
3. Support all popular programming languages 
4. easy to organised and access 
5. it is light-weight 

📖Disadvantage 
1. Cannot use it for transfer video, audio, images or any other binary information
---

## 📘Json Vs Xml

| Sri no | JSON                                     | XML                                                 |
| ------ | ---------------------------------------- | --------------------------------------------------- |
| 1.     | Javascript object Notation               | Extensible Markup Language (means it is a language) |
| 2.     | Text Based Format                        | Mark up Language                                    |
| 3.     | Light Weight (bandwidth is less)         | Heavier                                             |
| 4.     | Does not support comments and namespaces | Supports comments and namespaces                    |

```js
//JSON format  : 
{"key":"value","key":value}

//example:

{"students":[
		{"name":"ram","age":"23","city","agra"},
		{"name":"sonam","age":"28","city":"Delhi"}
	]
}
```
```html
<!-- xml format -->
<tag>Value</tag>

<!-- example -->
<students>
	<student>
		<name>Ram</name>
		<age>23</age>
		<city>agra</city>
	</student>
	<student>
		<name>Sonam</name>
		<age>28</age>
		<city>Delhi</city>
	</student>
</students>	
```
1. xml strict language for example paired tags are used. 
   JSON is not strict.
2. xml use more bandwidth to share a data
   json use less bandwidth thus works faster.
3. xml has advantages too. xml can send media.
    json cannot.				
---

## 📘 javscript object Vs JSON

```js
{key : 'Value'}

// example
var person = {firstname : 'Deepinder',lastname : 'Singh'};		
//or  
var person = {'firstname' : 'Deepinder' , 'lastname' : 'Singh'};

alert(person.firstname + ' '+ person.lastname)		// Deepinder singh
```


```js
{"key" : "value"}

// example
var person = {"firstname" : "Deepinder" , "lastname" : "Singh"};		

alert(person.firstname + ' '+ person.lastname)		// Deepinder singh
```

| SriNo | JSON                                               | JavaScriptObject                                            |
| ----- | -------------------------------------------------- | ----------------------------------------------------------- |
| 1     | Need to enclose names of keys within double quotes | Not Necessary to enclose names of keys within double quotes |
| 2     | Should not use single quotes to enclose key names  | Can use single quotes to enclose key name                   |


---

## 📘JSON Sytnax Rules

1. JSON data is written inside curly braces.
2. Data is represented as key value pairs.
3. Keys should be enclosed in double quotes.
4. key and value should be separated by colon (:).
5. Comma (,) is used to separate data.
6. Square brackets hold arrays.
7. Curly braces hold objects.

```js
{
	"firstName" : "Deepinder",
	"lastName" : "Singh",
	"age" : 29,

}
```

## 📘Json DataType
1. number
2. string
3. boolean
4. null
5. array
6. Object

```js
{
    "name" : "Deepinder Singh", 
	"age"  : 25,
	"married" : true,  
	"hobbies":["music","sports"],
	"vehicle":[
        {"type":"car","vname":"swift"},
        {"type":"bike","vname":"pulser"} 
	    {"kids" :null}
    ],
    "address" : {
        "street" : "ABC Street",
        "city" : "XYZ",
        "state" : "Texas",
        "postCode" : 56001
    }
}
```
## 📘Json Methods

* Json is actually text based data that is used to exchange information between clients and servers

```js
// Convert String into Object
JSON.parse()

// Convert Object into String
JSON.stringify()
```
---

## 📘Access Json

1. using Dot 		: .key
2. using bracket 	: ["key"]

3. printing using for lop 
```js	
for(var i in obj){
    console.log(obj[i])
}
```
---
## 📘Ajax Request

1. Get Request
```js
// creating object
var xmlhttp = new XMLHttpRequest();

// sending url into open method
xmlhttp.open('GET', 'https://jsonplaceholder.typicode.com/posts', false);   // true/false for asynchronous

// sending request
xmlhttp.send();

// checking state
if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
    const data = xmlhttp.responseText;
    console.log(data);
}
```
2. Post Request

```js
var xhr = new XMLHttpRequest();
var url = 'https://jsonplaceholder.typicode.com/posts'; // Replace with your API endpoint

// Create a new FormData object
var formData = new FormData();
formData.append('title', 'John Doe');
formData.append('body', 'this is testing');

xhr.open('POST', url, true);

xhr.onreadystatechange = function () {
    console.log(xhr.responseText);
    if (xhr.readyState === 4 && xhr.status === 200) {
        // Request completed and successful
        var response = xhr.responseText;
        console.log(response);
    }
};

// Send the POST request
xhr.send(formData);
```
---

## 📘PHP Methods 

```php
// Convert Object into json 
json_encode()
echo json_encode(['data' => 'Hello world']) 

//Convert String into Object
json_decode()
```

## 📘Json Deals with Dates

```js
{
    "name" : "Deepinder Singh",
    "dob" : 754140600000 
}
```
```js
// example
let data = JSON.parse('{ "name": "Deepinder Singh", "dob": 754140600000 }');
        console.log(new Date(data.dob));
```