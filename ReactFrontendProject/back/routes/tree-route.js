const treeService = require('../services/tree-service')
const authService = require('../services/auth-service')

function addTreeRoutes(app) {

    app.post("/api/tree", authService.checkToken,(req, res) => {
        console.log('body',req.body)
        let postbody = req.body
        treeService.getNode(postbody.id)
        .then((result)=>{
            console.log('result',result)
            return res.json(result)
        })
    })
}

module.exports = addTreeRoutes;