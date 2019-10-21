export const clearSublevels = (store, level) => {
    const newTree = store.state.tree
    newTree.forEach((value, key, map) => {
        if (key && key >= level) newTree.delete(key)
        store.setState(newTree)
    })
}