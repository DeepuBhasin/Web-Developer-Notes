===========================****==============================================================================================
@React-Router

- npm install react-router-dom
- Example
	
	import { BrowserRouter, Route, Routes } from 'react-router-dom';

	function App() {
	  return (
	    <BrowserRouter>													// in this component your all routes will handle
	      <div className="App">
	        <Navbar />											
	        <div className='content'>
	          <Routes>													// this component will help to print route	
	            <Route path='/' exact element={<Home />}></Route>		// this will help to print particuler component according to path
	          	<Route path='/create' element={<Create />}></Route>
            	<Route path='/blog/:id' element={<BlogDetails />}></Route>
            	<Route path='*' element={<NotFound />}></Route>			// use astrick to if data not route not found	
	          </Routes>
	        </div>
	      </div>
	    </BrowserRouter>
	  );
	}

	export default App;	

- react match routes from top to bottom in routes component and it will search particular path untill it get match 	

Other parameter 
	
	- exact
	- send extra data in to Object with state property


#link
-----

	import { Link } from "react-router-dom";					// importing link module
	const Navbar = () => {
	    return (
	        <nav className="navbar">
	            <h1>The Dojo Blog</h1>
	            <div className="links">
	                <Link to="/"> Home</Link>					// creating root "/" link
	                <Link to="/create" style={{					// creating create "/create" link
	                    color: 'white',
	                    backgroundColor: '#f1356d'
	                }}>New Blog</Link>
	            </div>
	        </nav>
	    )
	}

	export default Navbar;

#params
-------

	import { useParams } from "react-router-dom";
	const BlogDetails = () => {
	    const { id } = useParams();						// using parameter hook
	    return (
	        <div className="blog-details">
	            <h2>Blog Details : {id}</h2>			// printing value to id
	        </div>
	    )
	}

	export default BlogDetails;

#Programmatically-Navigation
----------------------------
	
	import { useNavigate } from 'react-router-dom' 		

	let navigation = useNavigate();						// getting function Object using useNavigation hook

	navigation('/create');								// pushing to route

=========================================================================================================================
@Reuse of useEffect
	
	const BlogDetails = () => {
    const { id } = useParams();																	// getting the values from Param
    const { data, error, isPending } = useFetch(`http://localhost:8000/blogs/${id}`);			// getting the values using ID

    return (
	        <div className="blog-details">
	            {isPending&& <div>Loading....</div>}
	            {error && <div>{error}</div>}
	            {data && (
	                <article>
	                    <h2>{data.title}</h2>
	                    <p>Written By {data.author}</p>
	                    <div>{data.body}</div>
	                </article>
	            )}
	        </div>
	    )
	}	

=========================================================================================================================
@Controlled Inputs

- input field get sync with state
- input value should be onChange with using key:pair value
- submit the data using onsSubmit data

#best Example
	
	import { useState } from 'react';
const Create = () => {

    const formDefaultValues = {
        title: '',
        body: '',
        author: ''
    };

    const [userData, setUserData] = useState(formDefaultValues);
    const { title, body, author } = userData;
    const handleEvent = (e) => {
        const { name, value } = e.target;
        setUserData({ ...userData, [name]: value });
        console.log(userData);
    }

    const onSubmitEvent = (e) => {
        e.preventDefault();
		console.log(userData);
    }

    return (
        <div className="create">
            <h2>Add New Blog</h2>
            <form onSubmit={onSubmitEvent} method="POST">
                <label>Blog Title</label>
                <input
                    name='title'
                    type="text"
                    required
                    placeholder="Enter Title"
                    value={title}
                    onChange={handleEvent}
                />

                <label>Blog Body</label>
                <textarea
                    name='body'
                    required
                    placeholder="Enter Blog Body"
                    value={body}
                    onChange={handleEvent}
                >
                </textarea>

                <label>Blog Author</label>
                <select
                    name='author'
                    required
                    value={author}
                    onChange={handleEvent}
                >
                    <option value="">Select Author</option>
                    <option value="Dp">Dp</option>
                    <option value="Deepu">Deepu</option>
                    <option value="Deepinder">Deepinder</option>
                </select>

                <button type="submit">Add Blog</button>

            </form>
        </div>
    )
}
export default Create;
	

