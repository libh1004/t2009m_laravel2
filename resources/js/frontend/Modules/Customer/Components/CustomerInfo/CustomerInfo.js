import React, {Component} from "react";
import axios from "axios";
class CustomerInfo extends Component{
    constructor(props) {
        super(props);
        this.state={
            form:{
                customer_name:"",
                customer_email:"",
                customer_phone:"",
                customer_address:""
            }

        }
    }

    render(){
        return (
            <div>

            </div>
        )
    }
}