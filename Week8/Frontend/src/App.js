import React from 'react';
import './App.css';
import './Menu.css';

import {BrowserRouter, Route, Switch} from 'react-router-dom';
import {Link} from 'react-router-dom';
import Form from './Form';
import Login from './Login';
import Register from './Register';
import ForgotPassword from './ForgotPassword';
import Avatar from './Avatar';

function App() {
  return (
    <BrowserRouter>
    <div>
      <Menu/>
      <Switch>
      <Route path="/" exact component= {Home} />
      <Route path="/about"  component= {About} />
      <Route path="/contact" component= {Contact} />
      <Route path="/login" component= {Login} />
      <Route path="/registration" component= {CreateAccount} />
      <Route path="/forgotpassword" component= {ForgotPassword} />
      <Route path="/avatar"  component= {Avatar} />
      </Switch>
    </div>
    </BrowserRouter>
  );
}

const Menu  = ()=> {
  return (
      <div className="Menustyle">
          <ul>
              <li> <Link to="/"> Login </Link> </li>
              <li> <Link to="/about"> About </Link> </li>
              <li> <Link to="/contact"> Contact </Link> </li>
              <li> <Link to="/avatar"> Avatar </Link> </li>
          </ul>
      </div>
  )
}

const Home= ()=> {
  return (
      <div className="loginstyle">
        <div className="loginheader">
          <h2> Welcome to Login Page </h2>
        </div>
        <Login/>
      </div>
  )
}

const CreateAccount= ()=> {
  return (
      <div className="create-account">
        <Register/>
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
          <div className="form">
          <Form/>
          </div>
      </div>
  )
}

export default App;
