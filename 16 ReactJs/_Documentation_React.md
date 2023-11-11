=========================================================================================================================
@uuid-package
	
- npm i react-uuid
- import uuid from 'react-uuid';
- console.log(uuid());	//			47b928d8-8b13-8944-8326-f923ae113c98


=========================================================================================================================
@Redux
	
- a layer on-top of react 
- Helps with state management of our app 
	- data in the app 
	- UI state of the app 

	#Redux Building Blocks
	----------------------

		1. Store : Object that holds the entire state of our application.
		2. Reducer : Plain javascript function that handles all the logic when it comes to manipulating the state
		3. Action : javascript object that describes the type of changes we want to make to the state
		4. Action Creator : Function that returns an Action
		5. Dispatch : responsible for sending an action to the reducer to update state.
		6. Provider : component that makes the redux store available to all other components. 


#command
--------
	npm install redux react-redux

	redux 		: its a library for creating store
	react-redux : its create a bridge which allow you to connect redux with react 

#structures
-----------
	
	1. store
	2. constants
	3. actions
	4. reducers
	5. index.js 		// wrap up store


- Example of redux synchrounous
  -----------------------------		

#store.js 
---------
	
	import { createStore } from "redux";
	import { Provider } from "react-redux";
	import rootReducer from "../reducers/index";

	export const store = createStore(rootReducer);
	export default Provider;

#index.js
---------
	
	import Provider, { store } from './redux/store/index'

	const root = ReactDOM.createRoot(document.getElementById('root'));
	root.render(
	  <Provider store={store}>
	    <App />
	  </Provider>
	);
	reportWebVitals();

#constnats.js
-------------

	export const DELETE_POST = 'DELETE_POST';

#action.js
----------	
	
	import { DELETE_POST } from "../constants"

	export const deletePost = (id) => {
	    return {
	        type: DELETE_POST,
	        id: id
	    }
	}


#reducers.js
------------
	
	import { DELETE_POST } from "../constants/index";

	const initialState = {
	    posts: [
	        {
	            "userId": 1,
	            "id": 1,
	            "title": "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
	            "body": "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto"
	        },
	        {
	            "userId": 1,
	            "id": 2,
	            "title": "qui est esse",
	            "body": "est rerum tempore vitae\nsequi sint nihil reprehenderit dolor beatae ea dolores neque\nfugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis\nqui aperiam non debitis possimus qui neque nisi nulla"
	        },
	        {
	            "userId": 1,
	            "id": 3,
	            "title": "ea molestias quasi exercitationem repellat qui ipsa sit aut",
	            "body": "et iusto sed quo iure\nvoluptatem occaecati omnis eligendi aut ad\nvoluptatem doloribus vel accusantium quis pariatur\nmolestiae porro eius odio et labore et velit aut"
	        }
	    ]
	}
	const rootReducer = (state = initialState, action) => {
	    switch (action.type) {
	        case DELETE_POST:
	            {
	                let newPost = state.posts.filter(item => item.id !== action.id);
	                return {
	                    ...state,               // if we add new states in future
	                    posts: newPost
	                }
	            }
	        default:
	            return state;
	    }
	}

	export default rootReducer;

	#Note : actully we did not modify the original state,  instead we just create new object/array then insert new values in that object	

#App.js
-------
	
	import './App.css';
	import { connect } from 'react-redux'
	import { deletePost } from './redux/actions/actions';


	function App(props) {
	  const { posts, deletePost } = props;
	  return (
	    <div className="App">
	      {posts.map(item => {
	        return (
	          <div key={item.id}>
	            <h1 >{item.title}</h1>
	            < p ><button onClick={() => { deletePost(item.id) }}>Delete</button></p>
	          </div>
	        )
	      })
	      }
	    </div>
	  )
	}

	const mapStateToProps = (state, componentProps) => {					// connecting state to current component props
	  return {
	    posts: state.posts
	  }
	}

	const mapDispatchToProps = (dispatch) => {								// connecting state to current methods to props
	  return {
	    deletePost: (id) => dispatch(deletePost(id))
	  }
	}

	export default connect(mapStateToProps, mapDispatchToProps)(App);		// connecting current component with redux using connect method

=========================================================================================================================
@Redux + middleware(thunk) + devtools

