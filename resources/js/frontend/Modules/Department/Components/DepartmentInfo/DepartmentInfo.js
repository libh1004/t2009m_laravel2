import React, {Component} from "react";
import DepartmentService from "../../Shared/DepartmentService";

class DepartmentInfo extends Component{
    constructor(props) {
        super(props);
        this.state={
            departmentId:"",
            editStatus:false,
            departmentName:{
                value:"",
                isValid:true
            },
            departmentCode:{
                value:"",
                isValid:true
            },
            departmentPic:{
                value:"",
                isValid:true
            },
            departmentDesc:{
                value:"",
                isValid:true
            },
            staffs:[]
        }
    }

    componentDidMount() {
        this.getDepartmentInfo();
    }

    getDepartmentInfo =async ()=>{
        let {departmentId,departmentName,departmentCode,departmentPic,departmentDesc,staffs} = this.state;
        await DepartmentService.getAllDepartment()
            .then((res)=>{
                departmentId = res.data.department_id;
                departmentName.value = res.data.department_name;
                departmentCode.value  =res.data.department_code;
                departmentPic.value = res.data.department_pic;
                departmentDesc.value = res.data.department_desc;
                staffs = res.data.staff;

                this.setState({
                    departmentId,departmentName,departmentCode,departmentPic,departmentDesc,staffs
                });
                this.props.getDepartmentId(departmentId);
            })
            .catch((err)=>{
                console.log(err);
            })
    }

    onEditInfo = () =>{
        const editStatus = this.state;
        this.setState({
            editStatus:!this.state.editStatus
        })
    }

    handleChange = (ev) => {

    }

    onSaveInfo = () => {
        let {departmentId,departmentName,departmentCode,departmentPic,departmentDesc};
        const data = {
            department_name : departmentName.value,
            department_code : departmentCode.value,
            department_pic : departmentPic.value,
            department_desc:departmentDesc.value
        }

        DepartmentService.updateDepartment(departmentId,data)
            .then((res) => {
                this.getDepartmentInfo();

            })
            .catch((err)=>{
                console.log(err);
            });
        this.setState({
            editStatus:false
        });
    }

    render() {
        return (
            <div>

            </div>
        )
    }
}
