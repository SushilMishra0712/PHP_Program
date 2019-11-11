import React,{Component} from 'react';
import './Login.css';
import {Link} from 'react-router-dom';


class Login extends Component{

    constructor(props){
        super(props);

        this.state = {
            email: "",
            password: "",
        }
    }

    handlechangeall = (event)=> {
        this.setState ({ [event.target.name]:event.target.value})
    }
    handlesubmit = (event)=> {
        alert(`
        My email id is ${this.state.email}.`
        );
        console.log( JSON.stringify(this.state));
        event.preventDefault();
    }

    render (){
        return(
            <div className="login-container">
                <form onSubmit={this.handlesubmit}>
                    <div className="login-header">
                        <h4>Login</h4>
                    </div>
                    <label> Enter Email </label><br/>
                    <input type="email" name="email" placeholder="Enter Email" value={this.state.email} onChange={this.handlechangeall}/> <br/>

                    <label> Enter Password </label><br/>
                    <input type="password" name="password" placeholder="********" value={this.state.password} onChange={this.handlechangeall}/> <br/>

                    <input type="submit" value="Submit"/><br/><br/>

                    <Link to="forgotpassword" style={{textDecoration:'none'}}> <label id="forgot-account">Forgotten Account?</label></Link>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <Link to="registration"> <input type="button" value="Create Account" id="registration-button"/><button/></Link><br/><br/>
                </form>
            </div>
        )
    }

}

export default Login;