#Three principle of Redux 
-------------------------
	
	First Principle : 
	-----------------
		"The state of your whole application is stored in an object tree within a single store" means maintain our application state in a single object which would be managed by the redux store

		example: 	
			{
				post: [],
				loading : true, 
				error  : null
			}

	Second principle : 
	------------------

		"The only way to change the state is to emit an action, an object describing what happened" means to update the state of your app, you need to let redux know about that with an action. 

		example : 
			const fetch_data = () => {
				return { 
					type : 'FETCH_DATA',
					payload : [1,2,3]
				} 
			} 

	Third Principle :
	-----------------
		"To specify how the state tree is transformed by actions, you write pure reducers" means 

		example : 

			let initialValue = {
				post : []
			};

			const reducer = (state = initialValue, action) => {
				switch(action.type) {
					case 'FETCH_DATA' : {
						return 	 {
							...state,
							post : action.payload 
						}
					}
				}
			}

	#Redux Store
	------------

		1. Holds application state				
		2. Allows access to state via getState();
		3. Allows state to updated via dispatch(action)


#Three principle Overview


		dispatch 															new State
	UI ----------> Action Object --------> Middleware ---------> Reducer --------------> Store-----------
	^																^									|
	|	current state 												|		current State				|
	-----------------------------------------------------------------------------------------------------		


	Middleware : its just a function which returns a function	

		const myLogger1 = (store) => {
		    return next => {
		        return (action) => {
		            console.log('second middle');
		            return next(action);
		        }
		    }
		}	

	Why is fetchposts not working 
	1. Action creators can only return plain javascript objects with a type property
	2. The action will get sent to the reducer before the data is fetched from the Api		

	solution : thunk 

	#command 
		npm install redux react-redux
		npm install redux-thunk	 
		npm install axios
		npm install redux-devtools-extension
		npm i --save redux-logger

	#Loading & Error Handling
		1. Make use of the Request/success/failure pattern to handle loading and error state
		2. Separate action for Request, Success and Failure	


#Example
	
#constants.js 
-------------
	
	export const FETCH_DATA = 'FETCH_DATA';
	export const DELETE_DATA = 'DELETE_DATA';

	export const FETCH_POSTS_REQUEST = 'FETCH_POSTS_REQUEST';
	export const FETCH_POSTS_SUCCESS = 'FETCH_POSTS_SUCCESS';
	export const FETCH_POSTS_FAILUER = 'FETCH_POSTS_FAILUER';

#actions.js 
-----------
	
	import axios from "axios"
	import { DELETE_DATA, FETCH_POSTS_FAILUER, FETCH_POSTS_REQUEST, FETCH_POSTS_SUCCESS, } from './contanst.js'

	export const FETCH_DATA_ACTION = () => {
	    return async (dispatch, getState) => {				// here you will getting dispatch method and getState object form thunk
	        dispatch({ type: FETCH_POSTS_REQUEST, payload: [] })

	        try {
	            const responseData = await axios.get('https://jsonplaceholder.typicode.com/posts');
	            dispatch({ type: FETCH_POSTS_SUCCESS, payload: responseData.data });
	        }
	        catch (error) {
	            dispatch({ type: FETCH_POSTS_FAILUER, error: error });
	        }

	    }
	}

	export const DELETE_DATA_ACTION = () => {
	    return {
	        type: DELETE_DATA,
	        payload: []
	    }
	}	

#reducers.js 
------------
	
	import { DELETE_DATA, FETCH_DATA, FETCH_POSTS_REQUEST, FETCH_POSTS_SUCCESS, FETCH_POSTS_FAILUER } from "./contanst"

	const initialState = {
	    post: [],
	    loading: false,
	    error: null
	}

	const reducer = (state = initialState, action) => {
	    switch (action.type) {
	        case FETCH_POSTS_REQUEST: {
	            return { ...state, loading: true, error: null }
	        }
	        case FETCH_POSTS_SUCCESS: {
	            return { ...state, loading: false, post: action.payload, error: null }
	        }
	        case FETCH_POSTS_FAILUER: {
	            return { ...state, loading: false, error: action.error }
	        }
	        case FETCH_DATA: {
	            return { ...state, loading: false, post: action.payload, error: null }
	        }
	        case DELETE_DATA: {
	            return { ...state, loading: false, post: action.payload, error: null }
	        }
	        default: {
	            return state;
	        }
	    }
	}

	export default reducer;

