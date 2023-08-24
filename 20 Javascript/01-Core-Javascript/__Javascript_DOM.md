1. **querySelector**
* use to select particular element
* for **class** use **'.'** and for **id** use **#**
```html
<div id="message">Hello World ...</div>
<script>
    console.log(document.querySelector('#message'));
</script>
```
![Image](images/dom-query-selector.png)

2. **textContent**
* use to print the text content in the element

```js
const msg = document.querySelector('#message');
// Hello World ...
console.log(msg.textContent);
``