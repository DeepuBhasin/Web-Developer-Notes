import './App.css';
import {addToCart,removeFromCart} from './redux/action'
import {useDispatch,useSelector} from 'react-redux' 

function App(props) {
  const dispatch = useDispatch();
  const {phone,products} = useSelector(state => state.cartData); 
  let productList = products[0].map((item,index)=>{
    return <li key={item.id}>{item.title }</li>
  })
    return (
    <div className="App">
      <h1>{phone}</h1>
      <button onClick={()=> dispatch(addToCart())}>Add To Cart</button>
      <button onClick={()=> dispatch(removeFromCart())}>Remove from Cart</button>
      <ul>{productList}</ul>
    </div>
  );
}

export default App;
