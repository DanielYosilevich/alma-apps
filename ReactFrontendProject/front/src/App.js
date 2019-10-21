import React from 'react';
import NavBar from './components/NavBar'
import routes from './routes'

function App() {
  return (
    <div className="App">
      <header>
        <NavBar />
      </header>
      <main>
        {/* Learn React */}
        {routes}
      </main>
    </div>
  );
}

export default App;
