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
            phone_number: ""
        }
        this.getPHP = this.getPHP.bind(this);
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
        this.props.history.push('/login');
    }

    handlechangeall = (event)=> {
        this.setState ({ [event.target.name]:event.target.value})
    }
    handlesubmit = (event)=> {
        alert(`Data Sending to the Server`);
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
                    <textarea name="address" placeholder="Enter your address.." value={this.state.message} onChange={this.handlechangeall}></textarea> <br/>

                    <label> Enter Phonenumber </label><br/>
                    <input type="number" name="phone_number" placeholder="Enter phonenumber" value={this.state.phone_number} onChange={this.handlechangeall}/> <br/>

                    <input type="submit" value="Submit" onClick={this.getPHP} /> <br/><br/>
                </form>
            </div>
        )
    }
}

export default Register;