=========================================================================================================================
@React Context-Api
	
	Context-Api :  
		- Context provides a way to pass data through the component tree without having to pass props down manually at every level.
		- practical application use is configuration of theme
		- Clear & easy way to share state within a components tree, it same like Redux but it is easy then redux and light weight
		- hooks with functional components are easy as compair to with class context

	#steps
		
		- Create the context
		- Provide a context value
		- Consume the context value	
	
	Hooks : Tap into the inner working of react in functional components

	Redux : contextApi + useReducer() hook  


- class based context api
- functional based context api


#Example
--------
	
	#creating context 
	-----------------

	import { createContext, useState } from 'react';
	
	let stateDefaultValue = {									// creating default values
	    isLightTheme: false,
	    light: { syntax: '#555', ui: '#ddd', bg: '#eee' },
	    dark: { syntax: '#ddd', ui: '#333', bg: '#555' },
	}

	export const ThemeContext = createContext({					// creating default values for the context
	    color: stateDefaultValue,
	    setColor: () => null
	});


	const ThemeContextProvider = (props) => {					// creating Provider  for varous components
	    const [color, setColor] = useState(stateDefaultValue);	
	    const value = { color, setColor };						// creating prop value to use in sub-component	
	    return (
	        <ThemeContext.Provider value={value}>				// creating wrapper for child components
	            {props.children}								// printing components what ever we are passing 
	        </ThemeContext.Provider>							
	    )
	}

	export default ThemeContextProvider;


	#Wrapping components
	--------------------

	import Navbar from './component/navbar.component';
	import BookList from './component/booklist.component';
	import ThemeContextProvider from './context/theme.context';
	import ThemeToggleButtom from './component/theme-toggle-button.component'

	function App() {
	  return (
	    <div className="App">
	      <ThemeContextProvider>					// wrapping components
	        <Navbar />								// child component where you want to pass props values
	        <BookList />							// child component where you want to pass props values	
	        <ThemeToggleButtom />
	      </ThemeContextProvider>
	    </div>
	  );
	}

	export default App;


	#calling function 
	-----------------

	import { useContext } from "react"
	import { ThemeContext } from "../context/theme.context"
	const ThemeToggleButtom = () => {
	    const { color, setColor } = useContext(ThemeContext);				// getting the value and function from context using hook
	    const { isLightTheme } = color;										

	    const handleEvent = () => {
	        setColor({ ...color, isLightTheme: !isLightTheme });			// here we are creating new object and Changing pervious values
	    }

	    return (
	        <>
	            <button onClick={handleEvent}>Change Color</button>			// calling that event to change values of context
	        </>
	    )
	}

	export default ThemeToggleButtom;

	#using Context Values
	---------------------

	import { ThemeContext } from './../context/theme.context'
	import { useContext } from 'react'
	const BookList = () => {
	const { color } = useContext(ThemeContext);										// getting value from the context api 
	console.log('yes', color);
	const { isLightTheme, light, dark } = color;									// destructuring context api values
	const theme = isLightTheme ? light : dark;
	console.log('theme', color);
	return (
	    <div className="book-list" style={{ backgroundColor: theme.ui, color: theme.syntax, }} >
	        <ul>
	            <li style={{ backgroundColor: theme.ui }}>the way of kings</li>
	            <li style={{ backgroundColor: theme.ui }}>the name of the wind</li>
	            <li style={{ backgroundColor: theme.ui }}>the final empire</li>
	        </ul>
	    </div>
	);
	}

	export default BookList;

=========================================================================================================================
@Multiple-context-api
	
	const { color1 } = useContext(ThemeContext1);	
	const { color2 } = useContext(ThemeContext2);	
	const { color3 } = useContext(ThemeContext3);	

=========================================================================================================================
@uuid-package
	
- npm i react-uuid
- import uuid from 'react-uuid';
- console.log(uuid());	//			47b928d8-8b13-8944-8326-f923ae113c98

=========================================================================================================================
@Reducers
	
		
				Action 															  Reducer Function

	dispatch({type : 'LIGHT_COLOR', payload})------------------------>			reducer(action, state)
																       		interacts with the state/data	
																       					 |
																       					 |
																       					 |

																       			- check the action.type
																       			- update the state object
																       			- return the state	
																       					 |
																       					 |
																       					 -> Provider value			


#useReducer()

- useReducer is a Hook that is used for state management
- its is an alternative to useState (in useReducer you can maintain states more than 1 state)
- its also allow you to maintain state at global level which is very easy as compair to normal state eg useState
- It allows for custom state logic.
- If you find yourself keeping track of multiple pieces of state that rely on complex logic, useReducer may be useful.

useReducer(<reducer>, <initialState>);

