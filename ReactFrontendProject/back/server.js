const express = require('express')
const path = require('path')
const cors = require('cors')
const bodyParser = require('body-parser')
const addTreeRoutes = require('./routes/tree-route')

const app = express()

app.use(express.static('public'))
app.use(bodyParser.json())
app.use(cors({
  origin: ['http://localhost:3000'],
  credentials: true
}));

app.get('/', (req, res) => {
  res.send('Yo!')
})

app.get('/[^\.]+$', function (req, res) {
  res.set('Content-Type', 'text/html')
    .sendFile(path.join(__dirname, '/public/index.html'));
});

addTreeRoutes(app)

const PORT = process.env.PORT || 3007;
app.listen(PORT, () => console.log(`Tree server ready at port ${PORT}`))



