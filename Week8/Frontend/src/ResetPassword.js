import React,{Component} from 'react';
import './ResetPassword.css';
import axios from "axios";

class ResetPassword extends Component{

    constructor(props){
        super(props);

        this.state = {
            password: "",
            passwordError: "",
            confirmpassword: "",
            confirmpasswordError: ""       
        }
        // this.getPHP = this.getPHP.bind(this);
        
        this.initialState = {
            password: "",
            passwordError: "", 
            confirmpassword: "",
            confirmpasswordError: "" 
        }
    }

    handlechangeall = (event)=> {
        this.setState ({ [event.target.name]:event.target.value})
    };

    validate = () => {
        let passwordError = "";
        let confirmpasswordError = "";
        if(!this.state.password) {
            passwordError= "Please enter password";
        }
        if(!this.state.confirmpassword) {
            confirmpasswordError= "Please confirm password";
        }
        if(passwordError || confirmpasswordError) {
            this.setState({passwordError},{confirmpasswordError});
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
            // this.getPHP();
            //clear form
            this.setState(this.initialState);
        }
    };

    render (){
        return(
            <div className="resetpassword-container">
                 <form onSubmit={this.handlesubmit}>

                <label> Enter New Password</label><br/>
                <input type="password" name="password" placeholder="Enter Password" value={this.state.password} onChange={this.handlechangeall}/> <br/>
                <div style={{fontSize:16,color:"red"}}>{this.state.passwordError}</div>

                <label> Confirm New Password</label><br/>
                <input type="text" name="confirmpassword" placeholder="Confirm Password" value={this.state.confirmpassword} onChange={this.handlechangeall}/> <br/>
                <div style={{fontSize:16,color:"red"}}>{this.state.confirmpasswordError}</div>

                <input type="submit" name="submit" value="Change"/><br/><br/>
                </form>
            </div>
        )
    }
} 

export default ResetPassword;