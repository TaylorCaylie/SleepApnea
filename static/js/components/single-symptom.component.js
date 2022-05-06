import React, {useState, useEffect} from 'react';
import 'bootstrap/dist/css/bootstrap.css';
import {Button, Card, Row, Col} from 'react-bootstrap'


const Symptom = ({patientData}) => {
    return (
        <Card>
            <Row>
                <Col>Date:{ patientData !== undefined && patientData.date}</Col>
                <Col>Time:{ patientData !== undefined && patientData.time}</Col>
                <Col>AutoDetected:{ patientData !== undefined && patientData.auto}</Col>
                <Col>HeartRate: ${patientData !== undefined && patientData.heartrate}</Col>
            </Row>
        </Card>    
    )
}

export default Symptom