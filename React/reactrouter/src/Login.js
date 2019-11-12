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
        }
        this.getPHP = this.getPHP.bind(this);   
    }

    async getPHP(){
        try {
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
    }
    handlesubmit = (event)=> {
        alert(`
        Data Sending to Server...`
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

                    <input type="submit" name="submit" onClick={this.getPHP} value="Submit"/><br/><br/>

                    <Link to="forgotpassword" style={{textDecoration:'none'}}> <label id="forgot-account">Forgotten Account?</label></Link>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <Link to="registration"> <input type="button" value="Create Account" id="registration-button"/><button/></Link><br/><br/>
                </form>
            </div>
        )
    }

}

export default Login;
