import './App.css';
import Radium from 'radium';
import Person from './Components/Person/Person.js'

function App() {
  return (
    <div className="App">
      <Person />
    </div>
  );
}

export default Radium(App);
