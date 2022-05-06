const {Client} = require('pg')
const { user } = require('pg/lib/defaults')

const client = new Client({
    host: "localhost",
    user: "luca",
    port:5432,
    password: "bubblebutt",
    database: "SAdb"
})

client.connect();

client.query('Select * from doctor', (err, res)=>{
    if(!err){
        console.log(res.rows);
    }
    else{
        console.log(err.message);
    }
    client.end;
})