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