#store.js
---------
	
	import { applyMiddleware, createStore } from "redux";
	import { composeWithDevTools } from 'redux-devtools-extension'
	import reducers from './reducers.js'
	import thunk from "redux-thunk";
	import logger from "redux-logger";
	const store = createStore(reducers, composeWithDevTools(applyMiddleware(thunk, logger)));
	export default store;		

#index.js
---------
	
	import store from './redux/store';
	import { Provider } from 'react-redux';

	const root = ReactDOM.createRoot(document.getElementById('root'));
	root.render(
	  <Provider store={store}>
	    <App />
	  </Provider>
	);
	

#app.js
-------
	
	import "./App.css"
	import { useDispatch, useSelector } from "react-redux";
	import { DELETE_DATA_ACTION, FETCH_DATA_ACTION } from "./redux/actions.js";
	const App = () => {
	  const state = useSelector(state => state);
	  const dispatch = useDispatch();
	  let data = state.post.map(item => {
	    return <tr key={item.id}>
	      <td>{item.id}</td>
	      <td>{item.title}</td>
	    </tr>
	  })


	  return (
	    <div className="App">
	      <button onClick={() => dispatch(FETCH_DATA_ACTION())}>Fetch Data</button>
	      <button onClick={() => dispatch(DELETE_DATA_ACTION())}>Delete Data</button>
	      <table border="2" cellPadding="2" cellSpacing="3" style={{ textAlign: 'center' }}>
	        <thead>
	          <tr>
	            <th>Id</th>
	            <th>title</th>
	          </tr>
	        </thead>
	        <tbody>
	          {data}
	        </tbody>
	      </table>
	    </div>
	  )
	}

	export default App;

=========================================================================================================================
@forwardRef
	
	- passing reference to child 
		
	App.js
	------

		import './App.css';
		import React from "react";
		import InputComponent from './InputComponent';

		class App extends React.Component {
		  constructor() {
		    super();
		    this.inputRef = React.createRef(null);
		  }

		  getFocus = () => {
		    this.inputRef.current.focus();
		  }

		  setValue = () => {
		    this.inputRef.current.value = "1000";
		  }

		  render() {
		    return (
		      <div className='App'>
		        <InputComponent ref={this.inputRef} />
		        <br />
		        <button onClick={this.getFocus}>Get Focus</button>
		        <button onClick={this.setValue}>Set Value</button>
		      </div>
		    )
		  }
		}

		export default App;

	InputComponent.js
	-----------------

		import { forwardRef } from "react";

		const InputComponent = (props, refs) => {
		    return (
		        <input type="text" name="firstName" id="firstName" placeholder="Enter First Name" ref={refs} />
		    )
		}

		export default forwardRef(InputComponent);	
	
=========================================================================================================================
@useRef
	
	1. use to acces DOM node directly in React like document.querySelectory()
	2. try to aviod as mush you can beacuse its update real dom directly not the virtual dom which is quite expensive

	#Application use
	----------------

		1. focus 						// current.focus()
		2. fetch value from input 		// current.value	

	#Step
	-----

		1. Create element
		2. attach that variable to element

	#functional component
	---------------------	

	import './App.css'
	import { useEffect, useRef } from "react";

	const App = () => {
	  let inputRef = useRef(null);
	  useEffect(() => {
	    inputRef.current.focus();
	  })
	  return (
	    <div className="App">
	      <input type="" name='firstName' placeholder='EnterName' ref={inputRef} />
	    </div>
	  )
	}

	export default App;


	#Class component
	----------------

		import './App.css';
		import React from "react";

		class App extends React.Component {
		  constructor() {
		    super();
		    this.inputRef = React.createRef();
		  }

		  componentDidMount() {
		    this.inputRef.current.focus();
		  }

		  render() {
		    return (
		      <div className='App'>
		        <input type="text" ref={this.inputRef} />
		      </div>
		    )
		  }
		}

		export default App;

=========================================================================================================================
@portal
	
	- use for model
	
