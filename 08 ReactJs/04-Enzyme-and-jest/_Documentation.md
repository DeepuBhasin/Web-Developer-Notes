### 📘Features of Enzyme
1. What does Enzyme do?
   1. Create virtual DOM for testing
   2. Allows testing without a browser
2. Enzyme vs react-dom (Enzyme has better toolkit)
   1. Search through Dom (using jquery)
   2. Simulate simple events (click, blur etc)
3. Shallow Rendering (Renders components only one level deep)
   1. Render parent but use placeholder for children components
4. Access to props and state
   1. Manipulate values
   2. Examine / test for values

### 📘Installation

```
npm i --save-dev enzyme enzyme-adapter-react-16
```

**⚠️ Note :** your react and react-dom version should be 

```js
"dependencies": {
    "react": "16.14.0",
    "react-dom": "16.14.0",
}
```

### 📘Basic configuration

```js
import React from 'react';
import { configure, shallow } from 'enzyme';
import Adapter from 'enzyme-adapter-react-16';
import App from "./App";
configure({ adapter: new Adapter() });

describe('App', () => {
  it('renders without crashing', () => {
    let wrapperRapper = shallow(<App />);
    console.log(wrapperRapper.debug());
  });
})
```

### 📘Types of tests
1. Unit Tests
   1. Test one piece (usually one function)
2. Integration tests
   1. How multiple units work together
3. Acceptance/ End-to-End (E2E) tests
   1. How a user would interact with the app

### 📘Important things
1. Primary Testing Goal
   1. **Testing behavior (state update), not implementation (function name)**
2. Refactors should not affects tests
   1. Do not want to re-write tests after refactor
   2. Keep in mind when writing tests
3. Features to test
   1. App keeps counter of button click count
   2. Click count is stored in component state
4. Good Test
   1. Set initial State
   2. Simulate clicking button that increments counter
   3. Check to see if counter state was incremented
5. Brittle test
   1. Set initial state
   2. Simulate Clicking a button that increment counter
   3. Check to see if a particular function was called

### 📘Snapshot testing (not majorly use)
* jest includes "snapshot testing"
  * A way to freeze component
  * Test fails if there are any changes

### 📘How to select
**.find(selector) => ShallowWrapper**

Argument : selector(EnzymeSelector) : The selector to match
Return : ShallowWrapper: A new wrapper that wraps the found nodes

1. A valid css Selectors
   1. using class (.foo, .foo-bar)
   2. element syntax (input, div, span, etc)
   3. using Id ( #foo, #foo-bar, etc)
   4. attribute (\[href="foo"], \[type="text"], etc)

2. Combining 
   1. .foo.foo-bar.test
3. using data-test="anyName" (best way)

### 📘Simulate

```js
test("render Button and perform click event", () => {
    // rendering
    let wrapper = setup();

    // selection
    const btn = wrapper.find("button");
    btn.simulate("click");
    wrapper.update();

    expect(wrapper.find(".output").text()).toBe("The count is 1");
})
```

### 📘UnderStand Concept
* Bellow code is error code just use for understanding the concept
```js
/*
expect(....code) is called R.H.S
toBe(...value) is called L.H.S
*/

expect(wrapper.find(".output").text()).toBe(1);
/*Output
  Expected: 1                   its always(L.H.S)
  Received: "The count is 1"    its always(R.H.S and it will get value from virtual DOM)
*/
```