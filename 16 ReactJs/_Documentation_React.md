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
