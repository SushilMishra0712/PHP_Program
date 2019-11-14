import React,{Component} from 'react';
import './ForgotPassword.css';
import axios from "axios";

class ForgotPassword extends Component{

    constructor(props){
        super(props);

        this.state = {
            email: "",
            emailError: "",       
        }
        this.getPHP = this.getPHP.bind(this);
        
        this.initialState = {
            email: "",
            emailError: "",
        }
    }

    async getPHP(){
        try {
            let data={}
            data.email=(this.state.email);
            const response = await axios.post('http://localhost:8080/index.php/site/forgot',data);
            console.log('Returned data:', response);
            console.log('data:', response.data.firstname);
            console.log('statuscode', response.data.code);
            if(response.data.code===200)
            {
                alert('Reset password from your email');
            }
            else if(response.data.code===401)
            {
                alert('Email does not exist');
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
        if(!this.state.email.includes("@")) {
            emailError= "Invalid email";
        }
        if(emailError) {
            this.setState({emailError});
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
            <div className="forgetpassword-container">
                 <form onSubmit={this.handlesubmit}>
                <label> Enter Your Email To Reset</label><br/>
                <input type="email" name="email" placeholder="Enter Email" value={this.state.email} onChange={this.handlechangeall}/> <br/>
                <div style={{fontSize:16,color:"red"}}>{this.state.emailError}</div>

                <input type="submit" name="submit" value="Send"/><br/><br/>
                </form>
            </div>
        )
    }
} 

export default ForgotPassword;