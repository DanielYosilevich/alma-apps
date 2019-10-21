require('../tree/tree-config')

async function getNode(id) {
    var r;
    await (rootNode.all(function (node) {
        if (node.model.id === id) {
            if (node.model.children) {
                r = {
                    level: node.model.level,
                    children: node.model.children
                }
            }
            else {
                r = {
                    level: node.model.level,
                    children: []
                }
            }
        }
    }))
    return r
}


module.exports = {
    getNode: getNode
} 