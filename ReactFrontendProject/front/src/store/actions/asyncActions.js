import apiServices from '../../services/api-service'

export const getTree = async (store, id) => {
    try {
        let r = await apiServices.getChildren(id);
        const newTree = store.state.tree
        newTree.set(r.level, r.children)
        store.setState(newTree)
    } catch (error) { console.log('getTree:', error.message) }
}