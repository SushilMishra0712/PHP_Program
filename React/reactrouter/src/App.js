import React from 'react';
import logo from './logo.svg';
import './App.css';
import './Menu.css';
import {BrowserRouter, Route, Switch} from 'react-router-dom';
import {Link} from 'react-router-dom';

function App() {
  return (
    <BrowserRouter>
    <div>
      <Menu/>
      <Switch>
      <Route path="/" exact component= {Home} />
      <Route path="/about"  component= {About} />
      <Route path="/contact" component= {Contact} />
      </Switch>
    </div>
    </BrowserRouter>
  );
}

const Menu  = ()=> {
  return (
      <div className="Menustyle">
          <ul>
              <li> <Link to="/"> Home </Link> </li>
              <li> <Link to="/about"> About </Link> </li>
              <li> <Link to="/contact"> Contact </Link> </li>
          </ul>
      </div>
  )
}

const Home= ()=> {
  return (
      <div className="homestyle">
          <h2> Welcome to Home Page. </h2>
      </div>
  )
}

const About= ()=> {
  return (
      <div className="aboutstyle">
          <h2> Welcome to AboutUs Page. </h2>
      </div>
  )
}

const Contact= ()=> {
  return (
      <div className="contactstyle">
          <h2> Welcome to Contact Page. </h2>
      </div>
  )
}

export default App;