=========================================================================================================================
@Higher Order Function + HOF with Paramter + HOF with props

	- to share common functionality between components
	- HOC is a pattern where a function takes a component as an argument and returns a new component.
	- HOC use in Router, Connect on Redux, Material ui
	- Main concept of HOC is closuer

	const NewComponent = HigherOrderComponent(originalComponent)

	higherOrder.js
	--------------

		import React from "react"
		const HigherOrder = (OrginalComponent, incrementParamter) => {
		    class NewComponent extends React.Component {
		        constructor() {
		            super();
		            this.state = {
		                count: 0
		            }
		        }

		        increment = () => {
		            this.setState(state => (
		                { count: state.count + incrementParamter }
		            ))
		        }

		        render() {
		            return <OrginalComponent 
		            count={this.state.count} 
		            handleEvent={this.increment} 
		            {...this.props} 					// passing downs props from parent beacuse we have wrapper of HOC
		            />
		        }
		    }
		    return NewComponent;
		}

		export default HigherOrder;


	
	ButtonOne.js
	------------

		import HigherOrder from "./higherOrder";

		const ColorButton = (props) => {
		    const styleBackground = {
		        height: '150px',
		        width: '300px',
		        background: 'grey',
		        textAlign: 'center',
		        margin: '10px auto',
		        padding: "2px",
		        boxSizing: 'border-box',
		        borderRadius: '5px',
		        boxShadow: '5px 5px 5px #746',
		        color: '#fff'
		    }

		    return (
		        <div style={styleBackground}>
		            {props.children}
		        </div>
		    )
		}

		const ButtonOne = (props) => {
		    const { count, handleEvent, name } = props;
		    console.log(props);
		    return (
		        <ColorButton>
		            <div>
		                <p>{name}</p>										// printing props which are getting from parent
		                <p>count : {count}</p>
		                <button onClick={handleEvent}>increment From Button 1</button>
		            </div>
		        </ColorButton>
		    )
		}

		export default HigherOrder(ButtonOne, 5);

	ButtonTwo.js
	------------

		import HigherOrder from "./higherOrder";
		const ButtonTwo = (props) => {
		    const { count, handleEvent, name } = props;
		    return (
		        <div>
		            <p>{name}</p>											// printing props which are getting from parent
		            <p>count : {count}</p>
		            <button onClick={handleEvent}>increment From Button 2</button>
		        </div>
		    )
		}

		export default HigherOrder(ButtonTwo, 10);

	App.js
	------

		import "./App.css"
		import ButtonOne from "./ButtonOne";
		import ButtonTwo from "./ButtonTwo";
		const App = () => {
		  return (
		    <div className="App">
		      <ButtonOne name="Incerment by 5" />				// passing props down to children
		      <ButtonTwo name="Incerment by 10" />					// passing props down to children
		    </div>
		  )
		}

		export default App;

=========================================================================================================================
@Render Props
	
- The term "render prop" refers to a technique for "sharing code" between React component using a "prop whose value is a function"
- Main concept is using state lift concept
	
	#renderProps.js
	---------------

		import React from "react"

		class NewComponent extends React.Component {
		    constructor() {
		        super();
		        this.state = {
		            count: 0
		        }
		    }

		    increment = () => {
		        this.setState(state => (
		            { count: state.count + 1 }
		        ))
		    }

		    render() {
		        return (
		            <div>{this.props.render(this.state.count, this.increment)}</div>
		        )
		    }
		}

		export default NewComponent;

	#ButtonOne.js
	-------------
		
		const ButtonOne = (props) => {
		    const { count, handleEvent, name } = props;
		    return (
		        <div>
		            <p>{name}</p>
		            <p>count : {count}</p>
		            <button onClick={handleEvent}>increment From Button 1</button>
		        </div>
		    )
		}

		export default ButtonOne;

	#ButtonTwo.js
	-------------

		const ButtonTwo = (props) => {
	    const { count, handleEvent, name } = props;
	    return (
		        <div>
		            <p>{name}</p>
		            <p>count : {count}</p>
		            <button onClick={handleEvent}>increment From Button 2</button>
		        </div>
		    )
		}

		export default ButtonTwo;	

	#App.js
	-------

		import "./App.css"
		import ButtonOne from "./ButtonOne";
		import ButtonTwo from "./ButtonTwo";
		import RenderProps from './renderProps.js'
		const App = () => {
		  return (
		    <div className="App">
		      <RenderProps render={(count, Incerment) => <ButtonOne count={count} handleEvent={Incerment} name="Deepinder Singh" />} />
		      <RenderProps render={(count, Incerment) => <ButtonOne count={count} handleEvent={Incerment} name="Deepu Bhasin" />} />
		    </div>
		  )
		}

		export default App;		

