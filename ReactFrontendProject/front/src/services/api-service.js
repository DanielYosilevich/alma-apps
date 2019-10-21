import axios from '../assets/axios/axios-config'

const API_ROUTE = (process.env.NODE_ENV !== 'development')
    ? '' : 'http://localhost:3007'

const getChildren = async (nodeId) => {
    try {
        let res = await axios({
            method: 'POST',
            url: `${API_ROUTE}/api/tree`,
            data: { id: nodeId }
        })
        return {
            msg: 'Success',
            parent: nodeId,
            children: res.data.children,
            level: res.data.level
        }
    } catch (error) {
        console.log(error.message)
        return { msg: error.message }
    }
}

export default {
    getChildren
}   