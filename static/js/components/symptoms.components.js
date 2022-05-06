import React, {useState, useEffect} from 'react';
import axios from "axios";
import {Button, Form, Container, Modal } from 'react-bootstrap'
import Symptom from './single-symptom.component';

const Symptoms = () => {
    const [symptoms, setSymptoms] = useState([])
    const [refreshData, setRefreshData] = useState(false)

    //gets run at initial loadup
    useEffect(() => {
        getAllSymptoms();
    }, [])

    //refreshes the page
    if(refreshData){
        setRefreshData(false);
        getAllOrders();
    }

    return (
        <div>
            <Container>
                {symptoms != null && symptoms.map((symptom, i) => (
                    <Symptom patientData={symptom} />
                ))}
            </Container>
        </div>
    )

    //gets all the patient data
    function getAllSymptoms(){
        var url = "http://localhost:3000/patient"
        axios.get(url, {
            responseType: 'json'
        }).then(response => {
            if(response.status == 200){
                setSymptoms(response.data)
            }
        })
    }

}
export default Symptoms