<reducer> means : functions



The reducer function contains your custom state logic and the initialStatecan be a simple value but generally will contain an object.

The useReducer Hook returns the current stateand a dispatchmethod.



#complete Example (Constants + Reduce + ContextApi + Reducer)
-------------------------------------------------------------

#constants.js 
-------------
	
	export const INECRMENT_ACTION = 'INECRMENT_ACTION';
	export const DECREMENT_ACTION = 'DECREMENT_ACTION';
	export const INECRMENT_BY_VALUE_ACTION = 'INECRMENT_BY_VALUE_ACTION';
	export const DECREMENT_BY_VALUE_ACTION = 'DECREMENT_BY_VALUE_ACTION'; 

#reducer.js
-----------
	
	import {
	    INECRMENT_ACTION,
	    DECREMENT_ACTION,
	    INECRMENT_BY_VALUE_ACTION,
	    DECREMENT_BY_VALUE_ACTION
	} from './../constants/index'

	export const initialValue = 0;

	export const reducer = (state, action) => {
	    switch (action.type) {
	        case INECRMENT_ACTION:
	            return state = state + 1;
	        case DECREMENT_ACTION:
	            return state = state - 1;
	        case INECRMENT_BY_VALUE_ACTION:
	            return state = state + action.num;
	        case DECREMENT_BY_VALUE_ACTION:
	            return state = state - action.num;
	        default:
	            return state;
	    }
	}

#context.js
-----------
	
	import { createContext, useReducer } from "react";
	import { initialValue, reducer } from './../reducer/reducer'

	export const CountContext = createContext();

	const Count = (props) => {
	    const [count, dispatch] = useReducer(reducer, initialValue)
	    return (
	        <CountContext.Provider value={{ count, dispatch }}>
	            {props.children}
	        </CountContext.Provider >
	    )
	}

	export default Count;

#show-count.component.js
------------------------
	
	import { useContext } from 'react'
	import { CountContext } from './../context/index'
	const ShowCount = () => {
	    const { count } = useContext(CountContext)
	    return (
	        <h1>Count Value : {count}</h1>
	    )
	}

	export default ShowCount;	

#buttons.component.js
---------------------
	
	import { useContext } from 'react'
	import { CountContext } from './../context/index'
	import {
	    INECRMENT_ACTION,
	    DECREMENT_ACTION,
	    INECRMENT_BY_VALUE_ACTION,
	    DECREMENT_BY_VALUE_ACTION
	} from './../constants/index'
	const Button = () => {
	    const { dispatch } = useContext(CountContext);
	    return (
	        <>
	            <h3>Increment Values</h3>
	            <div>
	                <button onClick={() => dispatch({ type: INECRMENT_ACTION })} >Incerment</button>
	            </div>
	            <div>
	                <button onClick={() => dispatch({ type: DECREMENT_ACTION })} >Decerment</button>
	            </div>
	            <div>
	                <button onClick={() => dispatch({ type: INECRMENT_BY_VALUE_ACTION, num: 5 })} >Incerment By 5</button>
	            </div>
	            <div>
	                <button onClick={() => dispatch({ type: DECREMENT_BY_VALUE_ACTION, num: 5 })} >Decerment By 5</button>
	            </div>

	        </>
	    )
	}

	export default Button;

#App.js
-------
	
	import ShowCount from './component/show-count.component';
	import Button from './component/buttons.component'
	import Count from './context/index'
	function App() {
	  return (
	    <div className="App">
	      <Count>
	        <ShowCount />
	        <Button />
	      </Count>
	    </div>
	  );
	}

	export default App;
	
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

=============================================================================================================================
@debug App

1. Console
2. source
3. React Developer Tool (check states + components)

=============================================================================================================================
@prop Type

	#command
	--------

		npm install prop-types

	
	#App.js
	-------
		
		import Dashboard from './page-layout/dashboard';
		const App = () => {
		  return (
			<Dashboard gender={true} />							// not passing name property 
		  )
		}

		export default App;	

	#Dashboard.js
	-------------

		import PropTypes from 'prop-types';
		const Dashboard = ({ name, gender }) => {
		    return (
		        <h1>Hello World {name} {gender ? 'Male' : 'Female'}</h1>
		    )
		}
		Dashboard.propTypes = {
		    name: PropTypes.string,											
		    gender: PropTypes.bool.isRequired								// define type with required condition
		};

		Dashboard.defaultProps = {
		    name: 'Deepu',													// settinf default value		
		};

		export default Dashboard;	