=========================================================================================================================
@useCallback + React.memo (same as pure component)
	
	1. The React useCallback Hook returns a memoized callback function.
	2. Think of memoization as caching a value so that it does not need to be recalculated.
	3. This allows us to isolate resource intensive functions so that they will not automatically run on every render.
	4. The useCallback Hook only runs when one of its dependencies update.
	5. This can improve performance.
	6. The useCallback and useMemo Hooks are similar. The main difference is that useMemo returns a memoized value and 
	useCallback returns a memoized function

	
	#React.memo help to prevent from re-rendering of component if state does not get change its not a hook its a feature

	Synatx
	------
		
		export default React.memo(componentName);

	problem : when we passing function object 
	-------

		suppose we create button component and we use it 2 times with passing two different functions eg : function1 and function2 
		from parent to child & then we click on one button the second button will re-render automatically beacuse every time 
		function create new reference when ever parent comonent re-render due to state change, so when ever we are dealing with 
		function we always have to concider reference equality even though two functions have the exact same behaviour it does not 
		means they are equal to each other so the function before re-render is different to the function after the rerender and 
		so the function is props "react.memo" sees that the props has changed and will not prevent the re-render so when click
		on first button new reference is created for other button and vice-versa sooo we can tell to react that don't create new 
		function for second button when we click on first button

	solution
	--------
		 useCallback hook 

		 #What?

		 	useCallback is a hook that will return a memoized(cache) version of the callback function that only changes if one of the
		 	dependencies has changed

		 #why?

		 	It is usefull when passing callbacks to optimized child components that rely on reference equality to prevent unneccessary 
		 	renders	

		 #how

		 	const handleEvent = () => useCallback(() => {
		 		setState(count => count + 1);
		 	},[count])	

		
#button.js 
----------
	
	import React from "react";
	const Button = (props) => {
	    console.log(props.children + 'Button Component');
	    let handleEvent = props.handleEvent;
	    let children = props.children
	    return (
	        <button onClick={handleEvent}>{children}</button>
	    )
	}

	export default React.memo(Button);

#count.js
---------
	
	import React from "react";
	const Count = ({ text, age }) => {
	    console.log(text + ' component');
	    return (
	        <div> {text} : {age}</div>
	    )
	}
	export default React.memo(Count);

#app.js
	
	import './App.css'
	import Button from './component/button';
	import Count from './component/count';
	import Title from './component/title';
	import { useCallback, useState } from 'react'


	const App = () => {
	  const [age, setage] = useState(0);
	  const [salary, setSalary] = useState(100);

	  const incerementAge = useCallback(() => {
	    setage((age) => age + 1);
	  }, [age])

	  const incerementSalary = useCallback(() => {
	    setSalary((salary) => salary + 1000);
	  }, [salary]);
	  console.log('----------------x-----------------------');
	  return (
	    <div className='App'>
	      <Title />
	      <Count text='Age' age={age} />
	      <Button handleEvent={incerementAge}> Increment Age </Button>
	      <Count text='Salary' age={salary} />
	      <Button handleEvent={incerementSalary}> Increment Salary </Button>
		</div>
	  )
	}

	export default App;				 	

=========================================================================================================================
@useMemo
	
	1. The React useMemo Hook returns a memoized value.
	2. Think of memoization as caching a value so that it does not need to be recalculated.
	3. The useMemo Hook only runs when one of its dependencies update.
	4. This can improve performance.
	5. The useMemo and useCallback Hooks are similar. The main difference is that useMemo returns a memoized value and useCallback returns a memoized function. 	

#example: 
---------

	import './App.css'
	import { useMemo, useState } from 'react'
	const App = () => {
	  const [count, setCount] = useState(0);
	  const [item, setItem] = useState(10);

	  const isEven = useMemo(() => {
	    console.log('called is even function');
	    let i = 0;
	    while (i < 2000000000) i++;
	    return count % 2 === 0;
	  }, [count])

	return (
	    <div className='App'>
	      <div><button onClick={() => setCount((count) => count + 1)}>Count - {count}</button></div>
	      <span>{isEven ? 'Even' : 'Odd'}</span>
	      <div><button onClick={() => setItem((item) => item + 1)}>Item - {item}</button></div>
	    </div>
	  )
	}

	export default App;