import React from "react";
import CustomerService from "./Shared/CustomerService";


class Customer extends React.Component{
    constructor(props) {
        super(props);
        this.state={
            customerList:[]
        }
    }

    componentDidMount() {
        this.getCustomers();
    }

    getCustomers= ()=>{
        CustomerService.getAllCustomer()
            .then((res)=>{

                this.setState({
                    customerList:res.data
                })
            })
            .catch((err)=>{
                console.log(err);
        })
    }

    render() {
        return (
            <div>


            </div>
        )
    }

}

export default Customer;