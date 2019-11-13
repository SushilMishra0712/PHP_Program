import React,{Component} from 'react';
import './Login.css';
import {Link} from 'react-router-dom';
import axios from "axios";


class Login extends Component{

    constructor(props){
        super(props);

        this.state = {
            email: "",
            password: "",
            emailError: "",
            passwordError: "",
            loginSuccess: "Login"       
        }
        this.getPHP = this.getPHP.bind(this);
        
        this.initialState = {
            email: "",
            password: "",
            emailError: "",
            passwordError: "",
        }
    }

    async getPHP(){
        try {
            let loginSuccess="";
            let welcome="Welcome ";
            let data={}
            data.email=(this.state.email);
            data.password=(this.state.password);

            const response = await axios.post('http://localhost:8080/index.php?r=site/login',data);
            console.log('Returned data:', response);
            console.log('data:', response.data.firstname);
            console.log('statuscode', response.data.code);
            if(response.data.code===200)
            {
                alert('Login Successful');
                loginSuccess=welcome+response.data.firstname;
                this.setState({loginSuccess});
            }
            else if(response.data.code===401)
            {
                alert('Email and password does not match');
            }
          } catch (e) {
            console.log(`Axios request failed: ${e}`);
          }
    }


    handlechangeall = (event)=> {
        this.setState ({ [event.target.name]:event.target.value})
    };

    validate = () => {
        let emailError = "";
        let passwordError = "";
        if(!this.state.email.includes("@")) {
            emailError= "Invalid email";
        }
        if(!this.state.password) {
            passwordError= "Password cannot be blank";
        }
        if(emailError || passwordError) {
            this.setState({ emailError, passwordError});
            return false;
        }
        return true;
    };

    handlesubmit = (event)=> {
        event.preventDefault();
        const isValid = this.validate();
        if(isValid){
            alert(`Data Sending to Server...`);
            console.log( JSON.stringify(this.state));
            this.getPHP();
            //clear form
            this.setState(this.initialState);
        }
    };

    render (){
        return(
            <div className="login-container">
                <form onSubmit={this.handlesubmit}>
                    <div className="login-header">
                        <h4>{this.state.loginSuccess}</h4>
                    </div>
                    <label> Enter Email </label><br/>
                    <input type="email" name="email" placeholder="Enter Email" value={this.state.email} onChange={this.handlechangeall}/> <br/>
                    <div style={{fontSize:16,color:"red"}}>{this.state.emailError}</div>
                    
                    <label> Enter Password </label><br/>
                    <input type="password" name="password" placeholder="********" value={this.state.password} onChange={this.handlechangeall}/> <br/>
                    <div style={{fontSize:16,color:"red"}}>{this.state.passwordError}</div>
                    
                    <input type="submit" name="submit" value="Submit"/><br/><br/>

                    <Link to="forgotpassword" style={{textDecoration:'none'}}> <label id="forgot-account">Forgotten Account?</label></Link>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <Link to="registration"> <input type="button" value="Create Account" id="registration-button"/><button/></Link><br/><br/>
                </form>
            </div>
        )
    }

}

export default Login;
