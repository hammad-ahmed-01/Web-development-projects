const express = require("express");
const app = express();
const fs=require("fs");
const path = require("path");
const hostname = "127.0.0.1";
const port = 80;

// EXPRESS
app.use('/static', express.static('static')); // for serving static files
app.use(express.urlencoded());

// PUG
app.set('view engine', 'pug'); // set the template engine as pug
app.set('views', path.join(__dirname, 'views')); // set the views dir

// ENDPOINTS
app.get('/', function (req, res) {
    res.sendFile(path.join(__dirname, 'views/index.html'));
});

app.get('/login', function (req, res) {
    res.sendFile(path.join(__dirname, 'views/login.html'));
});

app.get('/account', function (req, res) {
    res.sendFile(path.join(__dirname, 'views/account.html'));
});

app.post('/login', (req, res) => {
    console.log('account is running');
    var name = req.body.registerName;
    var username = req.body.registerUsername;
    var email = req.body.registerEmail;
    var pass = req.body.registerPassword;
    let outputToWrite = 'name: ' + name + ', username: ' + username + ' , email: ' + email + ', pass: ' + pass + '';
    fs.writeFileSync('output.txt', outputToWrite);
    console.log(req.body);
})

// STARTING SERVER
app.listen(port, hostname, () => {
    console.log(`Server running at http://${hostname}:${port}/`);
});