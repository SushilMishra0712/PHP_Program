import React,{Component} from 'react';
import './Register.css';

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
            phonenumber: ""
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
            <div className="registration-container">
                <form onSubmit={this.handlesubmit}>
                    <label> Enter firstname </label><br/>
                    <input type="text" name="firstname" placeholder="Enter firstname" value={this.state.firstname} onChange={this.handlechangeall}/> <br/>
                    
                    <label> Enter lastname </label><br/>
                    <input type="text" name="lastname" placeholder="Enter lastname" value={this.state.lastname} onChange={this.handlechangeall}/> <br/>

                    <label> Enter Email </label><br/>
                    <input type="email" name="email" placeholder="Enter Email" value={this.state.email} onChange={this.handlechangeall}/> <br/>

                    <label> Enter Password </label><br/>
                    <input type="password" name="password" placeholder="********" value={this.state.password} onChange={this.handlechangeall}/> <br/>

                    <label> Enter Age </label><br/>
                    <input type="number" name="age" placeholder="Enter Age" value={this.state.age} onChange={this.handlechangeall}/> <br/>
                    
                    <label> Enter Address </label><br/>
                    <textarea name="address" name="address" placeholder="Enter your address.." value={this.state.message} onChange={this.handlechangeall}></textarea> <br/>

                    <label> Enter Phonenumber </label><br/>
                    <input type="number" name="phonenumber" placeholder="Enter phonenumber" value={this.state.phonenumber} onChange={this.handlechangeall}/> <br/>

                    <input type="submit" value="Submit"/><br/><br/>
                </form>
            </div>
        )
    }
}

export default Register;