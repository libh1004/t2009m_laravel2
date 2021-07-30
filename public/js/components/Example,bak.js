
import React from "react";
import ReactDOM from "react-dom";
function ExampleBak(){
    const [products, setProducts] = useState([]);
    const getAllProduct = ()=>{
        fetch("/all-product").then(rs=>rs.json()).then(rs=>{
            setProducts(rs);
        })
    }
    useEffect(()=>{
        getAllProduct();

    },[]);
    return (
        <div>

        </div>
    )
}
