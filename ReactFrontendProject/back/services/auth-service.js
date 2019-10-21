require('dotenv').config()

function checkToken(req, res, next) {
    if (req.header('x-token') !== `${process.env.X_TOKEN}`) {
        res.status(401).end('Unauthorized');
        return;
    }
    next();
}

module.exports = {
    checkToken
}