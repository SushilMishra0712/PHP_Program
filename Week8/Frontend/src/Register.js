import React,{Component} from 'react';
import './Register.css';
import axios from "axios";

class Register extends Component{
    constructor(props){
        super(props);

        this.state = {
            firstname: "",
            lastname: "",
            email: "",
            password: "",
            age: "",
            address: "",
            phone_number: "",
            firstnameError: "",
            lastnameError: "",
            emailError: "",
            passwordError: "",
            ageError: "",
            addressError: "",
            phone_numberError: ""
        }
        this.getPHP = this.getPHP.bind(this);

        this.initialState = {
            firstname: "",
            lastname: "",
            email: "",
            password: "",
            age: "",
            address: "",
            phone_number: "",
            firstnameError: "",
            lastnameError: "",
            emailError: "",
            passwordError: "",
            ageError: "",
            addressError: "",
            phone_numberError: "",
        }
    }

    async getPHP(){
        try {
            let data={}
            data.firstname=(this.state.firstname);
            data.lastname=(this.state.lastname);
            data.email=(this.state.email);
            data.password=(this.state.password);
            data.age=(this.state.age);
            data.address=(this.state.address);
            data.phone_number=(this.state.phone_number);

            const response = await axios.post('http://localhost:8080/index.php?r=site/register',data);
            console.log('Returned data:', response);
            console.log('data:', response.data.firstname);
            console.log('statuscode', response.data.code);
            if(response.data.code===200)
            {
                alert('Register Successful..\nPlease Login to Continue');
                this.sendRedirect();
            }
            else if(response.data.code===401 || response.data.code===500)
            {
                alert('Something went wrong');
            }
          } catch (e) {
            console.log(`Axios request failed: ${e}`);
          }
    }

    sendRedirect = ()=>{
        this.props.history.push('/');
    };

    handlechangeall = (event)=> {
        this.setState ({ [event.target.name]:event.target.value})
    };

    validate = () => {
        let firstnameError = "";
        let lastnameError = "";
        let emailError = "";
        let passwordError = "";
        let ageError = "";
        let addressError = "";
        let phone_numberError = "";
        if(!this.state.firstname) {
            firstnameError= "firstname cannot be blank";
        }
        else if(!this.state.firstname.match(/^[a-zA-Z]+$/)) {
            firstnameError= "firstname should be string";
        }
        if(!this.state.lastname) {
            lastnameError= "lastname cannot be blank";
        }
        else if(!this.state.lastname.match(/^[a-zA-Z]+$/)) {
            lastnameError= "lastname should be string";
        }
        if(!this.state.email.includes("@")) {
            emailError= "invalid email";
        }
        if(!this.state.password) {
            passwordError= "password cannot be blank";
        }
        if(!this.state.age) {
            ageError= "please enter your age";
        }
        if(!this.state.address) {
            addressError= "please enter address";
        }
        if(!this.state.phone_number) {
            phone_numberError= "enter your phone number";
        }
        if(firstnameError || lastnameError || emailError || passwordError || ageError || addressError || phone_numberError){
            this.setState({firstnameError,lastnameError,emailError,passwordError,ageError,addressError,phone_numberError});
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
            <div className="registration-container">
                <form onSubmit={this.handlesubmit}>
                    <label> Enter firstname </label><br/>
                    <div style={{fontSize:16,color:"red"}}>{this.state.firstnameError}</div>
                    <input type="text" name="firstname" placeholder="Enter firstname" value={this.state.firstname} onChange={this.handlechangeall}/> <br/>
                    
                    <label> Enter lastname </label><br/>
                    <div style={{fontSize:16,color:"red"}}>{this.state.lastnameError}</div>
                    <input type="text" name="lastname" placeholder="Enter lastname" value={this.state.lastname} onChange={this.handlechangeall}/> <br/>

                    <label> Enter Email </label><br/>
                    <div style={{fontSize:16,color:"red"}}>{this.state.emailError}</div>
                    <input type="email" name="email" placeholder="Enter Email" value={this.state.email} onChange={this.handlechangeall}/> <br/>

                    <label> Enter Password </label><br/>
                    <div style={{fontSize:16,color:"red"}}>{this.state.passwordError}</div>
                    <input type="password" name="password" placeholder="********" value={this.state.password} onChange={this.handlechangeall}/> <br/>

                    <label> Enter Age </label><br/>
                    <div style={{fontSize:16,color:"red"}}>{this.state.ageError}</div>
                    <input type="number" name="age" placeholder="Enter Age" value={this.state.age} onChange={this.handlechangeall}/> <br/>
                    
                    <label> Enter Address </label><br/>
                    <div style={{fontSize:16,color:"red"}}>{this.state.addressError}</div>
                    <textarea name="address" placeholder="Enter your address.." value={this.state.message} onChange={this.handlechangeall}></textarea> <br/>

                    <label> Enter Phonenumber </label><br/>
                    <div style={{fontSize:16,color:"red"}}>{this.state.phone_numberError}</div>
                    <input type="number" name="phone_number" placeholder="Enter phonenumber" value={this.state.phone_number} onChange={this.handlechangeall}/> <br/>

                    <input type="submit" value="Submit"/> <br/><br/>
                </form>
            </div>
        )
    }
}

export default Register;