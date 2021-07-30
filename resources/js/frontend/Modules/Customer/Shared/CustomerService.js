import {BASE_URL} from "../../../Constances/constances";
import axios from "axios";

const API_POINT = {
    GET_ALL_CUSTOMER: "",
    GET_ONE_CUSTOMER: "",
    UPDATE_CUSTOMER: ""
};

class CustomerService{
    constructor() {
    }

    async getAllCustomer(){
        return await axios.get(BASE_URL+API_POINT.GET_ALL_CUSTOMER);
    }

    async getOneCustomer(customerId){
        return await axios.get(BASE_URL+API_POINT.GET_ONE_CUSTOMER+customerId);
    }

    async updateCustomer(customerId,data){
        return await axios.put(BASE_URL+API_POINT.UPDATE_CUSTOMER+customerId,data);
    }
}

const instance = new CustomerService();
export default instance;