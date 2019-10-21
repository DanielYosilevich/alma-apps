export const setNodeColor = (store, id, type) => {
   if (type === 'picture') return 'lightsteelblue'
   else if (store.state.expanded === id) return 'darkgrey'
   else return 'lightgrey'
}

export const setExpanded = (store, id) => {
   store.setState({ expanded: id })
}