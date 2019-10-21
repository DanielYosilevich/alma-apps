const TreeModel = require('tree-model')

tree = new TreeModel()
rootNode = tree.parse({
    id: 1,
    level: 1,
    type: 'folder',
    children: [
        {
            id: 11,
            level: 2,
            type: 'folder',
            children: [{ id: 111, level:3, type:'picture', url:'https://res.cloudinary.com/dgfawg7jz/image/upload/v1554297217/Clubs-King.jpg.jpg' }]
        },
        {
            id: 12,
            level: 2,
            type: 'folder',
            children: [{ id: 121, level: 3,type: 'picture',url:'https://res.cloudinary.com/dgfawg7jz/image/upload/v1554296125/Diamonds-Queen.jpg.jpg'  }, { id: 122, level: 3,type: 'picture',url:'https://res.cloudinary.com/dgfawg7jz/image/upload/v1553789149/Hearts-Ace.jpg.jpg' }]
        },
        {
            id: 13,
            level: 2,
            type: 'folder'
        }
    ]
});

module.exports = rootNode