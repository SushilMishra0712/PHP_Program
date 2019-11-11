import React,{Component} from 'react';

class Form extends Component{

    constructor(props){
        super(props);

        this.state = {
            fullname: "",
            email: "",
            phone: "",
            message: ""
        }
    }

    handlechangeall = (event)=> {
        this.setState ({ [event.target.name]:event.target.value})
    }
    handlesubmit = (event)=> {
        alert(`
        My name is ${this.state.fullname}.
        My email id is ${this.state.email}.
        My mobile number is ${this.state.phone}.
        My Message to your company is ${this.state.message}.`
        );
        console.log( JSON.stringify(this.state));
        event.preventDefault();
    }

    render(){
        return(
            <div>
                <form onSubmit={this.handlesubmit}>
                    <label> Fullname </label><br/>
                    <input type="text" name="fullname" placeholder="Enter fullname" value={this.state.fullname} onChange={this.handlechangeall}/> <br/>

                    <label> Email </label><br/>
                    <input type="email" name="email" placeholder="Enter email" value={this.state.email} onChange={this.handlechangeall}/> <br/>

                    <label> Phonenumber </label><br/>
                    <input type="number" name="phone" placeholder="Enter phonenumber" value={this.state.phone} onChange={this.handlechangeall}/> <br/>

                    <label> Message </label><br/>
                    <textarea name="message" placeholder="Enter your message.." value={this.state.message} onChange={this.handlechangeall}></textarea> <br/>

                    <input type="submit" value="Submit"/>
                </form>
            </div>
        )
    }
}

export default Form;