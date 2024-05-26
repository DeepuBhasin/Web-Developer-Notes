import * as React from "react"
import { store } from "./redux/redux";
import { Provider } from "react-redux"
import { AddNotes } from "./components/AddNotes"
import { NotesList } from "./components/NotesList";


function App() {
  return (
    <div className="App">
      <Provider store={store}>
        <AddNotes />
        <NotesList />
      </Provider>
    </div>
  );
}

export default App;
