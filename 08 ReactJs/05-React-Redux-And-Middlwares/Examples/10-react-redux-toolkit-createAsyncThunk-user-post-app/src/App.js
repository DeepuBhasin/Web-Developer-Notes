import { Provider } from 'react-redux';
import './App.css';
import PostsList from './components/PostLists';
import { store } from './redux/store';

function App() {
  return (
    <div className='App'>
      <Provider store={store}>
        <PostsList />
      </Provider>
    </div>
  );
}

export default App;
