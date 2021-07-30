import React from "react";
import ReactDOM from "react-dom";
class Example extends React.Component{
    constructor(props) {
        super(props);
        this.state = {
            products : []
        }
    }

    componentDidMount() {
        fetch("/all-product").then(rs=>rs.json()).then(rs=>{
            this.setState({
                products : rs
            })
        })
    }

    render() {
        const products = this.state.products;
        return(
            <div>
                <ul>
                    {products.map((e,k)=>{
                        return <li key={k}>{e.name}</li>
                    })}
                </ul>
            </div>
        );
    }

}
export default Example;
if(document.getElementById('example')){
    ReactDOM.render(<Example />,document.getElementById('example'));
}