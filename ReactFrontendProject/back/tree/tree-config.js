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
            children: [{ id: 111, level: 3, type: 'picture', url: 'https://res.cloudinary.com/dgfawg7jz/image/upload/v1554297217/Clubs-King.jpg.jpg' }]
        },
        {
            id: 12,
            level: 2,
            type: 'folder',
            children: [{ id: 121, level: 3, type: 'picture', url: 'https://res.cloudinary.com/dgfawg7jz/image/upload/v1554296125/Diamonds-Queen.jpg.jpg' }, { id: 122, level: 3, type: 'picture', url: 'https://res.cloudinary.com/dgfawg7jz/image/upload/v1553789149/Hearts-Ace.jpg.jpg' }]
        },
        {
            id: 13,
            level: 2,
            type: 'folder',
            children: [{
                id: 131, level: 3, type: 'folder',
                children: [
                    {
                        id: 1311, level: 4, type: 'folder', children: [
                            { id: 13111, level: 5, type: 'picture', url: 'https://res.cloudinary.com/dgfawg7jz/image/upload/v1571128256/Clubs-10.jpg.jpg' },
                            { id: 13112, level: 5, type: 'picture', url: 'https://res.cloudinary.com/dgfawg7jz/image/upload/v1553378917/owl.jpg.jpg' },
                            { id: 13113, level: 5, type: 'picture', url: 'https://res.cloudinary.com/dgfawg7jz/image/upload/v1553506691/Spades-Queen.jpg.jpg' },
                            { id: 13114, level: 5, type: 'picture', url: 'https://res.cloudinary.com/dgfawg7jz/image/upload/v1553374983/Diamonds-King.jpg.jpg' }
                        ]
                    },
                    { id: 1312, level: 4, type: 'folder' }
                ]
            }]
        },
        {
            id: 14, level: 2, type: 'folder', children: [
                { id: 141, level: 3, type: 'folder', children: [{ id: 1411, level: 4, type: 'picture', url: 'https://res.cloudinary.com/dgfawg7jz/image/upload/v1553380746/920x920.jpg.jpg' }] },
                { id: 142, level: 3, type: 'folder' },
                { id: 143, level: 3, type: 'folder' },
                { id: 144, level: 3, type: 'picture', url: 'https://res.cloudinary.com/dgfawg7jz/image/upload/v1553732648/bird.jpg.jpg' },
                { id: 145, level: 3, type: 'picture', url: 'https://res.cloudinary.com/dgfawg7jz/image/upload/v1553785718/forest.jpeg.jpg' },
                { id: 146, level: 3, type: 'folder' },
                { id: 147, level: 3, type: 'folder' }
            ]
        },
        { id: 15, level: 2, type: 'picture', url: 'https://res.cloudinary.com/dgfawg7jz/image/upload/v1553251263/sample.jpg' },
        { id: 16, level: 2, type: 'picture', url: 'https://res.cloudinary.com/dgfawg7jz/image/upload/v1553887075/descartes.jpg.jpg' },
        { id: 17, level: 2, type: 'picture', url: 'https://res.cloudinary.com/dgfawg7jz/image/upload/v1553733741/treeswift.jpg.jpg' },
        { id: 18, level: 2, type: 'picture', url: 'https://res.cloudinary.com/dgfawg7jz/image/upload/v1553380520/sunflower-field.jpg.webp' },
        { id: 19, level: 2, type: 'picture', url: 'https://res.cloudinary.com/dgfawg7jz/image/upload/v1553780127/fuji.jpeg.jpg' }
    ]
});

module.exports = rootNode