=========================================================================================================================
$$example : state vs useState

import { useState } from "react";
import "./App.css"
import React from "react";

	const Input = (props) => {
	  const { state, handleEvent } = props;
	  return (
	    <>
	      <div>
	        <label>First Name</label>
	        <input name="firstName" id="firstName" placeholder="Enter First Name" onChange={(e) => handleEvent(e.target)} />
	      </div>
	      <div>
	        <label>Last Name</label>
	        <input name="lastName" id="lastName" placeholder="Enter Last Name" onChange={(e) => handleEvent(e.target)} />
	      </div>
	    </>
	  )
	}

	// class Component
	class App extends React.Component {
	  constructor() {
	    super();
	    this.state = { firstName: '', lastName: '' }
	  }
	  handleEvent = (e) => {
	    this.setState({ [e.name]: e.value })										// it will merage with old value
	  }

	  render() {
	    return (
	      <div className="App">
	        <Input state={this.state} handleEvent={this.handleEvent} />
	      </div>
	    )
	  }
	}

	// function component
		
	const App = () => {
	  const [state, setstate] = useState({ firstName: '', lastName: '' });
	  const handleEvent = (e) => {
	    setstate({ [e.name]: e.value })												// it will replace old value
	  }

	  return (
	    <div className="App">
	      <Input state={state} handleEvent={handleEvent} />
	    </div>
	  )
	}

	export default App;	

=========================================================================================================================
$$example : useState with clean effect


	import { useState, useEffect } from "react";
	import "./App.css"
	import React from "react";

	const MouseEvent = () => {
	  const [countX, setCountX] = useState(0);
	  const [countY, setCountY] = useState(0);

	  const handleEvent = (e) => {
	    console.log('Mouse event');
	    setCountX(e.clientX);
	    setCountY(e.clientY);
	  }

	  useEffect(() => {
	    console.log('Mouse event Bind');
	    window.addEventListener('mousemove', handleEvent);
	    return () => {
	      console.log('Mouse event removed successfully');
	      window.removeEventListener('mousemove', handleEvent);
	    }
	  }, []);

	  return (
	    <div>
	      <h2>X - {countX} : Y - {countY}</h2>
	    </div>
	  )
	}

	const ToggleButton = () => {
	  const [state, setState] = useState(true);

	  const handleEvent = () => {
	    setState(!state);
	  }

	  return (
	    <>
	      <button onClick={handleEvent}>Toogle</button>
	      {state && <MouseEvent />}
	    </>
	  )
	}

	const App = () => {
	  return (
	    <div className="App">
	      <ToggleButton />
	    </div>
	  )
	}

	export default App;	

=========================================================================================================================
$$example : useContext
	
	import { useState, useEffect, createContext, useContext } from "react";
	import "./App.css"
	let initialValue = 0

	let AppContext = createContext({
	  count: initialValue,
	  setCount: null
	});

	let ContextComponent = (props) => {
	  let [count, setCount] = useState(initialValue);

	  let handleEvent = () => {
	    setCount(count + 1)
	  }

	  let AppProvider = AppContext.Provider;

	  return (
	    <AppProvider value={{ count, handleEvent }}>
	      {props.children}
	    </AppProvider>
	  )

	}

	const ShowCount = () => {
	  const { count } = useContext(AppContext);
	  return (
	    <p>
	      count : {count}
	    </p>
	  )
	}

	const Button = () => {
	  const { handleEvent } = useContext(AppContext);

	  return (
	    <p>
	      <button onClick={handleEvent}>incerment</button>
	    </p>
	  )
	}

	const App = () => {
	  return (
	    <div className="App">
	      <ContextComponent>
	        <ShowCount />
	        <Button />
	      </ContextComponent>
	    </div>
	  )
	}

	export default App;

