import React,{Component} from 'react';
import './Avatar.css';
import Avatarlist from './Avatarlist';
import 'tachyons';

class Avatar extends Component
{
    constructor(){
        super();
        this.state = {
            name : "Welcome to Avatar World"
        }
    }

    nameChange(){
        this.setState({
            name : "Hello This is New Avatar"
        })
        
    }

    render(){

        const avatarlistarray = [
            {
                id:1,
                name:"Sonu",
                work:"Web developer"
            },
            {
                id:2,
                name:"Dipak",
                work:"Web developer"
            },
            {
                id:3,
                name:"Rahul",
                work:"Web developer"
            },
            {
                id:4,
                name:"Rohit",
                work:"Web developer"
            }
        ]
    
        const array_avatarcard = avatarlistarray.map( (avatarcard,i) => {
            return <Avatarlist id={avatarlistarray[i].name}
                                name={avatarlistarray[i].name}
                                work={avatarlistarray[i].work} />
        })

        return (
            <div className="mainpage">
                <h1 id="welcome"> {this.state.name} </h1>
                    {array_avatarcard}
                <br></br><button id="submit" onClick= { ()=> this.nameChange() }> Submit </button>
            </div>
        )
    }  
}



    //By using function
// const Avatar = (props)=> {

//     const avatarlistarray = [
//         {
//             id:1,
//             name:"Sonu",
//             work:"Web developer"
//         },
//         {
//             id:2,
//             name:"Dipak",
//             work:"Web developer"
//         },
//         {
//             id:3,
//             name:"Rahul",
//             work:"Web developer"
//         },
//         {
//             id:4,
//             name:"Rohit",
//             work:"Web developer"
//         }
//     ]

//     const array_avatarcard = avatarlistarray.map( (avatarcard,i) => {
//         return <Avatarlist id={avatarlistarray[i].name}
//                             name={avatarlistarray[i].name}
//                             work={avatarlistarray[i].work} />
//     })

//     return (
//         <div>
//             <h1 id="welcome"> Welcome to Avatar World </h1>
//                 {array_avatarcard}
//             <br></br><button id="submit"> Submit </button>
//         </div>
//     )
// }

export default Avatar;