=========================================================================================================================
$$example : useReducer (single and Multiple reducer)

	import { useReducer } from "react";
	import "./App.css"

	// constants
	const INCREMENT_COUNT = 'INCREMENT_COUNT';
	const DECREMENT_COUNT = 'DECREMENT_COUNT';
	const INCREMENT_ITEM = 'INCREMENT_ITEM';
	const DECREMENT_ITEM = 'DECREMENT_ITEM';
	const RESET = 'RESET';


	// Actions Objects
	const increment_count_action = () => {
	  return { type: INCREMENT_COUNT, payload: 1 }
	}
	const decrement_count_action = () => {
	  return { type: DECREMENT_COUNT, payload: 1 }
	}
	const increment_item_action = () => {
	  return { type: INCREMENT_ITEM, payload: 1 }
	}
	const decrement_item_action = () => {
	  return { type: DECREMENT_ITEM, payload: 1 }
	}
	const reset_action = () => {
	  return { type: RESET }
	}


	// initial State
	let initialValue = {
	  count: 0,
	  item: 0
	}

	// Reducers
	const reducer = (state = initialValue, action) => {
	  switch (action.type) {
	    case INCREMENT_COUNT: {
	      return { ...state, count: state.count + action.payload }
	    }
	    case DECREMENT_COUNT: {
	      return { ...state, count: state.count - action.payload }
	    }
	    case INCREMENT_ITEM: {
	      return { ...state, item: state.item + action.payload }
	    }
	    case DECREMENT_ITEM: {
	      return { ...state, item: state.item - action.payload }
	    }
	    case RESET: {
	      return { ...initialValue }
	    }
	    default: {
	      return state;
	    }
	  }
	}

	const App = () => {
	  const [{ count, item }, dispatchOne] = useReducer(reducer, initialValue);				// first reducer
	  const [state, dispatchTwo] = useReducer(reducer, initialValue);						// second reducer
	  return (
	    <div className="App">
	      <div>
	        <p>Count : {count}</p>
	        <p>Item : {item}</p>
	        <div>
	          <button onClick={() => dispatchOne(increment_count_action())}>INCREMENT COUNT</button>
	          <button onClick={() => dispatchOne(decrement_count_action())}>DECREMENT COUNT</button>
	        </div>
	        <div>
	          <button onClick={() => dispatchOne(increment_item_action())}>INCREMENT ITEM</button>
	          <button onClick={() => dispatchOne(decrement_item_action())}>DECREMENT ITEM</button>
	        </div>
	        <div>
	          <button onClick={() => dispatchOne(reset_action())}>RESET</button>
	        </div>
	      </div>
	      <div>
	        <p>Count : {state.count}</p>
	        <p>Item : {state.item}</p>
	        <div>
	          <button onClick={() => dispatchTwo(increment_count_action())}>INCREMENT COUNT</button>
	          <button onClick={() => dispatchTwo(decrement_count_action())}>DECREMENT COUNT</button>
	        </div>
	        <div>
	          <button onClick={() => dispatchTwo(increment_item_action())}>INCREMENT ITEM</button>
	          <button onClick={() => dispatchTwo(decrement_item_action())}>DECREMENT ITEM</button>
	        </div>
	        <div>
	          <button onClick={() => dispatchTwo(reset_action())}>RESET</button>
	        </div>
	      </div>
	    </div>
	  )
	}

	export default App;

=========================================================================================================================
$$example : useReducer + useContext


	import { createContext, useContext, useReducer } from "react";
	import "./App.css"

	// constants
	const INCREMENT_COUNT = 'INCREMENT_COUNT';
	const DECREMENT_COUNT = 'DECREMENT_COUNT';
	const INCREMENT_ITEM = 'INCREMENT_ITEM';
	const DECREMENT_ITEM = 'DECREMENT_ITEM';
	const RESET = 'RESET';


	// Actions Objects
	const increment_count_action = () => {
	  return { type: INCREMENT_COUNT, payload: 1 }
	}
	const decrement_count_action = () => {
	  return { type: DECREMENT_COUNT, payload: 1 }
	}
	const increment_item_action = () => {
	  return { type: INCREMENT_ITEM, payload: 1 }
	}
	const decrement_item_action = () => {
	  return { type: DECREMENT_ITEM, payload: 1 }
	}
	const reset_action = () => {
	  return { type: RESET }
	}


	// initial State
	let initialValue = {
	  count: 0,
	  item: 0
	}

	// Reducers
	const reducer = (state = initialValue, action) => {
	  switch (action.type) {
	    case INCREMENT_COUNT: {
	      return { ...state, count: state.count + action.payload }
	    }
	    case DECREMENT_COUNT: {
	      return { ...state, count: state.count - action.payload }
	    }
	    case INCREMENT_ITEM: {
	      return { ...state, item: state.item + action.payload }
	    }
	    case DECREMENT_ITEM: {
	      return { ...state, item: state.item - action.payload }
	    }
	    case RESET: {
	      return { ...initialValue }
	    }
	    default: {
	      return state;
	    }
	  }
	}
	let AppContext = createContext({
	  count: initialValue,
	  setCount: null
	});

	let ContextComponent = (props) => {
	  const [state, dispatch] = useReducer(reducer, initialValue);

	  let AppProvider = AppContext.Provider;

	  return (
	    <AppProvider value={{ state, dispatch }}>
	      {props.children}
	    </AppProvider>
	  )

	}

	const ShowCount = () => {
	  const { state } = useContext(AppContext);
	  return (
	    <>
	      <p>Count : {state.count}</p>
	      <p>Item : {state.item}</p>
	    </>
	  )
	}

	const Button = () => {
	  const { dispatch } = useContext(AppContext);

	  return (
	    <div>
	      <div>
	        <button onClick={() => dispatch(increment_count_action())}>INCREMENT COUNT</button>
	        <button onClick={() => dispatch(decrement_count_action())}>DECREMENT COUNT</button>
	      </div>
	      <div>
	        <button onClick={() => dispatch(increment_item_action())}>INCREMENT ITEM</button>
	        <button onClick={() => dispatch(decrement_item_action())}>DECREMENT ITEM</button>
	      </div>
	      <div>
	        <button onClick={() => dispatch(reset_action())}>RESET</button>
	      </div>
	    </div>
	  )
	}

	const App = () => {
	  return (
	    <div className="App">
	      <ContextComponent>
	        <ShowCount />
	        <Button />
	      </ContextComponent>
	    </div>
	  )
	}

	export default App;	
=========================================================================================================================
$$example : useRef

	import { useState, useEffect, useRef } from "react";
	import "./App.css"

	const App = () => {
	  const [timer, setTimer] = useState(0);
	  const intervalRef = useRef();		
	  useEffect(() => {
	    intervalRef.current = setInterval(() => {
	      setTimer(prev => prev + 1);
	    }, 1000)
	    return () => {
	      clearInterval(intervalRef.current);
	    };
	  }, []);
	  return (
	    <div className="App">
	      <p>Hook Timer : {timer}</p>
	      <button onClick={() => clearInterval(intervalRef.current)}>Stop</button>
	    </div >
	  )
	}

	export default App;	

 answer -> useRef() working as conatiner which storing immutable value and it do not cause any re-render if the data store get changes & it also remember the store data even after other state variable caused a re-render on this comonent 	

=========================================================================================================================
$$example : custome Hook

 	import { useState, useEffect, useRef } from "react";
	import "./App.css"

	const useCount = (number) => {
	  const [count, setCount] = useState(number);

	  const handleEvent = () => {
	    setCount(count => count + 1);
	  }
	  return [count, handleEvent];
	}

	const CountOne = () => {
	  const [count, handleEvent] = useCount(0);
	  return (
	    <>
	      <p>count : {count}</p>
	      <button onClick={handleEvent}>Count One</button>
	    </>
	  )
	}
	const CountTwo = () => {
	  const [count, handleEvent] = useCount(0);
	  return (
	    <>
	      <p>count : {count}</p>
	      <button onClick={handleEvent}>Count One</button>
	    </>
	  )
	}

	const App = () => {
	  return (
	    <div className="App">
	      <CountOne />
	      <CountTwo />
	    </div>
	  )
	}

	export default App;

=========================================================================================================================
$$example : Parent Child Re-rendering + with obects in useState

import { useState, useEffect, useRef } from "react";
import "./App.css"

let intialValue = { count: 0 };

const useCount = () => {
  const [count, setCount] = useState(intialValue);

  const handleEvent = () => {
    setCount(state => ({ count: state.count + 1 }));
  }
  const reset = () => {
    setCount(intialValue);
  }
  return [count, handleEvent, reset];
}

const CountOne = () => {
  console.log('Child 1');
  const [{ count }, handleEvent, reset] = useCount();
  return (
    <>
      <p>count : {count}</p>
      <button onClick={handleEvent}>Count One</button>
      <button onClick={reset}>Reset One</button>
    </>
  )
}
const CountTwo = () => {
  console.log('Child 2');
  const [{ count }, handleEvent] = useCount();
  return (
    <>
      <p>count : {count}</p>
      <button onClick={handleEvent}>Count One</button>
    </>
  )
}

const App = () => {
  console.log('parent');								// will print only on initialization not on re-render
  return (
    <div className="App">
      <CountOne />
      <CountTwo />
    </div>
  )
}

export default App;	

the component which contain states and it it also include child components, and if state get change then child components also get re-render. Now if state is in a particular child only if state get update then that particular child will re-render but not the parent and the other childs as well.

